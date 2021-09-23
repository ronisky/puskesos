            <!-- Main content -->
            <section class="content">
                <?= form_error('role', '<div class="alert alert-danger col-lg-3" role="alert">', '</div>');  ?>

                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                <!-- Default box -->
                <div class="card-body">
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <input type="hidden" name="id_pengenalan" value="<?= $d_pmks['id_pengenalan']; ?>">
                        <div class="form-group">
                            <label for="role">Nama Responden</label>
                            <input type="text" class="form-control" id="nama_responden" name="nama_responden" value="<?= $d_pmks['nama_responden']; ?>">
                            <label for="role">Tempat Tanggal Lahir</label>
                            <input type="text" class="form-control" id="tempat_tanggallahir" name="tempat_tanggallahir" value="<?= $d_pmks['tempat_tanggallahir']; ?>">
                            <label for="role">Usia</label>
                            <input type="text" class="form-control" id="usia" name="usia" value="<?= $d_pmks['usia']; ?>">
                            <label for="role">No Telepon</label>
                            <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="<?= $d_pmks['no_telepon']; ?>">
                            <label for="role">Nama Kepala Keluarga</label>
                            <input type="text" class="form-control" id="nama_kk" name="nama_kk" value="<?= $d_pmks['nama_kk']; ?>">
                            <label for="role">Alamat Lengkap</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $d_pmks['alamat']; ?>">
                            <label for="role">Nama Pendata</label>
                            <input type="text" class="form-control" id="nama_pendata" name="nama_pendata" value="<?= $d_pmks['nama_pendata']; ?>">
                            <label for="role">Tempat Tanggal Lahir</label>
                            <input type="text" class="form-control" id="nama_pengawas" name="nama_pengawas" value="<?= $d_pmks['nama_pengawas']; ?>">
                            <label for="role">Tanggal Pendataan</label>
                            <input type="text" class="form-control" id="tanggal_pendataan" name="tanggal_pendataan" value="<?= $d_pmks['tanggal_pendataan']; ?>">
                        </div>
                    </div>
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->