            <!-- Main content -->
            <section class="content">

                <?= form_error('sosial', '<div class="alert alert-danger col-lg-3" role="alert">', '</div>'); ?>

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
                                <input type="hidden" name="id_pengenalan" value="<?= $pengenalan_tempat['id_pengenalan']; ?>">
                                <div class="form-group">
                                    <label for="role">Nama Responden</label>
                                    <input type="text" class="form-control" id="nama_responden" name="nama_responden" value="<?= $pengenalan_tempat['nama_responden']; ?>">
                                    <label for="role">Tempat Tanggal Lahir</label>
                                    <input type="text" class="form-control" id="tempat_tanggallahir" name="tempat_tanggallahir" value="<?= $pengenalan_tempat['tempat_tanggallahir']; ?>">
                                    <label for="role">Usia</label>
                                    <input type="text" class="form-control" id="usia" name="usia" value="<?= $pengenalan_tempat['usia']; ?>">
                                    <label for="role">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="<?= $pengenalan_tempat['no_telepon']; ?>">
                                    <label for="role">Nama Kepala Keluarga</label>
                                    <input type="text" class="form-control" id="nama_kk" name="nama_kk" value="<?= $pengenalan_tempat['nama_kk']; ?>">
                                    <label for="role">Alamat Lengkap</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $pengenalan_tempat['alamat']; ?>">
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