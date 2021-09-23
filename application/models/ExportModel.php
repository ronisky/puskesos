<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class ExportModel extends CI_Model
{
    public function ExportPendidikan()
    {
        return $this->db->get_where('proposal', ['nama_proposal' => 'pendidikan'])->result(); // Tampilkan semua data yang ada di tabel proposal berdasarkan pendidikan
    }

    public function ExportKesehatan()
    {
        return $this->db->get_where('proposal', ['nama_proposal' => 'kesehatan'])->result(); // Tampilkan semua data yang ada di tabel proposal berdasarkan kesehatan
    }

    public function ExportSosial()
    {
        return $this->db->get_where('proposal', ['nama_proposal' => 'Sosial'])->result(); // Tampilkan semua data yang ada di tabel proposal berdasarkan sosial
    }
}
