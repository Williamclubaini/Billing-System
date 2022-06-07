<!--//app-header-inner-->
<?php sleep(3);?>
<div id="app-sidepanel" class="app-sidepanel">
    <div id="sidepanel-drop" class="sidepanel-drop"></div>
    <div class="sidepanel-inner d-flex flex-column">
        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
        <div class="app-branding">
            <a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/app-logo.jpg"
                    alt="logo"><span class="logo-text">AGRO-DEALERS</span></a>

        </div>
        <!--//app-branding-->

        <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
            <ul class="app-menu list-unstyled accordion" id="menu-accordion">

                <!--//nav-item-->
                <?php 
                      if (isset($_SESSION['user'])) {?>
                <li class="nav-item">

                    <a class="nav-link active" href="<?php echo URL;?>home">
                        <span class="nav-icon">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" />
                                <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                    <!--//nav-link-->
                </li>
                <li class="nav-item">

                    <a class="nav-link" href="<?php echo URL;?>invoice">
                        <span class="nav-icon">
                            <i class="text-success bi bi-file-earmark-text-fill fs-5"></i>
                        </span>
                        <span class="nav-link-text">Invoices</span>
                    </a>
                    <!--//nav-link-->
                </li>
                <!--//nav-item-->
                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link" href="<?php echo URL;?>products">
                        <span class="nav-icon">
                            <i class="text-success bi bi-cart3 fs-5"></i>
                        </span>
                        <span class="nav-link-text">Products</span>
                    </a>
                    <!--//nav-link-->
                </li>
                <!--//nav-item-->

                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link" href="<?php echo URL;?>orders">
                        <span class="nav-icon">
                            <i class="text-success bi bi-file-earmark-text-fill fs-5"></i>
                        </span>
                        <span class="nav-link-text">Orders</span>
                    </a>
                    <!--//nav-link-->
                </li>
                <!--//nav-item-->

                <li class="nav-item">

                    <a class="nav-link" href="<?php echo URL;?>payments">
                        <span class="nav-icon">
                            <i class="text-success bi bi-cash fs-5"></i>
                        </span>
                        <span class="nav-link-text">Pay invoices</span>
                    </a>
                    <!--//nav-link-->
                </li>
                <?php } elseif(isset($_SESSION['admin'])) {?>
                <li class="nav-item">

                    <a class="nav-link active" href="<?php echo URL;?>adminPanel">
                        <span class="nav-icon">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" />
                                <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                    <!--//nav-link-->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL;?>invoiceList">
                        <span class="nav-icon">
                            <i class="text-success bi bi-file-earmark-text-fill fs-5"></i>
                        </span>
                        <span class="nav-link-text">Invoices</span>
                    </a>
                </li>
                <!--//nav-item-->

                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link" href="<?php echo URL;?>ordersList">
                        <span class="nav-icon">
                            <i class="text-success bi bi-file-earmark-richtext fs-5"></i>
                        </span>
                        <span class="nav-link-text">Orders</span>
                    </a>
                    <!--//nav-link-->
                </li>
                <!--//nav-item-->
                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link" href="<?php echo URL;?>latePayments">
                        <span class="nav-icon">
                            <i class="text-success bi bi-bell fs-5"></i>
                        </span>
                        <span class="nav-link-text">Late Payments</span>
                    </a>
                    <!--//nav-link-->
                </li>

                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link" href="<?php echo URL;?>request">
                        <span class="nav-icon">
                            <i class="text-success bi bi-box-arrow-in-right fs-5"></i>
                        </span>
                        <span class="nav-link-text">Invoice Request</span>
                    </a>
                    <!--//nav-link-->
                </li>

                <li class="nav-item">

                    <a class="nav-link" href="<?php echo URL;?>report">
                        <span class="nav-icon">
                            <i class="text-success bi bi-file-earmark-text-fill fs-5"></i>
                        </span>
                        <span class="nav-link-text">Financial Report</span>
                    </a>
                    <!--//nav-link-->
                </li>
                <?php } ?>
                <!--//nav-item-->
            </ul>
            <!--//app-menu-->
        </nav>
        <!--//app-nav-->
        <div class="app-sidepanel-footer">
            <nav class="app-nav app-nav-footer">
                <ul class="app-menu footer-menu list-unstyled">
                    <li class="nav-item bg-danger">
                        <a class="nav-link" href="<?php echo $_SERVER['REQUEST_URI'].'&logout';?>">
                            <span class="nav-icon">
                                <i class="bi bi-box-arrow-left text-white fs-5"></i>
                            </span>
                            <span class="nav-link-text text-white">Log Out</span>
                        </a>

                    </li>

                </ul>
                <!--//footer-menu-->
            </nav>
        </div>
        <!--//app-sidepanel-footer-->

    </div>
    <!--//sidepanel-inner-->
</div>
<!--//app-sidepanel-->
</header>
<!--//app-header-->