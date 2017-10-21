<section class="content">
    <div class="container-fluid">
        <div class="block-header">
          <ol class="breadcrumb breadcrumb-bg-red">
            <li><a href=<?php echo base_url('superadmin/home'); ?>><i class="material-icons">home</i> Home</a></li>
            <li><a href=<?php echo base_url('superadmin/list-user'); ?>><i class="material-icons">people</i> List User</a></li>
            <li class="active"><i class="material-icons">mode_edit</i> Edit User</a></li>
            <!-- <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Library</a></li> -->
            <!-- <li><a href="javascript:void(0);"><i class="material-icons">archive</i> Data</a></li> -->
            <!-- <li class="active"><i class="material-icons">attachment</i> File</li> -->
          </ol>
        </div>

        <!-- Basic Validation -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>UPDATE USER</h2>
                        <div>
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>
                    </div>
                    <div class="body">
                        <?php echo form_open('superadmin/update-user/'.$user->UUIDMSUSER); ?>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" value="<?php echo $user->USERNAME ?>" name="username" required>
                                    <label class="form-label">Username</label>
                                </div>
                            </div>
                            <span class="text-danger"><?php echo form_error('USERNAME'); ?></span>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" value="<?php echo $user->FULLNAME ?>" name="fullname" required>
                                    <label class="form-label">Full Name</label>
                                </div>
                            </div>
                            <span class="text-danger"><?php echo form_error('FULLNAME'); ?></span>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="email" class="form-control" value="<?php echo $user->EMAIL ?>" name="email" required>
                                    <label class="form-label">Email</label>
                                </div>
                            </div>
                            <span class="text-danger"><?php echo form_error('EMAIL'); ?></span>
                            <div class="form-group">
                              <select class="form-control show-tick" data-live-search="true">
                                  <option value="">-- User Roles --</option>
                                  <?php
                                    foreach ($userroles as $row) {
                                      if($row->VALUE == $user->ROLESVALUE) {
                                        echo '<option value="'.$row->VALUE.'" selected>'.$row->VALUE.' ( '.$row->NAME.' )</option>';
                                      } else {
                                        echo '<option value="'.$row->VALUE.'">'.$row->VALUE.' ( '.$row->NAME.' )</option>';
                                      }
                                    }
                                  ?>
                              </select>
                            </div>
                            <span class="text-danger"><?php echo form_error('ISDELETED'); ?></span>
                            <div class="form-group">
                                <?php
                                  if($user->ISDELETED == "0") {
                                    echo '<input type="checkbox" id="checkbox" name="isdeleted" value="1" checked>';
                                  } else {
                                    echo '<input type="checkbox" id="checkbox" name="isdeleted" value="0">';
                                  }
                                ?>
                                <label for="checkbox">Is Active</label>
                            </div>
                            <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Validation -->
</section>
