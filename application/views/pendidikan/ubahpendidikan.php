            <!-- Main content -->
            <section class="content">

                <?= form_error('pendidikan', '<div class="alert alert-danger col-lg-3" role="alert">', '</div>'); ?>

                <?= $this->session->flashdata('message'); ?>

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
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                            <form action="" method="post" class="col-lg-6">
                                <input type="hidden" name="id_proposal" value="<?= $proposal['id_proposal']; ?>">
                                <div class="form-group">
                                    <label for="role">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $proposal['nama']; ?>">
                                    <label for="role">Tempat Tanggal Lahir</label>
                                    <input type="text" class="form-control" id="tempat_tgllahir" name="tempat_tgllahir" value="<?= $proposal['tempat_tgllahir']; ?>">
                                    <label for="role">Jenis Kelamin</label>
                                    <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= $proposal['jenis_kelamin']; ?>">
                                    <label for="role">Judul Proposal</label>
                                    <input type="text" class="form-control" id="nama_proposal" name="nama_proposal" value="<?= $proposal['nama_proposal']; ?>">
                                    <label for="role">Nomor Induk Kependudukan</label>
                                    <input type="text" class="form-control" id="nis" name="nis" value="<?= $proposal['nis']; ?>">
                                    <label for="role">Nomor Induk Kartu Keluarga</label>
                                    <input type="text" class="form-control" id="nisn" name="nisn" value="<?= $proposal['nisn']; ?>">
                                    <label for="role">DTKS</label>
                                    <input type="text" class="form-control" id="dtks" name="dtks" value="<?= $proposal['dtks']; ?>">
                                    <label for="role">Alamat Lengkap</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $proposal['alamat']; ?>">
                                    <label for="role">Asal Sekolah</label>
                                    <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" value="<?= $proposal['asal_sekolah']; ?>">
                                    <label for="role">Tujuan Sekolah</label>
                                    <input type="text" class="form-control" id="tujuan" name="tujuan" value="<?= $proposal['tujuan']; ?>">
                                    <label for="role">Agama</label>
                                    <input type="text" class="form-control" id="agama" name="agama" value="<?= $proposal['agama']; ?>">
                                </div>
                                <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">

                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->