<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendidikan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
        $this->load->model('ExportModel');
        $this->load->library('pdf');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Proposal Pendidikan';
        $data['menu1'] = 'pendidikan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $data['pendidikan'] = $this->db->get_where('proposal', ['nama_organisasi' => $this->session->userdata('nama_organisasi')])->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nama_proposal', 'Nama Proposal', 'required');
        $this->form_validation->set_rules('nis', 'No Induk Sekolah', 'required');
        $this->form_validation->set_rules('nisn', 'No Induk Siswa', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('asal_sekolah', 'Asal Sekolah', 'required');
        $this->form_validation->set_rules('tempat_tgllahir', 'Tempat, Tanggal Lahir', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
        $this->form_validation->set_rules('dtks', 'DTKS', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pendidikan/index', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $nama_proposal = $this->input->post('nama_proposal');
            $nis = $this->input->post('nis');
            $nisn = $this->input->post('nisn');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $alamat = $this->input->post('alamat');
            $asal_sekolah = $this->input->post('asal_sekolah');
            $tempat_tgllahir = $this->input->post('tempat_tgllahir');
            $agama = $this->input->post('agama');
            $tujuan = $this->input->post('tujuan');
            $dtks = $this->input->post('dtks');
            $nama_organisasi = $this->input->post('nama_organisasi');

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
            $this->db->set('nama', $nama);
            $this->db->set('nama_proposal', $nama_proposal);
            $this->db->set('nis', $nis);
            $this->db->set('nisn', $nisn);
            $this->db->set('jenis_kelamin', $jenis_kelamin);
            $this->db->set('alamat', $alamat);
            $this->db->set('asal_sekolah', $asal_sekolah);
            $this->db->set('tempat_tgllahir', $tempat_tgllahir);
            $this->db->set('agama', $agama);
            $this->db->set('tujuan', $tujuan);
            $this->db->set('dtks', $dtks);
            $this->db->set('nama_organisasi', $nama_organisasi);
            $this->db->insert('proposal');

            $this->session->set_flashdata('flash', 'Pengajuan baru berhasil ditambahkan');
            redirect('pendidikan');
        }
    }

    // ubah pendidikan
    public function ubahpendidikan($id)
    {
        $data['title'] = 'Form Edit Pendidikan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu1'] = 'Pendidikan';
        $data['pendidikan'] = $this->db->get('proposal')->result_array();

        $data['proposal'] = $this->Model->getPendidikanById($id);

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tempat_tgllahir', 'Tempat, Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('nama_proposal', 'Nama Proposal', 'required');
        $this->form_validation->set_rules('nis', 'No Induk Sekolah', 'required');
        $this->form_validation->set_rules('nisn', 'No Induk Siswa', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('asal_sekolah', 'Asal Sekolah', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pendidikan/ubahpendidikan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Model->ubahPendidikan();
            $this->session->set_flashdata('flash', 'Data Pendidikan Diubah');
            redirect('pendidikan/index');
        }
    }
    //  laporan keluhan
    public function laporankeluhan()
    {
        $data = array();

        $data['title'] = 'Laporan Pendidikan';
        $data['menu1'] = 'Pendidikan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        //$data['pendidikan'] = $this->db->get('proposal')->result_array();
        $data['pendidikan'] = $this->db->query("SELECT * from proposal where konfirmasi = 2 and nama_organisasi = 'Bidang Pendidikan' or konfirmasi = 1 and nama_organisasi = 'Bidang Pendidikan'")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendidikan/laporankeluhan', $data);
        $this->load->view('templates/footer');
    }

    // detail

    public function detailpendidikan($id)
    {
        $data['title'] = 'Detail Pendidikan';
        $data['menu1'] = 'Pendidikan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['proposal'] = $this->Model->getDetailPendidikanById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendidikan/detailpendidikan', $data);
        $this->load->view('templates/footer');
    }

    public function export()
    {
        // Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        // Settingan awal fil excel
        $excel->getProperties()->setCreator('My Notes Code')
            ->setLastModifiedBy('My Notes Code')
            ->setTitle("Data Proposal")
            ->setSubject("Proposal")
            ->setDescription("Laporan Semua Data Proposal")
            ->setKeywords("Data Proposal");
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
            'font' => array('bold' => true), // Set font nya jadi bold
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA PROPOSAL PENGAJUAN PENDIDIKAN PUSKESOS KATAPANG"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->mergeCells('A1:M1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "NAMA"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA PROPOSAL"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "NAMA ORGANISASI"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "Nomor Induk Kependudukan"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "Nomor Kartu Keluarga"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('G3', "JENIS KELAMIN"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('H3', "ALAMAT"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('I3', "ASAL SEKOLAH"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('J3', "TEMPAT TANGGAL LAHIR"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('K3', "AGAMA"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('L3', "TUJUAN"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('M3', "DTKS"); // Set kolom E3 dengan tulisan "ALAMAT"


        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);

        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $siswa = $this->ExportModel->ExportPendidikan();
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($siswa as $data) { // Lakukan looping pada variabel siswa
            $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->nama);
            $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->nama_proposal);
            $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->nama_organisasi);
            $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->nis);
            $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->nisn);
            $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data->jenis_kelamin);
            $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data->alamat);
            $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $data->asal_sekolah);
            $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $data->tempat_tgllahir);
            $excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $data->agama);
            $excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, $data->tujuan);
            $excel->setActiveSheetIndex(0)->setCellValue('M' . $numrow, $data->dtks);


            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('J' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('K' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('L' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('M' . $numrow)->applyFromArray($style_row);


            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('J')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('K')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('L')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('M')->setWidth(30); // Set width kolom E


        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Laporan Data proposal");
        $excel->setActiveSheetIndex(0);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Proposal.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }

    function cetak($id_proposal)
    {
        // get data from db
        $proposal = $this->db->get_where('proposal', ['id_proposal' => $id_proposal])->row_array();

        $pdf = new FPDF();

        // membuat halaman baru
        $pdf->AddPage();

        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);

        // mencetak string 
        $pdf->Image('assets/image/logo.jpg', 10, 0, 190, 40);
        $pdf->Cell(190, 7, '', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(190, 10, '', 0, 1, 'C');


        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(20, 20, '', 0, 1);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 5, 'SURAT KETERANGAN', 0, 1, 'C');
        $pdf->Cell(0, 5, 'Nomor :          /Pusk.AS/DS/V/2019', 0, 1, 'C');

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);

        // Kata pengantar
        $pdf->Cell(0, 5, 'Yang bertandatangan dibawah ini, Puskesos As-Salaam Desa Katapang, Kecamatan Katapang', 0, 1, 'C');
        $pdf->Cell(10, 6, '      Kabupaten Bandung. Menerangkan bahwa:', 0, 1);

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);

        //Data Isian
        $pdf->SetFont('Arial', '', 10); // first of line
        $pdf->Cell(40, 6, '', 0, 0);
        $pdf->Cell(52, 6, 'Nama Lengkap                           :', 0, 0);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(20, 6, $proposal['nama'], 0, 1); //end of line

        $pdf->Cell(40, 6, '', 0, 0); // first of line
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(52, 6, 'Nomor Induk Kependudukan     :', 0, 0);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(34, 6, $proposal['nis'], 0, 1); //end of line

        $pdf->Cell(40, 6, '', 0, 0); // first of line
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(52, 6, 'Nomor Kartu Keluarga               :', 0, 0);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(34, 6, $proposal['nisn'], 0, 1); //end of line

        $pdf->Cell(40, 6, '', 0, 0); // first of line
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(52, 6, 'Tempat, Tanggal Lahir               :', 0, 0);
        $pdf->Cell(34, 6, $proposal['tempat_tgllahir'], 0, 1); //end of line

        $pdf->Cell(40, 6, '', 0, 0); // first of line
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(52, 6, 'Jenis Kelamin                             :', 0, 0);
        $pdf->Cell(34, 6, $proposal['jenis_kelamin'], 0, 1); //end of line

        $pdf->Cell(40, 6, '', 0, 0); // first of line
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(52, 6, 'Agama                                        :', 0, 0);
        $pdf->Cell(34, 6, $proposal['agama'], 0, 1); //end of line

        $pdf->Cell(40, 6, '', 0, 0); // first of line
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(52, 6, 'Pendidikan                                 :', 0, 0);
        $pdf->Cell(34, 6, $proposal['asal_sekolah'], 0, 1); //end of line

        $pdf->Cell(40, 6, '', 0, 0); // first of line
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(52, 6, 'Keperluan                                   :', 0, 0);
        $pdf->Cell(34, 6, $proposal['tujuan'], 0, 1); //end of line

        $pdf->Cell(40, 6, '', 0, 0); // first of line
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(52, 6, 'Alamat                                        :', 0, 0);
        $pdf->Cell(34, 6, $proposal['alamat'], 0, 1); //end of line

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->Cell(10, 6, '      Orang tersebut diatas benar warga Desa Katapang Kecamatan Katapang  yang  pada saat ini kondisi Ekonominya', 0, 1);
        $pdf->Cell(10, 6, 'tidak mampu dan termasuk kategori Keluarga Miskin dan terdaftar di Data Terpadu Kesejahteraan Sosial (DTKS)', 0, 1);
        $pdf->Cell(41, 6, 'dengan nomor ID DTKS : ', 0, 0);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(33, 6, $proposal['dtks'], 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(10, 6, '(KK, dan KTP Terlampir).', 0, 1);
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->Cell(10, 6, '      Surat keterangan ini akan di gunakan untuk :', 0, 1);
        $pdf->SetFont('Arial', 'BU', 11);
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->Cell(190, 6, 'Melengkapi Persaratan Pembuatan Surat Keterangan Tidak Mampu (SKTM) Pendidikan', 0, 1, 'C');
        //set font to arial, regular, 12pt
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->Cell(10, 6, '     Demikian surat keterangan ini, sebagai bahan pertimbangan lebih lanjut sesuai peraturan perundang-undangan.', 0, 1);

        $pdf->Cell(0, 20, '', 0, 1);
        $pdf->Cell(0, 6, 'Katapang, 21 September 2021', 0, 1, 'R');
        $pdf->Cell(0, 6,  'Ketua Puskesos As-Salaam', 0, 1, 'R');
        $pdf->Cell(0, 20, '', 0, 1);
        $pdf->SetFont('Arial', 'BU', 11);
        $pdf->Cell(0, 6,  'ARI JOHAR ALAMSYAH, S.Pd.I.', 0, 1, 'R');





        $pdf->Output();
    }
}
