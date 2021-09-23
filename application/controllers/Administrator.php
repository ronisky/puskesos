<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
    }

    public function hapusRole($id)
    {
        $this->Model->hapusRole($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/role');
    }

    public function hapusUser($id)
    {
        $this->Model->hapusUser($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/adduserlist');
    }

    public function hapusMenu($id)
    {
        $this->Model->hapusMenu($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('menu');
    }

    public function hapusSubMenu($id)
    {
        $this->Model->hapusSubMenu($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('menu/submenu');
    }

    public function hapusPendidikan($id)
    {
        $this->Model->hapusPendidikan($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('pendidikan');
    }

    public function hapusKesehatan($id)
    {
        $this->Model->hapusKesehatan($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('kesehatan');
    }

    public function hapusSosial($id)
    {
        $this->Model->hapusSosial($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('sosial');
    }

    public function hapusPmks($id)
    {
        $this->Model->hapusPmks($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('pmks');
    }

    public function hapusHasilPengajuan($id)
    {
        $this->Model->hapusPengajuan($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/kelolahasilpengajuan');
    }

    public function hapusHasilPmks($id)
    {
        $this->Model->hapusPmks($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/kelolahasilpmks');
    }

    public function hapuslaporanPengajuan($id)
    {
        $this->Model->hapuslaporan($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/laporanpengajuan');
    }
}
