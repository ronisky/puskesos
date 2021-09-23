            <!-- Main content -->
            <section class="content">

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

                            <div class="row">
                                <div class="col-lg-6">

                                    <form action="<?= base_url('user/changepassword'); ?>" method="post">
                                        <div class="form-group">
                                            <label for="current_password">Kata Sandi Saat Ini</label>
                                            <input type="password" class="form-control" id="current_password" name="current_password">
                                            <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="new_password1">Kata Sandi Baru</label>
                                            <input type="password" class="form-control" id="new_password1" name="new_password1">
                                            <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="new_password2">Konfirmasi Kata Sandi </label>
                                            <input type="password" class="form-control" id="new_password2" name="new_password2">
                                            <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Ubah Kata Sandi</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
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