            <!-- Main content -->
            <section class="content">
                <?= form_error('role', '<div class="alert alert-danger col-lg-3" role="alert">', '</div>');  ?>

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
                    <div class="card-body col-lg-8">
                        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">Tambah Role Baru</a>

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
                                <?php foreach ($role as $r) : ?>
                                    <tr>
                                        <th scope="row"><?= $i;  ?></th>
                                        <td><?= $r['role']; ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="btn btn-warning"><span class="fa fa-sync"> Access</a>
                                            <a href="<?= base_url();  ?>admin/ubahrole/<?= $r['id']; ?>" class="btn btn-success"><span class="fa fa-edit"> Edit</a>
                                            <a href="<?= base_url(); ?>administrator/hapusRole/<?= $r['id']; ?>" class="btn btn-danger tombol-hapus"><span class="fa fa-trash"> Hapus</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a> puskesos</a>
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <!-- Modal -->
            <div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content bg-primary">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newRoleModalLabel">Tambah Role Baru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('admin/role'); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="role" name="role" placeholder="Nama role">
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