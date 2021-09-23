    <div class="register-box">
        <div class="register-logo">
            <a href="../../index2.html"><b>Sistem Informasi Organisasi Kemahasiswaan</b></a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Buat Akun Baru</p>

                <form action="<?= base_url('auth/registration'); ?>" method="post">
                    <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama" value="<?= set_value('name'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="password1" name="password1" placeholder="Kata Sandi">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Ulangi Kata Sandi">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                </form>
                <br>
                <p class="text-center">
                    <a href="<?= base_url('auth'); ?>" class="text-center">Sudah Memiliki Akun</a>
                </p>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->