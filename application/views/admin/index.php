<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>
                        <?php echo $jmlproposal; ?>
                    </h3>

                    <p>Jumlah Pengajuan Proposal</p>
                </div>
                <!-- <div class="icon">
                    <i class="ion ion-document"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>1</h3>
                    <p> Jumlah Laporan </p>
                </div>
                <!-- <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>
                        <?php echo $jmluser; ?>
                    </h3>

                    <p>Jumlah User Pengguna</p>
                </div>
                <!-- <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?php echo $jmlpmks; ?></h3>

                    <p>Jumlah Hasil PMKS</p>
                </div>
                <!-- <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>

    </div>

    <!-- PIE CHART -->

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Data Hasil Penyandang Masalah Kesejahteraan Sosial</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
        </div>

        <div class="card-body">
            <div id="piechart" style="height: 500px;"></div>
        </div>
        <!-- /.card-body -->
    </div>
</section>

<!-- /.content -->
</div>
<!-- /.content-wrapper -->