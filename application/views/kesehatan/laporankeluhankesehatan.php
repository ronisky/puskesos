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
                    <div class="card-body">
                        <a class="btn btn-success mb-3" href="<?php echo base_url("kesehatan/export"); ?>">Export ke Excel</a>
                        <table id="example1" class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">Judul Proposal</th>
                                    <th scope="col">No Induk Kependudukan</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Konfirmasi</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kesehatan as $pd) :
                                    if ($pd['konfirmasi'] == 1) {
                                        $pdv = '<span class="badge badge-success">Disetujui</span>';
                                    } elseif ($pd['konfirmasi'] == 2) {
                                        $pdv = '<span class="badge badge-danger">Ditolak</span>';
                                    } else {
                                        $pdv = '<span class="badge badge-warning">Proses</span>';
                                    }
                                ?>

                                    <tr>
                                        <th scope="row"><?= $i;  ?></th>
                                        <td><?= $pd['nama']; ?></td>
                                        <td><?= $pd['nama_proposal']; ?></td>
                                        <td><?= $pd['nis']; ?></td>
                                        <td><?= $pd['alamat']; ?></td>
                                        <td><?= $pdv ?></td>
                                        <td>
                                            <a href="<?= base_url();  ?>kesehatan/detailkesehatan/<?= $pd['id_proposal']; ?>" class="btn btn-success"><span class="fa fa-eye"> Detail</a>

                                            <a class="btn btn-warning" href="<?php echo base_url("kesehatan/cetak/"); ?><?= $pd['id_proposal']; ?>">Cetak PDF</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-center">
                        <a class="">PUSKESOS As-Salaam</a>
                    </div>
                </div>

            </section>
            <!-- /.content -->
            </div>

            <!-- /.content-wrapper -->