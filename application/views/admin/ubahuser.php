            <!-- Main content -->
            <section class="content">

                <?= form_error('name', '<div class="alert alert-danger col-lg-3" role="alert">', '</div>'); ?>
                <?= form_error('role_id', '<div class="alert alert-danger col-lg-3" role="alert">', '</div>'); ?>
                <?= form_error('is_active', '<div class="alert alert-danger col-lg-3" role="alert">', '</div>'); ?>

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
                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?= $user['id']; ?>">
                                <div class="form-group">
                                    <label for="role">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                                    <small class="form-text text-danger"><?= form_error('name'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="title">Email</label>
                                    <input type="text" class="form-control" readonly id="email" name="email" value="<?= $user['email']; ?>">
                                    <small class="form-text text-danger"><?= form_error('email'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="icon">Role</label>
                                    <input type="text" class="form-control" id="role_id" name="role_id" value="<?= $user['role_id']; ?>">
                                    <small class="form-text text-danger"><?= form_error('role_id'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="icon">Active</label>
                                    <input type="int" class="form-control" id="is_active" name="is_active" value="<?= $user['is_active']; ?>">
                                    <small class="form-text text-danger"><?= form_error('is_active'); ?></small>
                                </div>
                                <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                            </form>

                        </div>
                        <!-- /.container-fluid -->

                    </div>
                    <!-- End of Main Content -->
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