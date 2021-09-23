            <!-- Main content -->
            <section class="content">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger col-lg-3" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>

                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
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
                        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Tambah Submenu Baru</a>

                        <table id="example1" class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Url</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Active</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($subMenu as $sm) : ?>
                                    <tr>
                                        <th scope="row"><?= $i;  ?></th>
                                        <td><?= $sm['title']; ?></td>
                                        <td><?= $sm['menu']; ?></td>
                                        <td><?= $sm['url']; ?></td>
                                        <td><?= $sm['icon']; ?></td>
                                        <td><?= $sm['is_active']; ?></td>
                                        <td>
                                            <a href="<?= base_url();  ?>menu/ubahsubmenu/<?= $sm['id']; ?>" class="btn btn-success"><span class="fa fa-edit"> Edit</a>
                                            <a href="<?= base_url(); ?>administrator/hapusSubMenu/<?= $sm['id']; ?>" class="btn btn-danger tombol-hapus"><span class="fa fa-trash"> Delete</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a>Organisasi Kemahasiswaan</a>
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <!-- Modal -->
            <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content bg-primary">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Sub Menu Baru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('menu/submenu'); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
                                </div>
                                <div class="form-group">
                                    <select name="menu_id" id="menu_id" class="form-control">
                                        <option value="">Select Menu</option>
                                        <?php foreach ($menu as $m) : ?>
                                            <option value="<?= $m['id'] ?>"><?= $m['menu']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                        <label class="form-check-label" for="is_active">
                                            Active ?
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-outline-light">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>