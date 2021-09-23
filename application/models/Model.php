<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model extends CI_model
{
    public function hapusRole($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('user_role', ['id' => $id]);
    }

    public function ubahRole()
    {
        $data = [
            "role" => $this->input->post('role', true),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_role', $data);
    }

    public function getRoleById($id)
    {
        return $this->db->get_where('user_role', ['id' => $id])->row_array();
    }

    // PENDIDIKAN
    public function ubahPendidikan()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nama_proposal" => $this->input->post('nama_proposal', true),
            "nis" => $this->input->post('nis', true),
            "nisn" => $this->input->post('nisn', true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
            "alamat" => $this->input->post('alamat', true),
            "asal_sekolah" => $this->input->post('asal_sekolah', true),
            "tempat_tgllahir" => $this->input->post('tempat_tgllahir', true),
            "agama" => $this->input->post('agama', true),
        ];

        $this->db->where('id_proposal', $this->input->post('id_proposal'));
        $this->db->update('proposal', $data);
    }


    public function getPendidikanById($id_proposal)
    {
        return $this->db->get_where('proposal', ['id_proposal' => $id_proposal])->row_array();
    }

    // KESEHATAN
    public function ubahkesehatan()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nama_proposal" => $this->input->post('nama_proposal', true),
            "nis" => $this->input->post('nis', true),
            "nisn" => $this->input->post('nisn', true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
            "alamat" => $this->input->post('alamat', true),
            "asal_sekolah" => $this->input->post('asal_sekolah', true),
            "tempat_tgllahir" => $this->input->post('tempat_tgllahir', true),
            "agama" => $this->input->post('agama', true),
        ];

        $this->db->where('id_proposal', $this->input->post('id_proposal'));
        $this->db->update('proposal', $data);
    }

    public function getkesehatanById($id_proposal)
    {
        return $this->db->get_where('proposal', ['id_proposal' => $id_proposal])->row_array();
    }
    // SOSIAL
    public function ubahsosial()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nama_proposal" => $this->input->post('nama_proposal', true),
            "nis" => $this->input->post('nis', true),
            "nisn" => $this->input->post('nisn', true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
            "alamat" => $this->input->post('alamat', true),
            "asal_sekolah" => $this->input->post('asal_sekolah', true),
            "tempat_tgllahir" => $this->input->post('tempat_tgllahir', true),
            "agama" => $this->input->post('agama', true),
        ];

        $this->db->where('id_proposal', $this->input->post('id_proposal'));
        $this->db->update('proposal', $data);
    }

    public function getsosialById($id_proposal)
    {
        return $this->db->get_where('proposal', ['id_proposal' => $id_proposal])->row_array();
    }

    public function getUserById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    public function ubahDataUser()
    {
        $data = [

            "name" => $this->input->post('name', true),
            "email" => $this->input->post('email', true),
            "role_id" => $this->input->post('role_id', true),
            "is_active" => $this->input->post('is_active', true),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);
    }

    public function hapusUser($id)
    {
        $this->db->delete('user', ['id' => $id]);
    }

    public function ubahMenu()
    {
        $data = [
            'menu' => $this->input->post('menu', true),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_menu', $data);
    }

    public function getMenuById($id)
    {
        return $this->db->get_where('user_menu', ['id' => $id])->row_array();
    }

    public function hapusMenu($id)
    {
        $this->db->delete('user_menu', ['id' => $id]);
    }

    public function ubahSubMenu()
    {
        $data = [
            'menu_id' => $this->input->post('menu_id', true),
            'title' => $this->input->post('title', true),
            'url' => $this->input->post('url', true),
            'icon' => $this->input->post('icon', true),
            'is_active' => $this->input->post('is_active', true),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_sub_menu', $data);
    }

    public function getSubMenuById($id)
    {
        return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
    }
    public function hapusSubMenu($id)
    {
        $this->db->delete('user_sub_menu', ['id' => $id]);
    }
    //hapus pendidikan
    public function hapusPendidikan($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('proposal', ['id_proposal' => $id]);
    }
    //hapus kesehatan
    public function hapusKesehatan($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('proposal', ['id_proposal' => $id]);
    }
    //hapus sosial
    public function hapusSosial($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('proposal', ['id_proposal' => $id]);
    }
    // hapus Pmks
    public function hapusPmks($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('pengenalan_tempat', ['id_pengenalan' => $id]);
    }
    // PMKS
    public function ubahDataPmks()
    {
        $data = [
            "nama_responden" => $this->input->post('nama_responden', true),
            "tempat_tanggallahir" => $this->input->post('tempat_tanggallahir', true),
            "usia" => $this->input->post('usia', true),
            "no_telepon" => $this->input->post('no_telepon', true),
            "nama_kk" => $this->input->post('nama_kk', true),
            "alamat" => $this->input->post('alamat', true),
        ];

        $this->db->where('id_pengenalan', $this->input->post('id_pengenalan'));
        $this->db->update('pengenalan_tempat', $data);
    }

    public function getPmksById($id_pengenalan)
    {
        return $this->db->get_where('pengenalan_tempat', ['id_pengenalan' => $id_pengenalan])->row_array();
    }

    public function updateStatus($id, $where)
    {
        $this->db->set('konfirmasi', $where);
        $this->db->where('id_proposal', $id);
        $this->db->update('proposal');
    }

    public function updateStatusPmks($id, $where)
    {
        $this->db->set('konfirmasi_pmks', $where);
        $this->db->where('id_pengenalan', $id);
        $this->db->update('pengenalan_tempat');
    }

    public function getDetailProposalById($id)
    {
        return $this->db->get_where('proposal', ['id_proposal' => $id])->row_array();
    }

    public function getDetailPmksById($id)
    {
        return $this->db->get_where('pengenalan_tempat', ['id_pengenalan' => $id])->row_array();
    }

    public function hapusPengajuan($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('proposal', ['id_proposal' => $id]);
    }

    public function hapuslaporan($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('proposal', ['id_proposal' => $id]);
    }
    public function getDetailPendidikanById($id)
    {
        return $this->db->get_where('proposal', ['id_proposal' => $id])->row_array();
    }
    public function getDetailKesehatanById($id)
    {
        return $this->db->get_where('proposal', ['id_proposal' => $id])->row_array();
    }
    public function getDetailSosialById($id)
    {
        return $this->db->get_where('proposal', ['id_proposal' => $id])->row_array();
    }
    public function getDetailpengajuanById($id)
    {
        return $this->db->get_where('proposal', ['id_proposal' => $id])->row_array();
    }
}
