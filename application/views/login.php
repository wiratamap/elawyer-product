    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">My<b>Lawyer</b></a>
            <small>Your digital lawyer solutions</small>
        </div>
        <div class="card">
            <div class="body">
                <div>
                    <?php echo $this->session->flashdata('msg'); ?>
                </div>
                <?php echo validation_errors(); ?>
                <?php echo form_open('auth/authentication'); ?>
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button class="btn btn-block bg-indigo waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-12 align-center">
                            <a href="<?php echo ('auth/registration'); ?>">Don't have an account? Register Now!</a>
                        </div>
                        <!-- <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div> -->
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
        <div class="logo">
            <h5 style="color:white;" align="center">
              <?php echo '&copy;'.copyright_year.' '.copyright_by.' '.'v '.app_version.' '; ?>
            </h5>
        </div>
    </div>
