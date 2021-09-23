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
                        <div>
                            <!-- Begin Page Content -->
                            <div class="container-fluid">

                                <div class="row">
                                    <div class="col-lg-8">

                                        <?= form_open_multipart('user/edit'); ?>
                                        <div class="form-group row">
                                            <div for="email" class="col-sm-2 col-form-label">Email</div>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div for="name" class="col-sm-2 col-form-label">Nama Lengkap</div>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-2">Gambar</div>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <a href="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="venobox">
                                                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail"></a>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="image" name="image">
                                                            <label class="custom-file-label" for="image">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row justify-content-end">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Edit</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.container-fluid -->
                        </div>
                        <!-- End of Main Content -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">


            </section>
            <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->