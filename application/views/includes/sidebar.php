<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('Dashboard') ?>" class="brand-link">
        <img src="<?php echo base_url() ?>assets/dist/img/AdminLTELogoSidebar.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url() . $this->session->userdata('image'); ?>" class="img-circle elevation-2" alt="No Image found">
            </div>
            <div class="info">
                <a href="<?php echo base_url('Dashboard') ?>" class="d-block"><?php echo $this->session->userdata('fullname'); ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" id="sidebarnav">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <?php //if(in_array('dashboard', $this->session->userdata('modules') ) ){ ?>
                <li class="nav-item" id="dashboard">
                    <a href="<?php echo base_url('Dashboard') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <?php //} ?>


                <li class="nav-item" id="settings">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Pages
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Settings/about" class="nav-link" id="about">
                                <i class="far fa-circle nav-icon"></i>
                                <p>About</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Settings/product" class="nav-link" id="product">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Products</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Settings/teams" class="nav-link" id="teams">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Team Member</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Settings/contact" class="nav-link" id="contact">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contact us</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Settings/configuration" class="nav-link" id="configuration">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Configure Setup</p>
                            </a>
                        </li>



                    </ul>
                </li>



                <?php //if(in_array('settings', $this->session->userdata('modules') ) ){ ?>
                <li class="nav-item" id="users">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            User Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">


                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Users/" class="nav-link" id="users-manange">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users Management</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <?php //} ?>


                <li class="nav-item">
                    &nbsp;
                    &nbsp;
                </li>

                <li class="nav-item">
                    &nbsp;
                    &nbsp;
                </li>


            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
