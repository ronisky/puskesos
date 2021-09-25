<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pmks extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Input PMKS';
        $data['menu1'] = 'PMKS';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pengenalan'] = $this->db->get('pengenalan_tempat')->result_array();

        $this->form_validation->set_rules('nama_responden', 'Nama Responden', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Tanggal Lahir', 'required');
        $this->form_validation->set_rules('usia', 'Usia', 'required');
        $this->form_validation->set_rules('no_telepon', 'No telepon', 'required');
        $this->form_validation->set_rules('nama_kk', 'Nama Kartu Keluarga', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pmks/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_responden' => $this->input->post('nama_responden'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'usia' => $this->input->post('usia'),
                'nik' => $this->input->post('nik'),
                'nokk' => $this->input->post('nokk'),
                'no_telepon' => $this->input->post('no_telepon'),
                'nama_kk' => $this->input->post('nama_kk'),
                'alamat' => $this->input->post('alamat'),
                'nama_pendata' => $this->input->post('nama_pendata'),
                'nama_pengawas' => $this->input->post('nama_pengawas'),
                'tanggal_pendataan' => $this->input->post('tanggal_pendataan'),
            ];
            $this->db->insert('pengenalan_tempat', $data);
            $this->session->set_flashdata('flash', 'Pengajuan baru berhasil ditambahkan');
            redirect('pmks');
        }
    }

    // laporan pmks
    public function laporanmitrapmks()
    {
        $data = array();

        $data['title'] = 'Laporan Mitra PMKS';
        $data['menu1'] = 'PMKS';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['hasilPmks'] = $this->db->get('pengenalan_tempat')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pmks/laporanmitrapmks', $data);
        $this->load->view('templates/footer');
    }
    // Klasifikasi
    public function klasifikasi()
    {
        $data = array();

        $data['title'] = 'Klasifikasi PMKS';
        $data['menu1'] = 'PMKS';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['usia'] = $this->db->get('usia')->result_array();

        $keluarga = $this->input->post('keluarga');
        $kesehatan = $this->input->post('kesehatan');
        $ekonomi = $this->input->post('ekonomi');
        $tempat_tinggal = $this->input->post('tempat_tinggal');
        $lingkungan = $this->input->post('lingkungan');
        $catatan_kepolisian = $this->input->post('catatan_kepolisian');
        $korban_bencana = $this->input->post('korban_bencana');
        $menikah = $this->input->post('menikah');
        $pekerjaan_tetap = $this->input->post('pekerjaan_tetap');

        $this->form_validation->set_rules('nama_responden', 'Nama Responden', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Tanggal Lahir', 'required');
        $this->form_validation->set_rules('usia', 'Usia', 'required');
        $this->form_validation->set_rules('nik', 'Nomor Induk Kependudukan', 'required');
        $this->form_validation->set_rules('nokk', 'Nomor Kartu Keluarga', 'required');
        $this->form_validation->set_rules('no_telepon', 'No telepon', 'required');
        $this->form_validation->set_rules('nama_kk', 'Nama Kepala Keluarga', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nama_pendata', 'Nama Pendata', 'required');
        $this->form_validation->set_rules('nama_pengawas', 'Nama Pengawas', 'required');
        $this->form_validation->set_rules('tanggal_pendataan', 'Tanggal Pendataan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pmks/klasifikasi', $data);
            $this->load->view('templates/footer');
        } elseif ($keluarga == 3 && $kesehatan == 3 && $ekonomi == 2 && $lingkungan == 2 && $pekerjaan_tetap == 2 && $tempat_tinggal == 1 && $korban_bencana == 2) {

            // cek jika ada gambar yg akan di upload
            $upload_foto = $_FILES['foto'];

            if ($upload_foto) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
                $config['max_size']  = '1000';
                $config['max_width']  = '5000';
                $config['max_height']  = '5000';
                $config['upload_path'] = './assets/verivikasi/gambar/';
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [

                'nama_responden' => $this->input->post('nama_responden'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'usia' => $this->input->post('usia'),
                'nik' => $this->input->post('nik'),
                'nokk' => $this->input->post('nokk'),
                'no_telepon' => $this->input->post('no_telepon'),
                'nama_kk' => $this->input->post('nama_kk'),
                'alamat' => $this->input->post('alamat'),
                'nama_pendata' => $this->input->post('nama_pendata'),
                'nama_pengawas' => $this->input->post('nama_pengawas'),
                'tanggal_pendataan' => $this->input->post('tanggal_pendataan'),
                "keluarga" => $this->input->post('keluarga', true),
                "kesehatan" => $this->input->post('kesehatan', true),
                "ekonomi" => $this->input->post('ekonomi', true),
                "lingkungan" => $this->input->post('lingkungan', true),
                "pekerjaan_tetap" => $this->input->post('pekerjaan_tetap', true),
                "catatan_kepolisian" => $this->input->post('catatan_kepolisian', true),
                "tempat_tinggal" => $this->input->post('tempat_tinggal', true),
                "korban_bencana" => $this->input->post('korban_bencana', true),
                "menikah" => $this->input->post('menikah', true),
                "hasil_pmks" => 8
            ];
            $nik = $this->input->post('nik');
            $check_nik = $this->db->get_where('pengenalan_tempat', array('nik' => $nik));
            if ($check_nik->row_array() > 0) {
                $this->session->set_flashdata('flasherror', 'NIK Sudah Terdaftar');
                redirect('pmks/klasifikasi');
            } else {
                $this->db->insert('pengenalan_tempat', $data);
                $this->session->set_flashdata('flash', 'Pengajuan baru berhasil ditambahkan');
                redirect('pmks/klasifikasi');
            }
        } elseif ($keluarga == 2 && $ekonomi == 2 && $pekerjaan_tetap == 2 && $catatan_kepolisian == 1 && $korban_bencana == 2) {

            // cek jika ada gambar yg akan di upload
            $upload_foto = $_FILES['foto'];

            if ($upload_foto) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
                $config['max_size']  = '1000';
                $config['max_width']  = '5000';
                $config['max_height']  = '5000';
                $config['upload_path'] = './assets/verivikasi/gambar/';
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama_responden' => $this->input->post('nama_responden'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'usia' => $this->input->post('usia'),
                'nik' => $this->input->post('nik'),
                'nokk' => $this->input->post('nokk'),
                'no_telepon' => $this->input->post('no_telepon'),
                'nama_kk' => $this->input->post('nama_kk'),
                'alamat' => $this->input->post('alamat'),
                'nama_pendata' => $this->input->post('nama_pendata'),
                'nama_pengawas' => $this->input->post('nama_pengawas'),
                'tanggal_pendataan' => $this->input->post('tanggal_pendataan'),
                "keluarga" => $this->input->post('keluarga', true),
                "kesehatan" => $this->input->post('kesehatan', true),
                "ekonomi" => $this->input->post('ekonomi', true),
                "lingkungan" => $this->input->post('lingkungan', true),
                "pekerjaan_tetap" => $this->input->post('pekerjaan_tetap', true),
                "catatan_kepolisian" => $this->input->post('catatan_kepolisian', true),
                "tempat_tinggal" => $this->input->post('tempat_tinggal', true),
                "korban_bencana" => $this->input->post('korban_bencana', true),
                "menikah" => $this->input->post('menikah', true),
                "hasil_pmks" => 15
            ];
            $nik = $this->input->post('nik');
            $check_nik = $this->db->get_where('pengenalan_tempat', array('nik' => $nik));
            if ($check_nik->row_array() > 0) {
                $this->session->set_flashdata('flasherror', 'NIK Sudah Terdaftar');
                redirect('pmks/klasifikasi');
            } else {
                $this->db->insert('pengenalan_tempat', $data);
                $this->session->set_flashdata('flash', 'Pengajuan baru berhasil ditambahkan');
                redirect('pmks/klasifikasi');
            }
        } elseif ($keluarga == 3 && $kesehatan == 3 && $ekonomi == 2 && $tempat_tinggal == 1 && $lingkungan == 2) {

            // cek jika ada gambar yg akan di upload
            $upload_foto = $_FILES['foto'];

            if ($upload_foto) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
                $config['max_size']  = '1000';
                $config['max_width']  = '5000';
                $config['max_height']  = '5000';
                $config['upload_path'] = './assets/verivikasi/gambar/';
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $data = [
                'nama_responden' => $this->input->post('nama_responden'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'usia' => $this->input->post('usia'),
                'nik' => $this->input->post('nik'),
                'nokk' => $this->input->post('nokk'),
                'no_telepon' => $this->input->post('no_telepon'),
                'nama_kk' => $this->input->post('nama_kk'),
                'alamat' => $this->input->post('alamat'),
                'nama_pendata' => $this->input->post('nama_pendata'),
                'nama_pengawas' => $this->input->post('nama_pengawas'),
                'tanggal_pendataan' => $this->input->post('tanggal_pendataan'),
                "keluarga" => $this->input->post('keluarga', true),
                "kesehatan" => $this->input->post('kesehatan', true),
                "ekonomi" => $this->input->post('ekonomi', true),
                "lingkungan" => $this->input->post('lingkungan', true),
                "pekerjaan_tetap" => $this->input->post('pekerjaan_tetap', true),
                "catatan_kepolisian" => $this->input->post('catatan_kepolisian', true),
                "tempat_tinggal" => $this->input->post('tempat_tinggal', true),
                "korban_bencana" => $this->input->post('korban_bencana', true),
                "menikah" => $this->input->post('menikah', true),
                "hasil_pmks" => 1
            ];
            $nik = $this->input->post('nik');
            $check_nik = $this->db->get_where('pengenalan_tempat', array('nik' => $nik));
            if ($check_nik->row_array() > 0) {
                $this->session->set_flashdata('flasherror', 'NIK Sudah Terdaftar');
                redirect('pmks/klasifikasi');
            } else {
                $this->db->insert('pengenalan_tempat', $data);
                $this->session->set_flashdata('flash', 'Pengajuan baru berhasil ditambahkan');
                redirect('pmks/klasifikasi');
            }
        } elseif ($keluarga == 2 && $kesehatan == 3 && $lingkungan == 2 && $korban_bencana == 2) {

            // cek jika ada gambar yg akan di upload
            $upload_foto = $_FILES['foto'];

            if ($upload_foto) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
                $config['max_size']  = '1000';
                $config['max_width']  = '5000';
                $config['max_height']  = '5000';
                $config['upload_path'] = './assets/verivikasi/gambar/';
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama_responden' => $this->input->post('nama_responden'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'usia' => $this->input->post('usia'),
                'nik' => $this->input->post('nik'),
                'nokk' => $this->input->post('nokk'),
                'no_telepon' => $this->input->post('no_telepon'),
                'nama_kk' => $this->input->post('nama_kk'),
                'alamat' => $this->input->post('alamat'),
                'nama_pendata' => $this->input->post('nama_pendata'),
                'nama_pengawas' => $this->input->post('nama_pengawas'),
                'tanggal_pendataan' => $this->input->post('tanggal_pendataan'),
                "keluarga" => $this->input->post('keluarga', true),
                "kesehatan" => $this->input->post('kesehatan', true),
                "ekonomi" => $this->input->post('ekonomi', true),
                "lingkungan" => $this->input->post('lingkungan', true),
                "pekerjaan_tetap" => $this->input->post('pekerjaan_tetap', true),
                "catatan_kepolisian" => $this->input->post('catatan_kepolisian', true),
                "tempat_tinggal" => $this->input->post('tempat_tinggal', true),
                "korban_bencana" => $this->input->post('korban_bencana', true),
                "menikah" => $this->input->post('menikah', true),
                "hasil_pmks" => 16
            ];
            $nik = $this->input->post('nik');
            $check_nik = $this->db->get_where('pengenalan_tempat', array('nik' => $nik));
            if ($check_nik->row_array() > 0) {
                $this->session->set_flashdata('flasherror', 'NIK Sudah Terdaftar');
                redirect('pmks/klasifikasi');
            } else {
                $this->db->insert('pengenalan_tempat', $data);
                $this->session->set_flashdata('flash', 'Pengajuan baru berhasil ditambahkan');
                redirect('pmks/klasifikasi');
            }
        } elseif ($lingkungan == 2 && $pekerjaan_tetap == 2 && $tempat_tinggal == 1) {

            // cek jika ada gambar yg akan di upload
            $upload_foto = $_FILES['foto'];

            if ($upload_foto) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
                $config['max_size']  = '1000';
                $config['max_width']  = '5000';
                $config['max_height']  = '5000';
                $config['upload_path'] = './assets/verivikasi/gambar/';
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama_responden' => $this->input->post('nama_responden'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'usia' => $this->input->post('usia'),
                'nik' => $this->input->post('nik'),
                'nokk' => $this->input->post('nokk'),
                'no_telepon' => $this->input->post('no_telepon'),
                'nama_kk' => $this->input->post('nama_kk'),
                'alamat' => $this->input->post('alamat'),
                'nama_pendata' => $this->input->post('nama_pendata'),
                'nama_pengawas' => $this->input->post('nama_pengawas'),
                'tanggal_pendataan' => $this->input->post('tanggal_pendataan'),
                "keluarga" => $this->input->post('keluarga', true),
                "kesehatan" => $this->input->post('kesehatan', true),
                "ekonomi" => $this->input->post('ekonomi', true),
                "lingkungan" => $this->input->post('lingkungan', true),
                "pekerjaan_tetap" => $this->input->post('pekerjaan_tetap', true),
                "catatan_kepolisian" => $this->input->post('catatan_kepolisian', true),
                "tempat_tinggal" => $this->input->post('tempat_tinggal', true),
                "korban_bencana" => $this->input->post('korban_bencana', true),
                "menikah" => $this->input->post('menikah', true),
                "hasil_pmks" => 4
            ];
            $nik = $this->input->post('nik');
            $check_nik = $this->db->get_where('pengenalan_tempat', array('nik' => $nik));
            if ($check_nik->row_array() > 0) {
                $this->session->set_flashdata('flasherror', 'NIK Sudah Terdaftar');
                redirect('pmks/klasifikasi');
            } else {
                $this->db->insert('pengenalan_tempat', $data);
                $this->session->set_flashdata('flash', 'Pengajuan baru berhasil ditambahkan');
                redirect('pmks/klasifikasi');
            }
        } elseif ($keluarga == 2 && $ekonomi == 2 && $pekerjaan_tetap == 2) {

            // cek jika ada gambar yg akan di upload
            $upload_foto = $_FILES['foto'];

            if ($upload_foto) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
                $config['max_size']  = '1000';
                $config['max_width']  = '5000';
                $config['max_height']  = '5000';
                $config['upload_path'] = './assets/verivikasi/gambar/';
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama_responden' => $this->input->post('nama_responden'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'usia' => $this->input->post('usia'),
                'nik' => $this->input->post('nik'),
                'nokk' => $this->input->post('nokk'),
                'no_telepon' => $this->input->post('no_telepon'),
                'nama_kk' => $this->input->post('nama_kk'),
                'alamat' => $this->input->post('alamat'),
                'nama_pendata' => $this->input->post('nama_pendata'),
                'nama_pengawas' => $this->input->post('nama_pengawas'),
                'tanggal_pendataan' => $this->input->post('tanggal_pendataan'),
                "keluarga" => $this->input->post('keluarga', true),
                "kesehatan" => $this->input->post('kesehatan', true),
                "ekonomi" => $this->input->post('ekonomi', true),
                "lingkungan" => $this->input->post('lingkungan', true),
                "pekerjaan_tetap" => $this->input->post('pekerjaan_tetap', true),
                "catatan_kepolisian" => $this->input->post('catatan_kepolisian', true),
                "tempat_tinggal" => $this->input->post('tempat_tinggal', true),
                "korban_bencana" => $this->input->post('korban_bencana', true),
                "menikah" => $this->input->post('menikah', true),
                "hasil_pmks" => 23
            ];
            $nik = $this->input->post('nik');
            $check_nik = $this->db->get_where('pengenalan_tempat', array('nik' => $nik));
            if ($check_nik->row_array() > 0) {
                $this->session->set_flashdata('flasherror', 'NIK Sudah Terdaftar');
                redirect('pmks/klasifikasi');
            } else {
                $this->db->insert('pengenalan_tempat', $data);
                $this->session->set_flashdata('flash', 'Pengajuan baru berhasil ditambahkan');
                redirect('pmks/klasifikasi');
            }
        } elseif ($kesehatan == 3 && $lingkungan == 2 && $korban_bencana == 2) {

            // cek jika ada gambar yg akan di upload
            $upload_foto = $_FILES['foto'];

            if ($upload_foto) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
                $config['max_size']  = '1000';
                $config['max_width']  = '5000';
                $config['max_height']  = '5000';
                $config['upload_path'] = './assets/verivikasi/gambar/';
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama_responden' => $this->input->post('nama_responden'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'usia' => $this->input->post('usia'),
                'nik' => $this->input->post('nik'),
                'nokk' => $this->input->post('nokk'),
                'no_telepon' => $this->input->post('no_telepon'),
                'nama_kk' => $this->input->post('nama_kk'),
                'alamat' => $this->input->post('alamat'),
                'nama_pendata' => $this->input->post('nama_pendata'),
                'nama_pengawas' => $this->input->post('nama_pengawas'),
                'tanggal_pendataan' => $this->input->post('tanggal_pendataan'),
                "keluarga" => $this->input->post('keluarga', true),
                "kesehatan" => $this->input->post('kesehatan', true),
                "ekonomi" => $this->input->post('ekonomi', true),
                "lingkungan" => $this->input->post('lingkungan', true),
                "pekerjaan_tetap" => $this->input->post('pekerjaan_tetap', true),
                "catatan_kepolisian" => $this->input->post('catatan_kepolisian', true),
                "tempat_tinggal" => $this->input->post('tempat_tinggal', true),
                "korban_bencana" => $this->input->post('korban_bencana', true),
                "menikah" => $this->input->post('menikah', true),
                "hasil_pmks" => 6
            ];
            $nik = $this->input->post('nik');
            $check_nik = $this->db->get_where('pengenalan_tempat', array('nik' => $nik));
            if ($check_nik->row_array() > 0) {
                $this->session->set_flashdata('flasherror', 'NIK Sudah Terdaftar');
                redirect('pmks/klasifikasi');
            } else {
                $this->db->insert('pengenalan_tempat', $data);
                $this->session->set_flashdata('flash', 'Pengajuan baru berhasil ditambahkan');
                redirect('pmks/klasifikasi');
            }
        } elseif ($keluarga == 3 && $kesehatan == 4 && $korban_bencana == 2) {

            // cek jika ada gambar yg akan di upload
            $upload_foto = $_FILES['foto'];

            if ($upload_foto) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
                $config['max_size']  = '1000';
                $config['max_width']  = '5000';
                $config['max_height']  = '5000';
                $config['upload_path'] = './assets/verivikasi/gambar/';
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama_responden' => $this->input->post('nama_responden'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'usia' => $this->input->post('usia'),
                'nik' => $this->input->post('nik'),
                'nokk' => $this->input->post('nokk'),
                'no_telepon' => $this->input->post('no_telepon'),
                'nama_kk' => $this->input->post('nama_kk'),
                'alamat' => $this->input->post('alamat'),
                'nama_pendata' => $this->input->post('nama_pendata'),
                'nama_pengawas' => $this->input->post('nama_pengawas'),
                'tanggal_pendataan' => $this->input->post('tanggal_pendataan'),
                "keluarga" => $this->input->post('keluarga', true),
                "kesehatan" => $this->input->post('kesehatan', true),
                "ekonomi" => $this->input->post('ekonomi', true),
                "lingkungan" => $this->input->post('lingkungan', true),
                "pekerjaan_tetap" => $this->input->post('pekerjaan_tetap', true),
                "catatan_kepolisian" => $this->input->post('catatan_kepolisian', true),
                "tempat_tinggal" => $this->input->post('tempat_tinggal', true),
                "korban_bencana" => $this->input->post('korban_bencana', true),
                "menikah" => $this->input->post('menikah', true),
                "hasil_pmks" => 7
            ];
            $nik = $this->input->post('nik');
            $check_nik = $this->db->get_where('pengenalan_tempat', array('nik' => $nik));
            if ($check_nik->row_array() > 0) {
                $this->session->set_flashdata('flasherror', 'NIK Sudah Terdaftar');
                redirect('pmks/klasifikasi');
            } else {
                $this->db->insert('pengenalan_tempat', $data);
                $this->session->set_flashdata('flash', 'Pengajuan baru berhasil ditambahkan');
                redirect('pmks/klasifikasi');
            }
        } elseif ($ekonomi == 2 && $pekerjaan_tetap == 2 && $tempat_tinggal == 1) {

            // cek jika ada gambar yg akan di upload
            $upload_foto = $_FILES['foto'];

            if ($upload_foto) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
                $config['max_size']  = '1000';
                $config['max_width']  = '5000';
                $config['max_height']  = '5000';
                $config['upload_path'] = './assets/verivikasi/gambar/';
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama_responden' => $this->input->post('nama_responden'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'usia' => $this->input->post('usia'),
                'nik' => $this->input->post('nik'),
                'nokk' => $this->input->post('nokk'),
                'no_telepon' => $this->input->post('no_telepon'),
                'nama_kk' => $this->input->post('nama_kk'),
                'alamat' => $this->input->post('alamat'),
                'nama_pendata' => $this->input->post('nama_pendata'),
                'nama_pengawas' => $this->input->post('nama_pengawas'),
                'tanggal_pendataan' => $this->input->post('tanggal_pendataan'),
                "keluarga" => $this->input->post('keluarga', true),
                "kesehatan" => $this->input->post('kesehatan', true),
                "ekonomi" => $this->input->post('ekonomi', true),
                "lingkungan" => $this->input->post('lingkungan', true),
                "pekerjaan_tetap" => $this->input->post('pekerjaan_tetap', true),
                "catatan_kepolisian" => $this->input->post('catatan_kepolisian', true),
                "tempat_tinggal" => $this->input->post('tempat_tinggal', true),
                "korban_bencana" => $this->input->post('korban_bencana', true),
                "menikah" => $this->input->post('menikah', true),
                "hasil_pmks" => 11
            ];
            $nik = $this->input->post('nik');
            $check_nik = $this->db->get_where('pengenalan_tempat', array('nik' => $nik));
            if ($check_nik->row_array() > 0) {
                $this->session->set_flashdata('flasherror', 'NIK Sudah Terdaftar');
                redirect('pmks/klasifikasi');
            } else {
                $this->db->insert('pengenalan_tempat', $data);
                $this->session->set_flashdata('flash', 'Pengajuan baru berhasil ditambahkan');
                redirect('pmks/klasifikasi');
            }
        } elseif ($lingkungan == 2 && $catatan_kepolisian == 1 && $korban_bencana == 2) {

            // cek jika ada gambar yg akan di upload
            $upload_foto = $_FILES['foto'];

            if ($upload_foto) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
                $config['max_size']  = '1000';
                $config['max_width']  = '5000';
                $config['max_height']  = '5000';
                $config['upload_path'] = './assets/verivikasi/gambar/';
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama_responden' => $this->input->post('nama_responden'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'usia' => $this->input->post('usia'),
                'nik' => $this->input->post('nik'),
                'nokk' => $this->input->post('nokk'),
                'no_telepon' => $this->input->post('no_telepon'),
                'nama_kk' => $this->input->post('nama_kk'),
                'alamat' => $this->input->post('alamat'),
                'nama_pendata' => $this->input->post('nama_pendata'),
                'nama_pengawas' => $this->input->post('nama_pengawas'),
                'tanggal_pendataan' => $this->input->post('tanggal_pendataan'),
                "keluarga" => $this->input->post('keluarga', true),
                "kesehatan" => $this->input->post('kesehatan', true),
                "ekonomi" => $this->input->post('ekonomi', true),
                "lingkungan" => $this->input->post('lingkungan', true),
                "pekerjaan_tetap" => $this->input->post('pekerjaan_tetap', true),
                "catatan_kepolisian" => $this->input->post('catatan_kepolisian', true),
                "tempat_tinggal" => $this->input->post('tempat_tinggal', true),
                "korban_bencana" => $this->input->post('korban_bencana', true),
                "menikah" => $this->input->post('menikah', true),
                "hasil_pmks" => 14
            ];
            $nik = $this->input->post('nik');
            $check_nik = $this->db->get_where('pengenalan_tempat', array('nik' => $nik));
            if ($check_nik->row_array() > 0) {
                $this->session->set_flashdata('flasherror', 'NIK Sudah Terdaftar');
                redirect('pmks/klasifikasi');
            } else {
                $this->db->insert('pengenalan_tempat', $data);
                $this->session->set_flashdata('flash', 'Pengajuan baru berhasil ditambahkan');
                redirect('pmks/klasifikasi');
            }
        } elseif ($ekonomi == 2 && $tempat_tinggal == 1 && $korban_bencana == 1) {

            // cek jika ada gambar yg akan di upload
            $upload_foto = $_FILES['foto'];

            if ($upload_foto) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
                $config['max_size']  = '1000';
                $config['max_width']  = '5000';
                $config['max_height']  = '5000';
                $config['upload_path'] = './assets/verivikasi/gambar/';
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama_responden' => $this->input->post('nama_responden'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'usia' => $this->input->post('usia'),
                'nik' => $this->input->post('nik'),
                'nokk' => $this->input->post('nokk'),
                'no_telepon' => $this->input->post('no_telepon'),
                'nama_kk' => $this->input->post('nama_kk'),
                'alamat' => $this->input->post('alamat'),
                'nama_pendata' => $this->input->post('nama_pendata'),
                'nama_pengawas' => $this->input->post('nama_pengawas'),
                'tanggal_pendataan' => $this->input->post('tanggal_pendataan'),
                "keluarga" => $this->input->post('keluarga', true),
                "kesehatan" => $this->input->post('kesehatan', true),
                "ekonomi" => $this->input->post('ekonomi', true),
                "lingkungan" => $this->input->post('lingkungan', true),
                "pekerjaan_tetap" => $this->input->post('pekerjaan_tetap', true),
                "catatan_kepolisian" => $this->input->post('catatan_kepolisian', true),
                "tempat_tinggal" => $this->input->post('tempat_tinggal', true),
                "korban_bencana" => $this->input->post('korban_bencana', true),
                "menikah" => $this->input->post('menikah', true),
                "hasil_pmks" => 21
            ];
            $nik = $this->input->post('nik');
            $check_nik = $this->db->get_where('pengenalan_tempat', array('nik' => $nik));
            if ($check_nik->row_array() > 0) {
                $this->session->set_flashdata('flasherror', 'NIK Sudah Terdaftar');
                redirect('pmks/klasifikasi');
            } else {
                $this->db->insert('pengenalan_tempat', $data);
                $this->session->set_flashdata('flash', 'Pengajuan baru berhasil ditambahkan');
                redirect('pmks/klasifikasi');
            }
        } elseif ($keluarga == 2 && $ekonomi == 2) {

            // cek jika ada gambar yg akan di upload
            $upload_foto = $_FILES['foto'];

            if ($upload_foto) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
                $config['max_size']  = '1000';
                $config['max_width']  = '5000';
                $config['max_height']  = '5000';
                $config['upload_path'] = './assets/verivikasi/gambar/';
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama_responden' => $this->input->post('nama_responden'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'usia' => $this->input->post('usia'),
                'nik' => $this->input->post('nik'),
                'nokk' => $this->input->post('nokk'),
                'no_telepon' => $this->input->post('no_telepon'),
                'nama_kk' => $this->input->post('nama_kk'),
                'alamat' => $this->input->post('alamat'),
                'nama_pendata' => $this->input->post('nama_pendata'),
                'nama_pengawas' => $this->input->post('nama_pengawas'),
                'tanggal_pendataan' => $this->input->post('tanggal_pendataan'),
                "keluarga" => $this->input->post('keluarga', true),
                "kesehatan" => $this->input->post('kesehatan', true),
                "ekonomi" => $this->input->post('ekonomi', true),
                "lingkungan" => $this->input->post('lingkungan', true),
                "pekerjaan_tetap" => $this->input->post('pekerjaan_tetap', true),
                "catatan_kepolisian" => $this->input->post('catatan_kepolisian', true),
                "tempat_tinggal" => $this->input->post('tempat_tinggal', true),
                "korban_bencana" => $this->input->post('korban_bencana', true),
                "menikah" => $this->input->post('menikah', true),
                "hasil_pmks" => 2
            ];
            $nik = $this->input->post('nik');
            $check_nik = $this->db->get_where('pengenalan_tempat', array('nik' => $nik));
            if ($check_nik->row_array() > 0) {
                $this->session->set_flashdata('flasherror', 'NIK Sudah Terdaftar');
                redirect('pmks/klasifikasi');
            } else {
                $this->db->insert('pengenalan_tempat', $data);
                $this->session->set_flashdata('flash', 'Pengajuan baru berhasil ditambahkan');
                redirect('pmks/klasifikasi');
            }
        } elseif ($keluarga == 2 && $kesehatan == 2) {

            // cek jika ada gambar yg akan di upload
            $upload_foto = $_FILES['foto'];

            if ($upload_foto) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
                $config['max_size']  = '1000';
                $config['max_width']  = '5000';
                $config['max_height']  = '5000';
                $config['upload_path'] = './assets/verivikasi/gambar/';
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama_responden' => $this->input->post('nama_responden'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'usia' => $this->input->post('usia'),
                'nik' => $this->input->post('nik'),
                'nokk' => $this->input->post('nokk'),
                'no_telepon' => $this->input->post('no_telepon'),
                'nama_kk' => $this->input->post('nama_kk'),
                'alamat' => $this->input->post('alamat'),
                'nama_pendata' => $this->input->post('nama_pendata'),
                'nama_pengawas' => $this->input->post('nama_pengawas'),
                'tanggal_pendataan' => $this->input->post('tanggal_pendataan'),
                "keluarga" => $this->input->post('keluarga', true),
                "kesehatan" => $this->input->post('kesehatan', true),
                "ekonomi" => $this->input->post('ekonomi', true),
                "lingkungan" => $this->input->post('lingkungan', true),
                "pekerjaan_tetap" => $this->input->post('pekerjaan_tetap', true),
                "catatan_kepolisian" => $this->input->post('catatan_kepolisian', true),
                "tempat_tinggal" => $this->input->post('tempat_tinggal', true),
                "korban_bencana" => $this->input->post('korban_bencana', true),
                "menikah" => $this->input->post('menikah', true),
                "hasil_pmks" => 9
            ];
            $nik = $this->input->post('nik');
            $check_nik = $this->db->get_where('pengenalan_tempat', array('nik' => $nik));
            if ($check_nik->row_array() > 0) {
                $this->session->set_flashdata('flasherror', 'NIK Sudah Terdaftar');
                redirect('pmks/klasifikasi');
            } else {
                $this->db->insert('pengenalan_tempat', $data);
                $this->session->set_flashdata('flash', 'Pengajuan baru berhasil ditambahkan');
                redirect('pmks/klasifikasi');
            }
        } elseif ($keluarga == 2 && $lingkungan == 2) {

            // cek jika ada gambar yg akan di upload
            $upload_foto = $_FILES['foto'];

            if ($upload_foto) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
                $config['max_size']  = '1000';
                $config['max_width']  = '5000';
                $config['max_height']  = '5000';
                $config['upload_path'] = './assets/verivikasi/gambar/';
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama_responden' => $this->input->post('nama_responden'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'usia' => $this->input->post('usia'),
                'nik' => $this->input->post('nik'),
                'nokk' => $this->input->post('nokk'),
                'no_telepon' => $this->input->post('no_telepon'),
                'nama_kk' => $this->input->post('nama_kk'),
                'alamat' => $this->input->post('alamat'),
                'nama_pendata' => $this->input->post('nama_pendata'),
                'nama_pengawas' => $this->input->post('nama_pengawas'),
                'tanggal_pendataan' => $this->input->post('tanggal_pendataan'),
                "keluarga" => $this->input->post('keluarga', true),
                "kesehatan" => $this->input->post('kesehatan', true),
                "ekonomi" => $this->input->post('ekonomi', true),
                "lingkungan" => $this->input->post('lingkungan', true),
                "pekerjaan_tetap" => $this->input->post('pekerjaan_tetap', true),
                "catatan_kepolisian" => $this->input->post('catatan_kepolisian', true),
                "tempat_tinggal" => $this->input->post('tempat_tinggal', true),
                "korban_bencana" => $this->input->post('korban_bencana', true),
                "menikah" => $this->input->post('menikah', true),
                "hasil_pmks" => 10
            ];
            $nik = $this->input->post('nik');
            $check_nik = $this->db->get_where('pengenalan_tempat', array('nik' => $nik));
            if ($check_nik->row_array() > 0) {
                $this->session->set_flashdata('flasherror', 'NIK Sudah Terdaftar');
                redirect('pmks/klasifikasi');
            } else {
                $this->db->insert('pengenalan_tempat', $data);
                $this->session->set_flashdata('flash', 'Pengajuan baru berhasil ditambahkan');
                redirect('pmks/klasifikasi');
            }
        } elseif ($keluarga == 3 && $ekonomi == 2) {

            // cek jika ada gambar yg akan di upload
            $upload_foto = $_FILES['foto'];

            if ($upload_foto) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
                $config['max_size']  = '1000';
                $config['max_width']  = '5000';
                $config['max_height']  = '5000';
                $config['upload_path'] = './assets/verivikasi/gambar/';
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama_responden' => $this->input->post('nama_responden'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'usia' => $this->input->post('usia'),
                'nik' => $this->input->post('nik'),
                'nokk' => $this->input->post('nokk'),
                'no_telepon' => $this->input->post('no_telepon'),
                'nama_kk' => $this->input->post('nama_kk'),
                'alamat' => $this->input->post('alamat'),
                'nama_pendata' => $this->input->post('nama_pendata'),
                'nama_pengawas' => $this->input->post('nama_pengawas'),
                'tanggal_pendataan' => $this->input->post('tanggal_pendataan'),
                "keluarga" => $this->input->post('keluarga', true),
                "kesehatan" => $this->input->post('kesehatan', true),
                "ekonomi" => $this->input->post('ekonomi', true),
                "lingkungan" => $this->input->post('lingkungan', true),
                "pekerjaan_tetap" => $this->input->post('pekerjaan_tetap', true),
                "catatan_kepolisian" => $this->input->post('catatan_kepolisian', true),
                "tempat_tinggal" => $this->input->post('tempat_tinggal', true),
                "korban_bencana" => $this->input->post('korban_bencana', true),
                "menikah" => $this->input->post('menikah', true),
                "hasil_pmks" => 12
            ];
            $nik = $this->input->post('nik');
            $check_nik = $this->db->get_where('pengenalan_tempat', array('nik' => $nik));
            if ($check_nik->row_array() > 0) {
                $this->session->set_flashdata('flasherror', 'NIK Sudah Terdaftar');
                redirect('pmks/klasifikasi');
            } else {
                $this->db->insert('pengenalan_tempat', $data);
                $this->session->set_flashdata('flash', 'Pengajuan baru berhasil ditambahkan');
                redirect('pmks/klasifikasi');
            }
        } elseif ($catatan_kepolisian == 2 && $korban_bencana == 2) {

            // cek jika ada gambar yg akan di upload
            $upload_foto = $_FILES['foto'];

            if ($upload_foto) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
                $config['max_size']  = '1000';
                $config['max_width']  = '5000';
                $config['max_height']  = '5000';
                $config['upload_path'] = './assets/verivikasi/gambar/';
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama_responden' => $this->input->post('nama_responden'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'usia' => $this->input->post('usia'),
                'nik' => $this->input->post('nik'),
                'nokk' => $this->input->post('nokk'),
                'no_telepon' => $this->input->post('no_telepon'),
                'nama_kk' => $this->input->post('nama_kk'),
                'alamat' => $this->input->post('alamat'),
                'nama_pendata' => $this->input->post('nama_pendata'),
                'nama_pengawas' => $this->input->post('nama_pengawas'),
                'tanggal_pendataan' => $this->input->post('tanggal_pendataan'),
                "keluarga" => $this->input->post('keluarga', true),
                "kesehatan" => $this->input->post('kesehatan', true),
                "ekonomi" => $this->input->post('ekonomi', true),
                "lingkungan" => $this->input->post('lingkungan', true),
                "pekerjaan_tetap" => $this->input->post('pekerjaan_tetap', true),
                "catatan_kepolisian" => $this->input->post('catatan_kepolisian', true),
                "tempat_tinggal" => $this->input->post('tempat_tinggal', true),
                "korban_bencana" => $this->input->post('korban_bencana', true),
                "menikah" => $this->input->post('menikah', true),
                "hasil_pmks" => 17
            ];
            $nik = $this->input->post('nik');
            $check_nik = $this->db->get_where('pengenalan_tempat', array('nik' => $nik));
            if ($check_nik->row_array() > 0) {
                $this->session->set_flashdata('flasherror', 'NIK Sudah Terdaftar');
                redirect('pmks/klasifikasi');
            } else {
                $this->db->insert('pengenalan_tempat', $data);
                $this->session->set_flashdata('flash', 'Pengajuan baru berhasil ditambahkan');
                redirect('pmks/klasifikasi');
            }
            //2
        } elseif ($ekonomi == 2 && $korban_bencana == 2) {

            // cek jika ada gambar yg akan di upload
            $upload_foto = $_FILES['foto'];

            if ($upload_foto) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
                $config['max_size']  = '1000';
                $config['max_width']  = '5000';
                $config['max_height']  = '5000';
                $config['upload_path'] = './assets/verivikasi/gambar/';
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama_responden' => $this->input->post('nama_responden'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'usia' => $this->input->post('usia'),
                'nik' => $this->input->post('nik'),
                'nokk' => $this->input->post('nokk'),
                'no_telepon' => $this->input->post('no_telepon'),
                'nama_kk' => $this->input->post('nama_kk'),
                'alamat' => $this->input->post('alamat'),
                'nama_pendata' => $this->input->post('nama_pendata'),
                'nama_pengawas' => $this->input->post('nama_pengawas'),
                'tanggal_pendataan' => $this->input->post('tanggal_pendataan'),
                "keluarga" => $this->input->post('keluarga', true),
                "kesehatan" => $this->input->post('kesehatan', true),
                "ekonomi" => $this->input->post('ekonomi', true),
                "lingkungan" => $this->input->post('lingkungan', true),
                "pekerjaan_tetap" => $this->input->post('pekerjaan_tetap', true),
                "catatan_kepolisian" => $this->input->post('catatan_kepolisian', true),
                "tempat_tinggal" => $this->input->post('tempat_tinggal', true),
                "korban_bencana" => $this->input->post('korban_bencana', true),
                "menikah" => $this->input->post('menikah', true),
                "hasil_pmks" => 18
            ];
            $nik = $this->input->post('nik');
            $check_nik = $this->db->get_where('pengenalan_tempat', array('nik' => $nik));
            if ($check_nik->row_array() > 0) {
                $this->session->set_flashdata('flasherror', 'NIK Sudah Terdaftar');
                redirect('pmks/klasifikasi');
            } else {
                $this->db->insert('pengenalan_tempat', $data);
                $this->session->set_flashdata('flash', 'Pengajuan baru berhasil ditambahkan');
                redirect('pmks/klasifikasi');
            }
            //1
        } elseif ($tempat_tinggal == 3 && $korban_bencana == 2) {

            // cek jika ada gambar yg akan di upload
            $upload_foto = $_FILES['foto'];

            if ($upload_foto) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
                $config['max_size']  = '1000';
                $config['max_width']  = '5000';
                $config['max_height']  = '5000';
                $config['upload_path'] = './assets/verivikasi/gambar/';
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama_responden' => $this->input->post('nama_responden'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'usia' => $this->input->post('usia'),
                'nik' => $this->input->post('nik'),
                'nokk' => $this->input->post('nokk'),
                'no_telepon' => $this->input->post('no_telepon'),
                'nama_kk' => $this->input->post('nama_kk'),
                'alamat' => $this->input->post('alamat'),
                'nama_pendata' => $this->input->post('nama_pendata'),
                'nama_pengawas' => $this->input->post('nama_pengawas'),
                'tanggal_pendataan' => $this->input->post('tanggal_pendataan'),
                "keluarga" => $this->input->post('keluarga', true),
                "kesehatan" => $this->input->post('kesehatan', true),
                "ekonomi" => $this->input->post('ekonomi', true),
                "lingkungan" => $this->input->post('lingkungan', true),
                "pekerjaan_tetap" => $this->input->post('pekerjaan_tetap', true),
                "catatan_kepolisian" => $this->input->post('catatan_kepolisian', true),
                "tempat_tinggal" => $this->input->post('tempat_tinggal', true),
                "korban_bencana" => $this->input->post('korban_bencana', true),
                "menikah" => $this->input->post('menikah', true),
                "hasil_pmks" => 22
            ];
            $nik = $this->input->post('nik');
            $check_nik = $this->db->get_where('pengenalan_tempat', array('nik' => $nik));
            if ($check_nik->row_array() > 0) {
                $this->session->set_flashdata('flasherror', 'NIK Sudah Terdaftar');
                redirect('pmks/klasifikasi');
            } else {
                $this->db->insert('pengenalan_tempat', $data);
                $this->session->set_flashdata('flash', 'Pengajuan baru berhasil ditambahkan');
                redirect('pmks/klasifikasi');
            }
        } elseif ($ekonomi == 2 && $pekerjaan_tetap == 2) {

            // cek jika ada gambar yg akan di upload
            $upload_foto = $_FILES['foto'];

            if ($upload_foto) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
                $config['max_size']  = '1000';
                $config['max_width']  = '5000';
                $config['max_height']  = '5000';
                $config['upload_path'] = './assets/verivikasi/gambar/';
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama_responden' => $this->input->post('nama_responden'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'usia' => $this->input->post('usia'),
                'nik' => $this->input->post('nik'),
                'nokk' => $this->input->post('nokk'),
                'no_telepon' => $this->input->post('no_telepon'),
                'nama_kk' => $this->input->post('nama_kk'),
                'alamat' => $this->input->post('alamat'),
                'nama_pendata' => $this->input->post('nama_pendata'),
                'nama_pengawas' => $this->input->post('nama_pengawas'),
                'tanggal_pendataan' => $this->input->post('tanggal_pendataan'),
                "keluarga" => $this->input->post('keluarga', true),
                "kesehatan" => $this->input->post('kesehatan', true),
                "ekonomi" => $this->input->post('ekonomi', true),
                "lingkungan" => $this->input->post('lingkungan', true),
                "pekerjaan_tetap" => $this->input->post('pekerjaan_tetap', true),
                "catatan_kepolisian" => $this->input->post('catatan_kepolisian', true),
                "tempat_tinggal" => $this->input->post('tempat_tinggal', true),
                "korban_bencana" => $this->input->post('korban_bencana', true),
                "menikah" => $this->input->post('menikah', true),
                "hasil_pmks" => 24
            ];
            $nik = $this->input->post('nik');
            $check_nik = $this->db->get_where('pengenalan_tempat', array('nik' => $nik));
            if ($check_nik->row_array() > 0) {
                $this->session->set_flashdata('flasherror', 'NIK Sudah Terdaftar');
                redirect('pmks/klasifikasi');
            } else {
                $this->db->insert('pengenalan_tempat', $data);
                $this->session->set_flashdata('flash', 'Pengajuan baru berhasil ditambahkan');
                redirect('pmks/klasifikasi');
            }
        } elseif ($lingkungan == 2 && $menikah == 1) {

            // cek jika ada gambar yg akan di upload
            $upload_foto = $_FILES['foto'];

            if ($upload_foto) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
                $config['max_size']  = '1000';
                $config['max_width']  = '5000';
                $config['max_height']  = '5000';
                $config['upload_path'] = './assets/verivikasi/gambar/';
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama_responden' => $this->input->post('nama_responden'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'usia' => $this->input->post('usia'),
                'nik' => $this->input->post('nik'),
                'nokk' => $this->input->post('nokk'),
                'no_telepon' => $this->input->post('no_telepon'),
                'nama_kk' => $this->input->post('nama_kk'),
                'alamat' => $this->input->post('alamat'),
                'nama_pendata' => $this->input->post('nama_pendata'),
                'nama_pengawas' => $this->input->post('nama_pengawas'),
                'tanggal_pendataan' => $this->input->post('tanggal_pendataan'),
                "keluarga" => $this->input->post('keluarga', true),
                "kesehatan" => $this->input->post('kesehatan', true),
                "ekonomi" => $this->input->post('ekonomi', true),
                "lingkungan" => $this->input->post('lingkungan', true),
                "pekerjaan_tetap" => $this->input->post('pekerjaan_tetap', true),
                "catatan_kepolisian" => $this->input->post('catatan_kepolisian', true),
                "tempat_tinggal" => $this->input->post('tempat_tinggal', true),
                "korban_bencana" => $this->input->post('korban_bencana', true),
                "menikah" => $this->input->post('menikah', true),
                "hasil_pmks" => 25
            ];
            $nik = $this->input->post('nik');
            $check_nik = $this->db->get_where('pengenalan_tempat', array('nik' => $nik));
            if ($check_nik->row_array() > 0) {
                $this->session->set_flashdata('flasherror', 'NIK Sudah Terdaftar');
                redirect('pmks/klasifikasi');
            } else {
                $this->db->insert('pengenalan_tempat', $data);
                $this->session->set_flashdata('flash', 'Pengajuan baru berhasil ditambahkan');
                redirect('pmks/klasifikasi');
            }
        } elseif ($pekerjaan_tetap == 2) {

            // cek jika ada gambar yg akan di upload
            $upload_foto = $_FILES['foto'];

            if ($upload_foto) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
                $config['max_size']  = '1000';
                $config['max_width']  = '5000';
                $config['max_height']  = '5000';
                $config['upload_path'] = './assets/verivikasi/gambar/';
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama_responden' => $this->input->post('nama_responden'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'usia' => $this->input->post('usia'),
                'nik' => $this->input->post('nik'),
                'nokk' => $this->input->post('nokk'),
                'no_telepon' => $this->input->post('no_telepon'),
                'nama_kk' => $this->input->post('nama_kk'),
                'alamat' => $this->input->post('alamat'),
                'nama_pendata' => $this->input->post('nama_pendata'),
                'nama_pengawas' => $this->input->post('nama_pengawas'),
                'tanggal_pendataan' => $this->input->post('tanggal_pendataan'),
                "keluarga" => $this->input->post('keluarga', true),
                "kesehatan" => $this->input->post('kesehatan', true),
                "ekonomi" => $this->input->post('ekonomi', true),
                "lingkungan" => $this->input->post('lingkungan', true),
                "pekerjaan_tetap" => $this->input->post('pekerjaan_tetap', true),
                "catatan_kepolisian" => $this->input->post('catatan_kepolisian', true),
                "tempat_tinggal" => $this->input->post('tempat_tinggal', true),
                "korban_bencana" => $this->input->post('korban_bencana', true),
                "menikah" => $this->input->post('menikah', true),
                "hasil_pmks" => 13
            ];
            $nik = $this->input->post('nik');
            $check_nik = $this->db->get_where('pengenalan_tempat', array('nik' => $nik));
            if ($check_nik->row_array() > 0) {
                $this->session->set_flashdata('flasherror', 'NIK Sudah Terdaftar');
                redirect('pmks/klasifikasi');
            } else {
                $this->db->insert('pengenalan_tempat', $data);
                $this->session->set_flashdata('flash', 'Pengajuan baru berhasil ditambahkan');
                redirect('pmks/klasifikasi');
            }
        } elseif ($kesehatan == 2) {

            // cek jika ada gambar yg akan di upload
            $upload_foto = $_FILES['foto'];

            if ($upload_foto) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
                $config['max_size']  = '1000';
                $config['max_width']  = '5000';
                $config['max_height']  = '5000';
                $config['upload_path'] = './assets/verivikasi/gambar/';
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama_responden' => $this->input->post('nama_responden'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'usia' => $this->input->post('usia'),
                'nik' => $this->input->post('nik'),
                'nokk' => $this->input->post('nokk'),
                'no_telepon' => $this->input->post('no_telepon'),
                'nama_kk' => $this->input->post('nama_kk'),
                'alamat' => $this->input->post('alamat'),
                'nama_pendata' => $this->input->post('nama_pendata'),
                'nama_pengawas' => $this->input->post('nama_pengawas'),
                'tanggal_pendataan' => $this->input->post('tanggal_pendataan'),
                "keluarga" => $this->input->post('keluarga', true),
                "kesehatan" => $this->input->post('kesehatan', true),
                "ekonomi" => $this->input->post('ekonomi', true),
                "lingkungan" => $this->input->post('lingkungan', true),
                "pekerjaan_tetap" => $this->input->post('pekerjaan_tetap', true),
                "catatan_kepolisian" => $this->input->post('catatan_kepolisian', true),
                "tempat_tinggal" => $this->input->post('tempat_tinggal', true),
                "korban_bencana" => $this->input->post('korban_bencana', true),
                "menikah" => $this->input->post('menikah', true),
                "hasil_pmks" => 5
            ];
            $nik = $this->input->post('nik');
            $check_nik = $this->db->get_where('pengenalan_tempat', array('nik' => $nik));
            if ($check_nik->row_array() > 0) {
                $this->session->set_flashdata('flasherror', 'NIK Sudah Terdaftar');
                redirect('pmks/klasifikasi');
            } else {
                $this->db->insert('pengenalan_tempat', $data);
                $this->session->set_flashdata('flash', 'Pengajuan baru berhasil ditambahkan');
                redirect('pmks/klasifikasi');
            }
        } elseif ($korban_bencana == 2) {

            // cek jika ada gambar yg akan di upload
            $upload_foto = $_FILES['foto'];

            if ($upload_foto) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
                $config['max_size']  = '1000';
                $config['max_width']  = '5000';
                $config['max_height']  = '5000';
                $config['upload_path'] = './assets/verivikasi/gambar/';
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama_responden' => $this->input->post('nama_responden'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'usia' => $this->input->post('usia'),
                'nik' => $this->input->post('nik'),
                'nokk' => $this->input->post('nokk'),
                'no_telepon' => $this->input->post('no_telepon'),
                'nama_kk' => $this->input->post('nama_kk'),
                'alamat' => $this->input->post('alamat'),
                'nama_pendata' => $this->input->post('nama_pendata'),
                'nama_pengawas' => $this->input->post('nama_pengawas'),
                'tanggal_pendataan' => $this->input->post('tanggal_pendataan'),
                "keluarga" => $this->input->post('keluarga', true),
                "kesehatan" => $this->input->post('kesehatan', true),
                "ekonomi" => $this->input->post('ekonomi', true),
                "lingkungan" => $this->input->post('lingkungan', true),
                "pekerjaan_tetap" => $this->input->post('pekerjaan_tetap', true),
                "catatan_kepolisian" => $this->input->post('catatan_kepolisian', true),
                "tempat_tinggal" => $this->input->post('tempat_tinggal', true),
                "korban_bencana" => $this->input->post('korban_bencana', true),
                "menikah" => $this->input->post('menikah', true),
                "hasil_pmks" => 19
            ];
            $nik = $this->input->post('nik');
            $check_nik = $this->db->get_where('pengenalan_tempat', array('nik' => $nik));
            if ($check_nik->row_array() > 0) {
                $this->session->set_flashdata('flasherror', 'NIK Sudah Terdaftar');
                redirect('pmks/klasifikasi');
            } else {
                $this->db->insert('pengenalan_tempat', $data);
                $this->session->set_flashdata('flash', 'Pengajuan baru berhasil ditambahkan');
                redirect('pmks/klasifikasi');
            }
        } elseif ($catatan_kepolisian == 1) {

            // cek jika ada gambar yg akan di upload
            $upload_foto = $_FILES['foto'];

            if ($upload_foto) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
                $config['max_size']  = '1000';
                $config['max_width']  = '5000';
                $config['max_height']  = '5000';
                $config['upload_path'] = './assets/verivikasi/gambar/';
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama_responden' => $this->input->post('nama_responden'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'usia' => $this->input->post('usia'),
                'nik' => $this->input->post('nik'),
                'nokk' => $this->input->post('nokk'),
                'no_telepon' => $this->input->post('no_telepon'),
                'nama_kk' => $this->input->post('nama_kk'),
                'alamat' => $this->input->post('alamat'),
                'nama_pendata' => $this->input->post('nama_pendata'),
                'nama_pengawas' => $this->input->post('nama_pengawas'),
                'tanggal_pendataan' => $this->input->post('tanggal_pendataan'),
                "keluarga" => $this->input->post('keluarga', true),
                "kesehatan" => $this->input->post('kesehatan', true),
                "ekonomi" => $this->input->post('ekonomi', true),
                "lingkungan" => $this->input->post('lingkungan', true),
                "pekerjaan_tetap" => $this->input->post('pekerjaan_tetap', true),
                "catatan_kepolisian" => $this->input->post('catatan_kepolisian', true),
                "tempat_tinggal" => $this->input->post('tempat_tinggal', true),
                "korban_bencana" => $this->input->post('korban_bencana', true),
                "menikah" => $this->input->post('menikah', true),
                "hasil_pmks" => 3
            ];
            $nik = $this->input->post('nik');
            $check_nik = $this->db->get_where('pengenalan_tempat', array('nik' => $nik));
            if ($check_nik->row_array() > 0) {
                $this->session->set_flashdata('flasherror', 'NIK Sudah Terdaftar');
                redirect('pmks/klasifikasi');
            } else {
                $this->db->insert('pengenalan_tempat', $data);
                $this->session->set_flashdata('flash', 'Pengajuan baru berhasil ditambahkan');
                redirect('pmks/klasifikasi');
            }
        } elseif ($catatan_kepolisian == 2) {

            // cek jika ada gambar yg akan di upload
            $upload_foto = $_FILES['foto'];

            if ($upload_foto) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
                $config['max_size']  = '1000';
                $config['max_width']  = '5000';
                $config['max_height']  = '5000';
                $config['upload_path'] = './assets/verivikasi/gambar/';
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama_responden' => $this->input->post('nama_responden'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'usia' => $this->input->post('usia'),
                'nik' => $this->input->post('nik'),
                'nokk' => $this->input->post('nokk'),
                'no_telepon' => $this->input->post('no_telepon'),
                'nama_kk' => $this->input->post('nama_kk'),
                'alamat' => $this->input->post('alamat'),
                'nama_pendata' => $this->input->post('nama_pendata'),
                'nama_pengawas' => $this->input->post('nama_pengawas'),
                'tanggal_pendataan' => $this->input->post('tanggal_pendataan'),
                "keluarga" => $this->input->post('keluarga', true),
                "kesehatan" => $this->input->post('kesehatan', true),
                "ekonomi" => $this->input->post('ekonomi', true),
                "lingkungan" => $this->input->post('lingkungan', true),
                "pekerjaan_tetap" => $this->input->post('pekerjaan_tetap', true),
                "catatan_kepolisian" => $this->input->post('catatan_kepolisian', true),
                "tempat_tinggal" => $this->input->post('tempat_tinggal', true),
                "korban_bencana" => $this->input->post('korban_bencana', true),
                "menikah" => $this->input->post('menikah', true),
                "hasil_pmks" => 20
            ];
            $nik = $this->input->post('nik');
            $check_nik = $this->db->get_where('pengenalan_tempat', array('nik' => $nik));
            if ($check_nik->row_array() > 0) {
                $this->session->set_flashdata('flasherror', 'NIK Sudah Terdaftar');
                redirect('pmks/klasifikasi');
            } else {
                $this->db->insert('pengenalan_tempat', $data);
                $this->session->set_flashdata('flash', 'Pengajuan baru berhasil ditambahkan');
                redirect('pmks/klasifikasi');
            }
        } elseif ($menikah == 1) {

            // cek jika ada gambar yg akan di upload
            $upload_foto = $_FILES['foto'];

            if ($upload_foto) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
                $config['max_size']  = '1000';
                $config['max_width']  = '5000';
                $config['max_height']  = '5000';
                $config['upload_path'] = './assets/verivikasi/gambar/';
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama_responden' => $this->input->post('nama_responden'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'usia' => $this->input->post('usia'),
                'nik' => $this->input->post('nik'),
                'nokk' => $this->input->post('nokk'),
                'no_telepon' => $this->input->post('no_telepon'),
                'nama_kk' => $this->input->post('nama_kk'),
                'alamat' => $this->input->post('alamat'),
                'nama_pendata' => $this->input->post('nama_pendata'),
                'nama_pengawas' => $this->input->post('nama_pengawas'),
                'tanggal_pendataan' => $this->input->post('tanggal_pendataan'),
                "keluarga" => $this->input->post('keluarga', true),
                "kesehatan" => $this->input->post('kesehatan', true),
                "ekonomi" => $this->input->post('ekonomi', true),
                "lingkungan" => $this->input->post('lingkungan', true),
                "pekerjaan_tetap" => $this->input->post('pekerjaan_tetap', true),
                "catatan_kepolisian" => $this->input->post('catatan_kepolisian', true),
                "tempat_tinggal" => $this->input->post('tempat_tinggal', true),
                "korban_bencana" => $this->input->post('korban_bencana', true),
                "menikah" => $this->input->post('menikah', true),
                "hasil_pmks" => 26
            ];
            $nik = $this->input->post('nik');
            $check_nik = $this->db->get_where('pengenalan_tempat', array('nik' => $nik));
            if ($check_nik->row_array() > 0) {
                $this->session->set_flashdata('flasherror', 'NIK Sudah Terdaftar');
                redirect('pmks/klasifikasi');
            } else {
                $this->db->insert('pengenalan_tempat', $data);
                $this->session->set_flashdata('flash', 'Pengajuan baru berhasil ditambahkan');
                redirect('pmks/klasifikasi');
            }
        } else {

            // cek jika ada gambar yg akan di upload
            $upload_foto = $_FILES['foto'];

            if ($upload_foto) {
                $config['allowed_types'] = 'jpeg|gif|jpg|png|pdf';
                $config['max_size']  = '1000';
                $config['max_width']  = '5000';
                $config['max_height']  = '5000';
                $config['upload_path'] = './assets/verivikasi/gambar/';
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama_responden' => $this->input->post('nama_responden'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'usia' => $this->input->post('usia'),
                'nik' => $this->input->post('nik'),
                'nokk' => $this->input->post('nokk'),
                'no_telepon' => $this->input->post('no_telepon'),
                'nama_kk' => $this->input->post('nama_kk'),
                'alamat' => $this->input->post('alamat'),
                'nama_pendata' => $this->input->post('nama_pendata'),
                'nama_pengawas' => $this->input->post('nama_pengawas'),
                'tanggal_pendataan' => $this->input->post('tanggal_pendataan'),
                "keluarga" => $this->input->post('keluarga', true),
                "kesehatan" => $this->input->post('kesehatan', true),
                "ekonomi" => $this->input->post('ekonomi', true),
                "lingkungan" => $this->input->post('lingkungan', true),
                "pekerjaan_tetap" => $this->input->post('pekerjaan_tetap', true),
                "catatan_kepolisian" => $this->input->post('catatan_kepolisian', true),
                "tempat_tinggal" => $this->input->post('tempat_tinggal', true),
                "korban_bencana" => $this->input->post('korban_bencana', true),
                "menikah" => $this->input->post('menikah', true),
                "hasil_pmks" => 0
            ];
            $nik = $this->input->post('nik');
            $check_nik = $this->db->get_where('pengenalan_tempat', array('nik' => $nik));
            if ($check_nik->row_array() > 0) {
                $this->session->set_flashdata('flasherror', 'NIK Sudah Terdaftar');
                redirect('pmks/klasifikasi');
            } else {
                $this->db->insert('pengenalan_tempat', $data);
                $this->session->set_flashdata('flash', 'Pengajuan baru berhasil ditambahkan');
                redirect('pmks/klasifikasi');
            }
        }
    }

    // UBAH PMKS
    public function ubahpmks($id)
    {
        $data['title'] = 'Form Edit PMKS';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu1'] = 'PMKS';
        $data['pmks'] = $this->db->get('pengenalan_tempat')->result_array();

        $data['pengenalan_tempat'] = $this->Model->getPmksById($id);

        $this->form_validation->set_rules('nama_responden', 'Nama Responden', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat & Tanggal Lahir', 'required');
        $this->form_validation->set_rules('usia', 'Usia', 'required');
        $this->form_validation->set_rules('no_telepon', 'No Telepon', 'required');
        $this->form_validation->set_rules('nama_kk', 'Nama Kepala Keluarga', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pmks/ubahpmks', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Model->ubahDataPmks();
            $this->session->set_flashdata('flash', 'Data sosial Diubah');
            redirect('pmks/index');
        }
        // detail
    }

    public function detailpmks($id)
    {
        $data['title'] = 'Detail PMKS';
        $data['menu1'] = 'pmks';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['proposal'] = $this->Model->getDetailpmksById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pmks/detailpmks', $data);
        $this->load->view('templates/footer');
    }
}
