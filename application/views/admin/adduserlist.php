            <!-- Main content -->
            <section class="content">

                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger col-lg-3 text-center" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>



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
                        <!-- Begin Page Content -->
                        <div class="container-fluid">
                            <a href="" class="btn btn-primary mb-3 open-homeEvents" data-toggle="modal" data-id="<?= $password; ?>" data-target="#newUserModal">Buat Akun</a>

                            <table id="example1" class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($addUser as $au) :
                                        if ($au['role_id'] == 1) {
                                            $role = 'Ketua';
                                        } elseif ($au['role_id'] == 2) {
                                            $role = 'Mitra PMKS';
                                        } elseif ($au['role_id'] == 3) {
                                            $role = 'Bidang Pendidikan';
                                        } elseif ($au['role_id'] == 4) {
                                            $role = 'Bidang Kesehatan';
                                        } else {
                                            $role = 'Bidang Sosial & Ekonomi';
                                        }
                                        if ($au['is_active'] == 1) {
                                            $active = '<span class="badge badge-success">Aktif</span>';
                                        } else {
                                            $active = '<span class="badge badge-danger">Tidak Aktif</span>';
                                        }
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td><?= $au['name']; ?></td>
                                            <td><?= $au['email']; ?></td>
                                            <td><?= $role; ?></td>
                                            <td><?= $active; ?></td>
                                            <td>
                                                <a href="<?= base_url();  ?>admin/ubahuser/<?= $au['id']; ?>" class="btn btn-success"><span class="fa fa-edit"> Edit</a>
                                                <a href="<?= base_url(); ?>administrator/hapusUser/<?= $au['id']; ?>" class="btn btn-danger tombol-hapus"><span class="fa fa-trash"> Hapus</a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Button trigger modal -->
                <!-- Modal -->
                <div class="modal fade" id="newUserModal" tabindex="-1" role="dialog" aria-labelledby="newUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content bg-primary">
                            <div class="modal-header">

                                <h5 class="modal-title" id="newUserModalLabel">Buat Pengguna Baru</h5>
                                <button type=" button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('admin/adduserlist'); ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap">
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Divisi</label>
                                        <select id="nama_organisasi" name="nama_organisasi" class="form-control">
                                            <option value="">Pilih Nama Organisasi</option>
                                            <option value="Ketua">Ketua</option>
                                            <option value="Mitra PMKS">Mitra PMKS</option>
                                            <option value="Bidang Pendidikan">Bidang Pendidikan</option>
                                            <option value="Bidang Kesehatan">Bidang Kesehatan</option>
                                            <option value="Bidang Sosial & Ekonomi">Bidang Sosial & Ekonomi</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                    </div>

                                    <div class="form-group">
                                        <label>Default Password :</label>
                                        <input type="text" class="form-control form-control-user" name="password1" id="password1" readonly value="<?= $password; ?>">
                                        <span id=""></span>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="password2" name="password2" readonly value="<?= $password; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Role</label>
                                        <select id="role_id" name="role_id" class="form-control">
                                            <option value="">Select Menu</option>
                                            <?php foreach ($role1 as $r) : ?>
                                                <option value="<?= $r['id'] ?>"><?= $r['role']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-outline-light">Create</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Button trigger modal -->
                </div>

            </section>
            <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->