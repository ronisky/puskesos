            <!-- Main content -->
            <section class="content">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger col-lg-3 text-center" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>

                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                <?php if ($this->session->flashdata('flasherror')) { ?>
                    <div class="alert alert-danger"> <?= $this->session->flashdata('flasherror') ?> </div>
                <?php } ?>
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <label>Kriteria Penyandang Masalah Sosial</label>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <form action="<?= base_url('pmks/klasifikasi'); ?>" method="post">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nama Responden : </label>
                                        <input id="nama_responden" name="nama_responden" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Induk Kependudukan: </label>
                                        <input type="number" class="form-control" id="nik" name="nik" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Kartu Keluarga: </label>
                                        <input type="number" class="form-control" id="nokk" name="nokk" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Kelapala Keluarga: </label>
                                        <input type="text" class="form-control" id="nama_kk" name="nama_kk" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat: </label>
                                        <textarea type="text" class="form-control" rows="5" id="alamat" name="alamat" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Pendataan: </label>
                                        <input type="text" class="form-control" id="tanggal_pendataan" name="tanggal_pendataan" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tempat Lahir : </label>
                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir : </label>
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Usia : </label>
                                        <input type="text" class="form-control" id="usia" name="usia" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>No Telepon: </label>
                                        <input type="number" class="form-control" id="no_telepon" name="no_telepon" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Petugas Pendata: </label>
                                        <input type="text" class="form-control" id="nama_pendata" name="nama_pendata" value="<?= $user['name']; ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Petugas Pengawas: </label>
                                        <input type="text" class="form-control" id="nama_pengawas" name="nama_pengawas" value="Ketua" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group" id="keluarga" hidden>
                                        <label for="">Keadaan Keluarga</label>
                                        <select class="form-control" id="keluarga" name="keluarga">
                                            <option value="0">Pilih</option>
                                            <option value="1">Harmonis</option>
                                            <option value="2">Tidak Harmonis</option>
                                            <option value="3">Terlantar</option>
                                        </select>
                                    </div>

                                    <div class="form-group" id="kesehatan" hidden>
                                        <label for="">Kesehatan</label>
                                        <select class="form-control" id="kesehatan" name="kesehatan">
                                            <option value="0">Pilih</option>
                                            <option value="1">Sehat</option>
                                            <option value="2">Disabilitas</option>
                                            <option value="3">Penyakit Berat</option>
                                            <option value="4">Pengguna NAFZA</option>
                                        </select>
                                    </div>

                                    <div class="form-group" id="ekonomi" hidden>
                                        <label for="">Keadaan Ekonomi</label>
                                        <select class="form-control" id="ekonomi" name="ekonomi">
                                            <option value="0">Pilih</option>
                                            <option value="1">Mampu</option>
                                            <option value="2">Tidak Mampu</option>
                                        </select>
                                    </div>

                                    <div class="form-group" id="lingkungan" hidden>
                                        <label for="">Keadaan Lingkungan</label>
                                        <select class="form-control" id="lingkungan" name="lingkungan">
                                            <option value="0">Pilih</option>
                                            <option value="1">Baik</option>
                                            <option value="2">Tidak Baik</option>
                                        </select>
                                    </div>

                                    <div class="form-group" id="pekerjaan_tetap" hidden>
                                        <label for="">Pekerjaan</label>
                                        <select class="form-control" id="pekerjaan_tetap" name="pekerjaan_tetap">
                                            <option value="0">Pilih</option>
                                            <option value="1">Memiliki</option>
                                            <option value="2">Tidak Memiliki</option>
                                        </select>
                                    </div>

                                    <div class="form-group" id="catatan_kepolisian" hidden>
                                        <label for="">Catatan Kepolisian</label>
                                        <select class="form-control" id="catatan_kepolisian" name="catatan_kepolisian">
                                            <option value="0">Pilih</option>
                                            <option value="1">Ada</option>
                                            <option value="2">Tidak Ada</option>
                                        </select>
                                    </div>

                                    <div class="form-group" id="tempat_tinggal" hidden>
                                        <label for="">Tempat Tinggal</label>
                                        <select class="form-control" id="tempat_tinggal" name="tempat_tinggal">
                                            <option value="0">Pilih</option>
                                            <option value="1">Tidak Memiliki</option>
                                            <option value="2">Memiliki</option>
                                            <option value="3">Sementara</option>
                                        </select>
                                    </div>

                                    <div class="form-group" id="korban_bencana" hidden>
                                        <label for="">Korban Dari Bencana</label>
                                        <select class="form-control" id="korban_bencana" name="korban_bencana">
                                            <option value="0">Pilih</option>
                                            <option value="1">Alam</option>
                                            <option value="2">Sosial</option>
                                        </select>
                                    </div>

                                    <div class="form-group" id="menikah" hidden>
                                        <label for="">Status Pekawinan</label>
                                        <select class="form-control" id="menikah" name="menikah">
                                            <option value="0">Pilih</option>
                                            <option value="1">Menikah</option>
                                            <option value="2">Belum Menikah</option>
                                            <option value="3">Cerai</option>
                                        </select>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a class="">PUSKESOS As-Salaam</a>
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->