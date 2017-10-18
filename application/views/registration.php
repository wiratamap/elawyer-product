
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">My<b>Lawyer</b></a>
            <small>Your digital lawyer solutions</small>
        </div>
        <div class="row clearfix">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    <div class="msg">Register a new membership</div>
                    <div>
                      <?php echo $this->session->flashdata('msg'); ?>
                    </div>
                    <?php echo form_open('auth/registration'); ?>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" value="<?php echo set_value('full_name')?>" name="full_name" placeholder="Full Name" maxlength="25" required autofocus>
                        </div>
                    </div>
                    <span class="text-danger"><?php echo form_error('full_name'); ?></span>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" value="<?php echo set_value('username')?>" name="username" placeholder="Username" maxlength="15" required autofocus>
                        </div>
                    </div>
                    <span class="text-danger"><?php echo form_error('username'); ?></span>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" value="<?php echo set_value('email')?>" name="email" placeholder="Email Address" required>
                        </div>
                    </div>
                    <span class="text-danger"><?php echo form_error('email'); ?></span>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" value="<?php echo set_value('password')?>" name="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>
                    <span class="text-danger"><?php echo form_error('password'); ?></span>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" value="<?php echo set_value('passconf')?>" name="passconf" minlength="6" placeholder="Confirm Password" required>
                        </div>
                    </div>
                    <span class="text-danger"><?php echo form_error('passconf'); ?></span>
                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink" required>
                        <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                    </div>

                    <button class="btn btn-block btn-lg bg-indigo waves-effect" type="submit">SIGN UP</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="<?php echo base_url(''); ?>">You already have a membership?</a>
                    </div>
                    <?php echo form_close(); ?>

                </div>
            </div>
          </div>
        </div>

    </div>
    <div class="logo">
        <h5 style="color:white;" align="center">
          <?php echo '&copy; '.copyright_year.' '.copyright_by.' '.'v '.app_version.' '; ?>
        </h5>
    </div>
