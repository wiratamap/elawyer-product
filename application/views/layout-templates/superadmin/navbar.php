<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <!-- <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a> -->
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">MyLawyer - Your Digital Lawyer Solutions</a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url('assets/images/user.png'); ?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('FULLNAME'); ?></div>
                    <div class="email"><?php echo $this->session->userdata('USERNAME'); ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="<?php echo base_url('auth/logout'); ?>"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li <?php if($this->uri->segment(2)=="home"){echo 'class="active"';}?>>
                        <a <?php if($this->uri->segment(2)=="home"){echo 'href="#"';} else {echo 'href="'.base_url('superadmin/home').'"'; }?> >
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li <?php if($this->uri->segment(2)!="home"){echo 'class="active"';}?> >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">people</i>
                            <span>User Management</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php if($this->uri->segment(2)!= ("home" || "create-user" || "list-user")){echo 'class="active"';}?> >
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">people</i>
                                    <span>Group Access Roles</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                          <i class="material-icons">group_add</i>
                                          <span>Create User Roles</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                          <i class="material-icons">view_list</i>
                                          <span>List User Roles</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li <?php if($this->uri->segment(2)!= ("home" || "create-user-roles" || "list-user-roles") ){echo 'class="active"';}?> >
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">person</i>
                                    <span>User</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                          <i class="material-icons">person_add</i>
                                          <span>Create User</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                          <i class="material-icons">view_list</i>
                                          <span>List User Roles</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    <?php echo '&copy;'.copyright_year.' '.copyright_by.' v '.app_version.' '; ?>
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>
