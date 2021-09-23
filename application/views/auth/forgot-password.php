<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a><b>Sistem Penyandang Masalah Kesejahteraan Sosial (PMKS) Puskesos Ass-Salam</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Lupa kata sandi?</p>

                <?= $this->session->flashdata('message'); ?>

                <form action="<?= base_url('auth/forgotpassword'); ?>" method="post">
                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    <div class="input-group mb-3">
                        <input type="text" id="email" name="email" value="<?= set_value('email') ?>" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mt-3 mb-1 text-center">
                    <a href="<?= base_url('auth'); ?>">Login</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->