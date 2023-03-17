<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url() ?>" class="brand-link">
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
                <a href="<?php echo base_url() ?>" class="d-block"><?php echo $this->session->userdata('fullname'); ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" id="sidebarnav">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <?php //if(in_array('dashboard', $this->session->userdata('modules') ) ){ ?>
                <li class="nav-item" id="dashboard">
                    <a href="<?php echo base_url('home') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <?php //} ?>

                <?php if(in_array('marketer', $this->session->userdata('modules') ) ){ ?>
                <li class="nav-item" id="marketer">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            Employee
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Marketer" class="nav-link" id="marketer_all">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Employee</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Marketer/balance_stats" class="nav-link" id="balance_stats">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Balance Stats</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Marketer/transaction" class="nav-link" id="marketer_trx">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Transactions</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php } ?>

                <?php if(in_array('salary', $this->session->userdata('modules') ) ){ ?>
                <li class="nav-item" id="salary">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-money-check-alt"></i>
                        <p>
                            Salary
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Salary/bonus" class="nav-link" id="bonus">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bouns</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Salary/incentive" class="nav-link" id="incentive">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Incentive</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Salary/advanced" class="nav-link" id="advanced">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Advanced</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Salary/attendance" class="nav-link" id="attendance">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Attendance</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Salary/leave" class="nav-link" id="leave">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Leave</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Salary/payment_generate" class="nav-link" id="payment_generate">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Payment Generate</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Salary/payment" class="nav-link" id="payment">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Give Payment</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Salary/paid" class="nav-link" id="paid">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Paid Records</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php } ?>

                <?php if(in_array('claim', $this->session->userdata('modules') ) ){ ?>
                <li class="nav-item" id="claim">

                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-donate"></i>
                        <p>
                            Claim
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>Claim/" class="nav-link" id="claim_all">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Claim</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php } ?>

                <?php if(in_array('chalan', $this->session->userdata('modules') ) ){ ?>
                <li class="nav-item" id="chalan">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>
                            Chalan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Chalan/market_all" class="nav-link" id="markets">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Markets</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Chalan" class="nav-link" id="chalan_new">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New Chalan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Chalan/all_chalan" class="nav-link" id="all_chalan">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Chalan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php } ?>

                <?php if(in_array('invoice', $this->session->userdata('modules') ) ){ ?>
                <li class="nav-item" id="invoice">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-invoice"></i>
                        <p>
                            Company Invoice
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Invoice/" class="nav-link" id="invoice_all">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Invoice</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php } ?>

                <?php if(in_array('bank', $this->session->userdata('modules') ) ){ ?>
                <li class="nav-item" id="bank">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-landmark"></i>
                        <p>
                            Banking
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Bank" class="nav-link" id="bank_all">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Accounts</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Bank/trx" class="nav-link" id="bank_trx">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Transactions</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <?php } ?>

                <?php if(in_array('cost', $this->session->userdata('modules') ) ){ ?>
                <li class="nav-item" id="cost">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-money-bill-wave"></i>
                        <p>
                            Cost
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Cost/fieldOfCost" class="nav-link" id="fieldofcost">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Field of Cost</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Cost" class="nav-link" id="all_cost">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Cost</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <?php } ?>

                <?php if(in_array('logs', $this->session->userdata('modules') ) ){ ?>
                <li class="nav-item" id="logs">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-car"></i>
                        <p>
                            Logbook
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Logbook" class="nav-link" id="logbook_vehicle">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Vehicle</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Logbook/logrecords" class="nav-link" id="logbook_record">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Records</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <?php } ?>

                <?php if(in_array('sale', $this->session->userdata('modules') ) ){ ?>
                <li class="nav-item" id="sale">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cart-arrow-down"></i>
                        <p>
                            Sale
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Sale/salesPerson" class="nav-link" id="spot_person">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sale's Representative</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Sale" class="nav-link" id="spot_sale">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Spot Sale</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Sale/payment" class="nav-link" id="sale_payment">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Payments</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Sale/gift" class="nav-link" id="gift">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gifts</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <?php } ?>

                <?php if(in_array('loan', $this->session->userdata('modules') ) ){ ?>
                <li class="nav-item" id="loan">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>
                            Loan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Loan" class="nav-link" id="loan_all">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Loans</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Loan/loan_trx" class="nav-link" id="loan_trx">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Transactions</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <?php } ?>

                <?php if(in_array('report', $this->session->userdata('modules') ) ){ ?>
                <li class="nav-item" id="report">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            Report
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Report/chalan_report" class="nav-link" id="chalan_report">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Chalan Report</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Report/cost_report" class="nav-link" id="cost_report">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cost Report</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Report/logbook_report" class="nav-link" id="logs_report">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Logbook Report</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Report/marketer_report" class="nav-link" id="markter_report">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Employee Report</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Report/profit_report" class="nav-link" id="profit_report">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profit Report</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Report/user_report" class="nav-link" id="user_report">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User Activity Report</p>
                            </a>
                        </li>

                        <!-- <li class="nav-item">
                            <a href="<?php echo base_url() ?>Report/daily_report" class="nav-link" id="daily_report">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daily Report</p>
                            </a>
                        </li> -->

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Report/balance_sheet_report" class="nav-link" id="balance_sheet_report">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Balance Sheet Report</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <?php } ?>


                <?php if(in_array('sms', $this->session->userdata('modules') ) ){ ?>
                <li class="nav-item" id="sms">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            SMS
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Sms/send_sms" class="nav-link" id="send_sms">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Send SMS</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <!-- <a href="<?php echo base_url() ?>Sms/sms_report" class="nav-link" id="sms_report"> -->
                            <a href="https://vas.banglalink.net/esmsstat/" target="_blank" class="nav-link" id="sms_report">
                                <i class="far fa-circle nav-icon"></i>
                                <p>SMS Report</p>
                            </a>
                        </li>

                        <!-- <li class="nav-item">
                            <a href="<?php echo base_url() ?>Sms/sms_stats" class="nav-link" id="sms_stats">
                                <i class="far fa-circle nav-icon"></i>
                                <p>SMS Stats</p>
                            </a>
                        </li> -->
                    </ul>
                </li>
                <?php } ?>

                <?php if(in_array('settings', $this->session->userdata('modules') ) ){ ?>
                <li class="nav-item" id="settings">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Settings/" class="nav-link" id="initial_balance">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Configure Setup</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Settings/salary_incentive" class="nav-link" id="salary_incentive">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Incentive & Salary</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Users/" class="nav-link" id="users">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users Management</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Users/permissions" class="nav-link" id="permissions">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User's permission</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <?php } ?>


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
