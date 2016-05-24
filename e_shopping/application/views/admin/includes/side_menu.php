<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?php echo site_url('admin_control/index')?>" class="site_title"><i class="fa fa-paw"></i> <span>Admin panel</span></a>
                    </div>
                    <div class="clearfix"></div>
                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="<?php echo base_url('assets/images/1.png')?>" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?php echo $this->session->userdata('first_name') ?></h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->
                    <br />
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a href="<?php echo site_url("admin_home") ?>"><i class="fa fa-home"> </i> Home </a></li>
                                <li><a href="<?php echo site_url("categories") ?>"><i class="fa fa-list"> </i> Category</a></li>
                                <li><a href="<?php echo site_url("products") ?>"><i class="fa fa-shopping-basket"> </i> Products </a></li>
                                <li><a href="<?php echo site_url("orders") ?>"><i class="fa fa-shopping-cart"> </i> Orders </a></li>
                                <li><a href="<?php echo site_url("users") ?>"><i class="fa fa-users"> </i> Users </a></li>
                                <li><a href="<?php echo site_url("change_password") ?>"><i class="fa fa-key"> </i> Change password </a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer">
                        <a href="<?php echo site_url('user_control/logout')?>" data-toggle="tooltip" data-placement="top" title="Logout" style="width:100%;" >
                            <span class="glyphicon glyphicon-off" aria-hidden="true">Logout</span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>
            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="<?php echo base_url('assets/images/1.png')?>" alt=""><?php echo $this->session->userdata('first_name') ?>
                                <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="<?php echo site_url('user_control/logout')?>" class="btn"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->
        </div>
    