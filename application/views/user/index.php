<section class="content">

    <div class="col-lg-3">
        <?= $this->session->flashdata('message'); ?>
    </div>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <!-- Defuslt box -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <?php
                if ($user['is_active'] == 1) {
                    $active = '<a class="button badge badge-success">User Aktif</a>';
                } else {
                    $active = '<a class="badge badge-danger">Tidak Aktif</a>';
                }
                ?>
                <?php ?>

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <a href="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="venobox">
                                <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="User profile picture"></a>
                        </div>

                        <h3 class="profile-username text-center"><?= $user['name']; ?></h3>

                        <p class="text-muted text-center"><?= $user['nama_organisasi']; ?></p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <p class="text-center"><?= $user['email']; ?></p>
                            </li>
                            <li class="list-group-item">
                                <p class="text-center"><span class="text-muted">Member sejak <?= date('d F Y', $user['date_created']);  ?></span></p>
                            </li>
                            <li class="list-group-item">
                                <p class="text-center"><?= $active; ?></p>
                            </li>
                        </ul>
                        <a href="#" class="btn btn-primary btn-block"><b>Wellcome</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

            <!-- Default box -->
            <div class="card col-md-9">
                <div class="card-header">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">

                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>