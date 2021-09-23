            <!-- Main content -->
            <section class="content">
                <?= form_error('role', '<div class="alert alert-danger col-lg-3" role="alert">', '</div>');  ?>

                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Responden</th>
                                    <th scope="col">Usia</th>
                                    <th scope="col">Nama Kepala Keluarga</th>
                                    <th scope="col">Nomor Induk Kependudukan</th>
                                    <th scope="col">Nomor Kartu Keluarga</th>
                                    <th scope="col">Tanggal Pendataan</th>
                                    <th scope="col">Hasil PMKS</th>
                                    <th scope="col">Konfirmasi</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pengenalan as $hp) :
                                    if ($hp['hasil_pmks'] == 1) {
                                        $hpv = '<span class="badge badge-danger">Anak Balita Terlantar</span>';
                                    } elseif ($hp['hasil_pmks'] == 2) {
                                        $hpv = '<span class="badge badge-warning">Anak Terlantar</span>';
                                    } elseif ($hp['hasil_pmks'] == 3) {
                                        $hpv = '<span class="badge badge-warning">Anak Yang Berhadapan Dengan Hukum</span>';
                                    } elseif ($hp['hasil_pmks'] == 4) {
                                        $hpv = '<span class="badge badge-warning">Anak Jalanan</span>';
                                    } elseif ($hp['hasil_pmks'] == 5) {
                                        $hpv = '<span class="badge badge-warning">Anak Dengan kedisabilitasan</span>';
                                    } elseif ($hp['hasil_pmks'] == 6) {
                                        $hpv = '<span class="badge badge-warning">Anak Yang Menjadi Korban tindak Kekerasan Atau Diperlakukan Salah</span>';
                                    } elseif ($hp['hasil_pmks'] == 7) {
                                        $hpv = '<span class="badge badge-warning">Anak Yang Memerlukan Perlindungan Khusus</span>';
                                    } elseif ($hp['hasil_pmks'] == 8) {
                                        $hpv = '<span class="badge badge-success">Lanjut Usia Terlantar</span>';
                                    } elseif ($hp['hasil_pmks'] == 9) {
                                        $hpv = '<span class="badge badge-warning">Penyandang Disabilitas</span>';
                                    } elseif ($hp['hasil_pmks'] == 10) {
                                        $hpv = '<span class="badge badge-primary">Tunasusila</span>';
                                    } elseif ($hp['hasil_pmks'] == 11) {
                                        $hpv = '<span class="badge badge-warning">Gelandangan</span>';
                                    } elseif ($hp['hasil_pmks'] == 12) {
                                        $hpv = '<span class="badge badge-primary">Pengemis</span>';
                                    } elseif ($hp['hasil_pmks'] == 13) {
                                        $hpv = '<span class="badge badge-primary">Pemulung</span>';
                                    } elseif ($hp['hasil_pmks'] == 14) {
                                        $hpv = '<span class="badge badge-primary">Kelompok Minoritas</span>';
                                    } elseif ($hp['hasil_pmks'] == 15) {
                                        $hpv = '<span class="badge badge-primary">Bekas Warga Binaan Lembaga Pemasyarakatan</span>';
                                    } elseif ($hp['hasil_pmks'] == 16) {
                                        $hpv = '<span class="badge badge-primary">Orang Dengan HIV/AIDS</span>';
                                    } elseif ($hp['hasil_pmks'] == 17) {
                                        $hpv = '<span class="badge badge-primary">Korban Penyalahgunaan NAFZA</span>';
                                    } elseif ($hp['hasil_pmks'] == 18) {
                                        $hpv = '<span class="badge badge-warning">Korban Trafficking</span>';
                                    } elseif ($hp['hasil_pmks'] == 19) {
                                        $hpv = '<span class="badge badge-warning">Korban Tindak Kekerasan</span>';
                                    } elseif ($hp['hasil_pmks'] == 20) {
                                        $hpv = '<span class="badge badge-primary">Pekerja Migran Bermasalah Sosial</span>';
                                    } elseif ($hp['hasil_pmks'] == 21) {
                                        $hpv = '<span class="badge badge-warning">Korban Bencana Alam</span>';
                                    } elseif ($hp['hasil_pmks'] == 22) {
                                        $hpv = '<span class="badge badge-warning">Korban Bencana Sosial</span>';
                                    } elseif ($hp['hasil_pmks'] == 23) {
                                        $hpv = '<span class="badge badge-primary">Perempuan Rawan Sosial Ekonomi</span>';
                                    } elseif ($hp['hasil_pmks'] == 24) {
                                        $hpv = '<span class="badge badge-warning">Fakir Miskin</span>';
                                    } elseif ($hp['hasil_pmks'] == 25) {
                                        $hpv = '<span class="badge badge-warning">Keluarga Bermasalah Sosial Psikologis</span>';
                                    } else {
                                        $hpv = '<span class="badge badge-primary">Komunitas Adat Terpencil</span>';
                                    }

                                    if ($hp['konfirmasi_pmks'] == 1) {
                                        $hpk = '<span class="badge badge-success">Di Setujui</span>';
                                    } elseif ($hp['konfirmasi_pmks'] == 2) {
                                        $hpk = '<span class="badge badge-danger">Di Tolak</span>';
                                    } else {
                                        $hpk = '<span class="badge badge-warning">Proses</span>';
                                    }
                                ?>
                                    <tr>
                                        <th scope="row"><?= $i;  ?></th>
                                        <td><?= $hp['nama_responden']; ?></td>
                                        <td><?= $hp['usia']; ?></td>
                                        <td><?= $hp['nama_kk']; ?></td>
                                        <td><?= $hp['nik']; ?></td>
                                        <td><?= $hp['nokk']; ?></td>
                                        <td><?= $hp['tanggal_pendataan']; ?></td>
                                        <td><?= $hpv ?></td>
                                        <td><?= $hpk ?></td>
                                        <td>
                                            <a href="#" class="btn btn-success" data-toggle="modal"><span class="fa fa-eye"> Detail</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                        <a class="">PUSKESOS As-Salaam</a>
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->