<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a><b>Sistem Informasi Organisasi Kemahasiswaan</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Reset kata sandi?</p>

                <?= $this->session->flashdata('message'); ?>

                <?= $this->session->flashdata('message'); ?>

                <form method="post" action="<?= base_url('auth/changepassword');  ?>">
                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div class="input-group mb-3">
                        <input type="password" id="password1" name="password1" class="form-control" placeholder="Masukan kata sandi baru...">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div class="input-group mb-3">
                        <input type="password" id="password2" name="password2" class="form-control" placeholder="Ulangi kata sandi anda...">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Lupa Kata Sandi
                    </button>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->