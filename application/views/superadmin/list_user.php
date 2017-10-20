<section class="content">
    <div class="container-fluid">
        <div class="block-header">
          <ol class="breadcrumb breadcrumb-bg-red">
            <li class="active"><i class="material-icons">home</i> Home</li>
            <!-- <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Library</a></li> -->
            <!-- <li><a href="javascript:void(0);"><i class="material-icons">archive</i> Data</a></li> -->
            <!-- <li class="active"><i class="material-icons">attachment</i> File</li> -->
          </ol>
        </div>

        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            BASIC EXAMPLE
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Account Status</th>
                                        <th>Login Status</th>
                                        <th>Created Date</th>
                                        <th>User Roles</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Username</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Account Status</th>
                                        <th>Login Status</th>
                                        <th>Created Date</th>
                                        <th>User Roles</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                  <?php
                                    foreach($data_user as $row)
                                    {
                                      echo '<tr>';
                                      echo '<td>'.$row->USERNAME.'</td>';
                                      echo '<td>'.$row->FULLNAME.'</td>';
                                      echo '<td>'.$row->EMAIL.'</td>';

                                      if($row->ISDELETED == "0") {
                                        echo '<td align="center"><span class="badge circle bg-green">Active</span></td>';
                                      } else {
                                        echo '<td align="center"><span class="badge circle bg-red">Suspended</span></td>';
                                      }
                                      if($row->ISLOGGEDIN == "1") {
                                        echo '<td align="center"><i class="material-icons col-green">check_circle</i></td>';
                                      } else {
                                        echo '<td align="center"><i class="material-icons col-red">not_interested</i></td>';
                                      }
                                      echo '<td>'.$row->CREATEDDATE.'</td>';
                                      echo '<td>'.$row->NAME.'</td>';

                                      echo '<td>
                                        <a href="edit-user/'.$row->UUIDMSUSER.'" role="button" class="btn btn-circle waves-circle bg-primary waves-effect"><i class="material-icons">border_color</i></a>';
                                      if($row->USERNAME != $this->session->userdata('USERNAME')) {
                                        echo '<a href="delete-user/'.$row->UUIDMSUSER.'" role="button" class="btn btn-circle waves-circle bg-red waves-effect"><i class="material-icons">delete</i></a>';
                                      } else {
                                        echo '<button type="button" class="btn btn-circle waves-circle bg-red waves-effect" disabled><i class="material-icons">delete</i></button>';
                                      }

                                      echo '</div>';
                                      echo '</tr>';
                                    }
                                  ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->

    </div>
</section>
