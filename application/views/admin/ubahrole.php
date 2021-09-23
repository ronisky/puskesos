            <!-- Main content -->
            <section class="content">

                <?= form_error('role', '<div class="alert alert-danger col-lg-3" role="alert">', '</div>'); ?>

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
                                <input type="hidden" name="id" value="<?= $user_role['id']; ?>">
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <input type="text" class="form-control" id="role" name="role" value="<?= $user_role['role']; ?>">
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