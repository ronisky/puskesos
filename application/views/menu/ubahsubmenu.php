            <!-- Main content -->
            <section class="content">

                <?= form_error('menu_id', '<div class="alert alert-danger col-lg-3" role="alert">', '</div>'); ?>
                <?= form_error('title', '<div class="alert alert-danger col-lg-3" role="alert">', '</div>'); ?>
                <?= form_error('url', '<div class="alert alert-danger col-lg-3" role="alert">', '</div>'); ?>
                <?= form_error('icon', '<div class="alert alert-danger col-lg-3" role="alert">', '</div>'); ?>

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

                            <form action="" method="post" class="col-md-6">
                                <input type="hidden" name="id" value="<?= $user_sub_menu['id']; ?>">
                                <div class="form-group">
                                    <label for="menu_id">Menu</label>
                                    <input type="text" class="form-control" id="menu_id" name="menu_id" value="<?= $user_sub_menu['menu_id']; ?>">
                                    <small class="form-text text-danger"><?= form_error('menu_id'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="<?= $user_sub_menu['title']; ?>">
                                    <small class="form-text text-danger"><?= form_error('title'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="url">URL</label>
                                    <input type="text" class="form-control" id="url" name="url" value="<?= $user_sub_menu['url']; ?>">
                                    <small class="form-text text-danger"><?= form_error('url'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="icon">Icon</label>
                                    <input type="text" class="form-control" id="icon" name="icon" value="<?= $user_sub_menu['icon']; ?>">
                                    <small class="form-text text-danger"><?= form_error('icon'); ?></small>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked value="<?= $user_sub_menu['is_active']; ?>">
                                        <label class="form-check-label" for="is_active">
                                            Active?
                                        </label>
                                    </div>
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