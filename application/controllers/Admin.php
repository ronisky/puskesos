<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
        is_logged_in();
    }

    public function index()
    {
        $data = array();

        $data['title'] = 'Dashboard';
        $data['menu1'] = 'Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //data jumlah dashboard
        $data['jmluser'] = $this->db->get('user')->num_rows();
        $data['jmlproposal'] = $this->db->get('proposal')->num_rows();
        $data['jmlpmks'] = $this->db->get('pengenalan_tempat')->num_rows();
        //$data['jmllaporan'] = $this->db->get('user')->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['menu1'] = 'Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/role');
        }
    }

    public function ubahrole($id)
    {
        $data['title'] = 'Form Edit Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu1'] = 'Role';
        $data['role'] = $this->db->get('user_role')->result_array();

        $data['user_role'] = $this->Model->getRoleById($id);

        $this->form_validation->set_rules('role', 'Role', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/ubahrole', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Model->ubahRole();
            $this->session->set_flashdata('flash', 'Data Role Diubah');
            redirect('admin/role');
        }
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['menu1'] = 'Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();


        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('flash', ' Akses berhasil diubah!');
    }

    public function adduserList()
    {
        $data['title'] = 'User list';
        $data['menu1'] = 'Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role1'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email sudah digunakan!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Kata Sandi Tidak Sama!', 'min_length' => 'Kata Sandi Terlalu Pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('role_id', 'Role', 'required|trim');

        $data['addUser'] = $this->db->get('user')->result_array();
        $data['addRole'] = $this->db->get('user_role')->result_array();


        if ($this->form_validation->run() == false) {

            $string = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
            $random = substr(str_shuffle($string), 0, 8);
            $data['password'] = $random;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/adduserlist', $data);
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'nama_organisasi' => htmlspecialchars($this->input->post('nama_organisasi', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role_id', true),
                'is_active' => 0,
                'date_created' => time()
            ];

            // siapkan token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');
            $this->session->set_flashdata('flash', ' Akun telah ditambahkan ! Silahkan aktivasi akun anda');
            redirect('admin/adduserlist');
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'siormawasttbandung@gmail.com',
            'smtp_pass' => 'siormawa12345',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('siormawasttbandung@gmail.com', 'Organisasi Kemahasiswaan Sekolah Tinggi Teknologi Bandung');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $pass = $this->input->post('password1');
            $this->email->subject('Konfirmasi Akun');
            $this->email->message("<p>Password : " . $pass . "</p>" . 'Klik tautan ini untuk konfirmasi akun anda : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktivasi</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik tautan ini untuk Mengatur ulang kata sandi akun anda : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' Akun berhasil diaktivasi! Silahkan Login!</div>');
                    redirect('auth');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal ! Token Expired !</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal ! Token salah !</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal ! Email salah !</div>');
            redirect('auth');
        }
    }

    public function ubahuser($id)
    {
        $data['title'] = 'Form Edit User';
        $data['menu1'] = 'Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['addUser'] = $this->db->get('user')->result_array();

        $data['user'] = $this->Model->getUserById($id);

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('role_id', 'Role', 'required');
        $this->form_validation->set_rules('is_active', 'Active', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/ubahuser', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Model->ubahDataUser();

            $this->session->set_flashdata('flash', ' Data User Berhasil Diubah');
            redirect('admin/adduserlist');
        }
    }

    public function kelolahasilpmks()
    {
        $data['title'] = 'Kelola Hasil PMKS';
        $data['menu1'] = 'Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['klasifikasi'] = $this->db->get_where('pengenalan_tempat')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kelolahasilpmks', $data);
        $this->load->view('templates/footer');
    }

    public function laporanpmks()
    {
        $data['title'] = 'Laporan PMKS';
        $data['menu1'] = 'Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengenalan'] = $this->db->get('pengenalan_tempat')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/laporanpmks', $data);
        $this->load->view('templates/footer');
    }

    public function kelolahasilpengajuan()
    {
        $data['title'] = 'Kelola Hasil Pengajuan';
        $data['menu1'] = 'Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $data['proposal'] = $this->db->get_where('proposal')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kelolahasilpengajuan', $data);
        $this->load->view('templates/footer');
    }

    public function updateProposal()
    {
        $id = $this->input->post('id_proposal');
        $where = htmlspecialchars($this->input->post('konfirmasi'));
        $this->Model->updateStatus($id, $where);
        $this->session->set_flashdata('flash', ' Proposal berhasil diperbarui!');
        redirect('admin/kelolahasilpengajuan');
    }

    public function updatePmks()
    {
        $id = $this->input->post('id_pengenalan');
        $where = htmlspecialchars($this->input->post('konfirmasi_pmks'));
        $this->Model->updateStatusPmks($id, $where);
        $this->session->set_flashdata('flash', ' Proposal berhasil diperbarui!');
        redirect('admin/kelolahasilpmks');
    }

    public function laporanpengajuan()
    {
        $data['title'] = 'Laporan Pengajuan';
        $data['menu1'] = 'Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pendidikan'] = $this->db->get_where('proposal')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/laporanpengajuan', $data);
        $this->load->view('templates/footer');
    }

    public function detailPengajuan($id)
    {
        $data['title'] = 'Detail Pengajuan';
        $data['menu1'] = 'Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['proposal'] = $this->Model->getDetailProposalById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detailPengajuan', $data);
        $this->load->view('templates/footer');
    }

    public function detailPmks($id)
    {
        $data['title'] = 'Detail PMKS';
        $data['menu1'] = 'Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['d_pmks'] = $this->Model->getDetailPmksById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detailPmks', $data);
        $this->load->view('templates/footer');
    }
}
