            <!-- Main content -->
            <section class="content">
                <?= form_error('role', '<div class="alert alert-danger col-lg-3" role="alert">', '</div>');  ?>

                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                <!-- Default box -->
                <div class="card-body">
                    <div class="container-fluid">

                        <!-- Page Heading -->

                        <input type="hidden" name="id_proposal" value="<?= $proposal['id_proposal']; ?>">
                        <div class="form-group">
                            <label for="role">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $proposal['nama']; ?>">
                            <label for="role">Judul Proposal</label>
                            <input type="text" class="form-control" id="nama_proposal" name="nama_proposal" value="<?= $proposal['nama_proposal']; ?>">
                            <label for="role">Nomor Induk Kependudukan</label>
                            <input type="text" class="form-control" id="nis" name="nis" value="<?= $proposal['nis']; ?>">
                            <label for="role">Nomor Induk Kartu Keluarga</label>
                            <input type="text" class="form-control" id="nisn" name="nisn" value="<?= $proposal['nisn']; ?>">
                            <label for="role">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= $proposal['jenis_kelamin']; ?>">
                            <label for="role">Alamat Lengkap</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $proposal['alamat']; ?>">
                            <label for="role">Asal Sekolah</label>
                            <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" value="<?= $proposal['asal_sekolah']; ?>">
                            <label for="role">Tempat Tanggal Lahir</label>
                            <input type="text" class="form-control" id="tempat_tgllahir" name="tempat_tgllahir" value="<?= $proposal['tempat_tgllahir']; ?>">
                            <label for="role">Agama</label>
                            <input type="text" class="form-control" id="agama" name="agama" value="<?= $proposal['agama']; ?>">
                        </div>
                    </div>
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->