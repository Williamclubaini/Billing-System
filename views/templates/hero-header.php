<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <h1 class="app-page-title">Automated Billing System For Aliko AGRO-DEALERS</h1>

            <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
                <div class="inner">
                 
                    <div class="app-card-body p-3 p-lg-4">
                        <h3 class="mb-3">Welcome, <?php echo USERNAME;?>!</h3>
                        <div class="row gx-5 gy-3">
                            <?php 
                            
                            if (isset($_SESSION['user'])) {?>
                            <div class="col-12 col-lg-9">
                                <div class="text-success">
                                    <?php 
                                    if ($data[0]->numberOfRecords > 0) {?>
                                    You have received <?php echo $data[0]->numberOfRecords;?>
                                    unpaid invoices. Please check your bills.
                                    <?php } else {?>
                                    You have no bills. Thank you for choosing us.
                                    <?php }
                                    ?>
                                </div>
                            </div>

                            <div class="col-12 col-lg-3">
                                <a class="btn app-btn-primary" href="<?php echo URL;?>invoice"><i
                                        class="bi bi-file-earmark-text-fill"></i>
                                    Invoices <span
                                        class="icon-badge">(<?php echo $data[0]->numberOfRecords;?>)</span></a>
                            </div>

                            

                            <?php } elseif (isset($_SESSION['admin'])) {?>
                                
                            <div class="col-12 col-lg-9">
                                <div class="text-success">
                                    Create an invoice.
                                </div>
                            </div>
                            
                            <div class="col-12 col-lg-3">
                                <a class="btn app-btn-primary" href="<?php echo URL;?>orderslist"><i
                                        class="bi bi-file-earmark-text-fill"></i>
                                    Create Invoice</a>
                            </div>
                           
                            <?php } ?>
                        </div>
                        <!--//row-->
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <!--//app-card-body-->

                </div>
                <!--//inner-->
            </div>
            <!--//app-card-->