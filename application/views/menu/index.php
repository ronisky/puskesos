            <!-- Main content -->
            <section class="content">
                <?= form_error('menu', '<div class="alert alert-danger col-lg-3" role="alert">', '</div>');  ?>

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
                    <div class="card-body col-lg-6">
                        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Tambah Menu Baru</a>

                        <table id="example1" class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($menu as $m) : ?>
                                    <tr>
                                        <th scope="row"><?= $i;  ?></th>
                                        <td><?= $m['menu']; ?></td>
                                        <td>
                                            <a href="<?= base_url();  ?>menu/ubahmenu/<?= $m['id']; ?>" class="btn btn-success"><span class="fa fa-edit"> Edit</a>
                                            <a href="<?= base_url(); ?>administrator/hapusMenu/<?= $m['id']; ?>" class="btn btn-danger tombol-hapus"><span class="fa fa-trash"> Delete</a>
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
            <div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content bg-primary">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newMenuModalLabel">Tambah Menu Baru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('menu'); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="menu" name="menu" placeholder="Nama menu">
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