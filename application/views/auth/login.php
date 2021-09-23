    <div class="login-box">
        <div class="login-logo">
            <a><b>Sistem Penyandang Masalah Kesejahteraan Sosial (PMKS) Puskesos Ass-Salam</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Halaman Login</p>

                <?= $this->session->flashdata('message'); ?>

                <form action="<?= base_url('auth'); ?>" method="post">
                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    <div class="input-group mb-3">
                        <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    <div class="input-group mb-3">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block center-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <br>
                <p class="mb-1 text-center">
                    <a href="<?= base_url('auth/forgotpassword'); ?>">Lupa Kata Sandi</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->