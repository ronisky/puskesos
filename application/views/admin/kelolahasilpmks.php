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
                    <div class="card-body col-lg-12">
                        <table id="example1" class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Responden</th>
                                    <th scope="col">Tempat Tanggal Lahir</th>
                                    <th scope="col">Usia</th>
                                    <th scope="col">No Telepon</th>
                                    <th scope="col">Konfirmasi</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($klasifikasi as $kf) :
                                    if ($kf['konfirmasi_pmks'] == 1) {
                                        $kfv = '<span class="badge badge-success">Disetujui</span>';
                                    } elseif ($kf['konfirmasi_pmks'] == 2) {
                                        $kfv = '<span class="badge badge-danger">Ditolak</span>';
                                    } else {
                                        $kfv = '<span class="badge badge-warning">Proses</span>';
                                    }
                                ?>

                                    <tr>
                                        <th scope="row"><?= $i;  ?></th>
                                        <td><?= $kf['nama_responden']; ?></td>
                                        <td><?= $kf['tempat_tanggallahir']; ?></td>
                                        <td><?= $kf['usia']; ?></td>
                                        <td><?= $kf['no_telepon']; ?></td>
                                        <td><?= $kfv ?></td>
                                        <td>
                                            <a href="" class="btn btn-warning" data-toggle="modal" data-target="#updateStatusPmksModal" id="updateStatusPmks" data-id="<?= $kf['id_pengenalan']; ?>"><span class="fa fa-sync"> Update</a>

                                            <a href="<?= base_url();  ?>admin/detailPmks/<?= $kf['id_pengenalan']; ?>" class="btn btn-success"><span class="fa fa-eye"> Detail</a>

                                            <a href="<?= base_url(); ?>administrator/hapusHasilPmks/<?= $kf['id_pengenalan']; ?>" class="btn btn-danger tombol-hapus"><span class="fa fa-trash"> Hapus</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                        <a class="">PUSKESOS As-Salaam</a>
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Modal -->
            <div class="modal fade" id="updateStatusPmksModal" tabindex="-1" role="dialog" aria-labelledby="updateStatusModalPmksLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg-6" role="document">
                    <div class="modal-content bg-warning">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateStatusModalPmksLabel">Konfirmasi PMKS</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('admin/updatePmks'); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="hidden" name="id_pengenalan" id="id_pengenalan" value="">
                                    <select class="form-control" id="konfirmasi_pmks" name="konfirmasi_pmks">
                                        <option>Pilih</option>
                                        <option value="1">Setujui</option>
                                        <option value="2">Tolak</option>
                                    </select>
                                    <?= form_error('status', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-outline-light">Update Status</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>