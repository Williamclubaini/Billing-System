<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 app-nav-tabs shadow-sm p-2 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0"><i class="bi bi-file-text-fill"></i> Invoices</h1>
                    <hr class="bg-success">
                    <?php 
                        if (!empty($data)) {?>
                    <?php  
                              if (isset($_SESSION['admin'])) {?>
                    <small>List of all invoice's and number of days not paid.</small>
                    <?php } elseif(isset($_SESSION['user'])) {?>
                    <small class="mb-1">Customer: <?php echo USERNAME.' '.SURNAME;?></small>
                    <ul class="notification-meta list-inline mb-0">
                        <small
                            class="list-inline-item">Contact:<?php echo str_replace('0', '+265', PHONE);?></small><br>
                        <small class="list-inline-item">Email: <?php echo EMAIL;?></small><br>
                        <small class="list-inline-item">Location: <?php echo LOCATION;?></small>
                    </ul>
                    <?php }
                        ?>
                    <?php }
                    ?>
                </div>
                <!--//col-auto-->
            </div>
            <!--//row-->

            <div class="app-card-header bg-body shadow-lg border-bottom border-success mb-3 p-3">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto">
                        <h5 class="">Invoice Request</h5>
                    </div>
                    <!--//col-->
                    <div class="col-auto">
                        <div class="card-header-action">
                            <!-- <button id="send" class="btn app-btn-primary"><i class="bi bi-envelope"></i>
                                Send Emails</button> -->
                        </div>
                        <!--//card-header-actions-->
                    </div>
                    <!--//col-->
                </div>
                <!--//row-->
            </div>

            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <?php 
                                if (!empty($data)) {?>
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">Customer Name</th>
                                            <th class="cell">Product</th>
                                            <th class="cell">Quantity</th>
                                            <th class="cell">Price</th>
                                            <th class="cell">Total</th>
                                            <th class="cell">Status</th>
                                            <th class="cell">Order Date</th>
                                            <th class="cell">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        foreach ($data as $invoice):?>
                                        <tr>
                                            <td class="cell"><?php echo $invoice->firstname.' '.$invoice->surname;?>
                                            </td>
                                            <td class="cell"><?php echo $invoice->product;?>
                                            </td>
                                            <td class="cell"><?php echo $invoice->quantity;?>
                                            </td>
                                            <td class="cell">MK<?php echo number_format($invoice->price, 2);?></td>
                                            <td class="cell">MK<?php echo number_format($invoice->total_cost, 2);?></td>
                                            <td class="cell">
                                                <span
                                                    class="badge bg-danger"><?php echo ucfirst($invoice->status);?></span>
                                            </td>
                                            <td class="cell">
                                                <?php echo $invoice->order_date;?></td>
                                            <td class="cell"><a class="btn-sm app-btn-secondary"
                                                    href="<?php echo URL;?>createInvoice&id=<?php echo $invoice->customer_id;?>&orderId=<?php echo $invoice->id;?>">Confirm</a>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>

                                    </tbody>
                                </table>
                            </div>
                            <?php } else {?>
                            <div class="text-success fw-bold text-center p-5">
                                No Request Found.
                            </div>
                            <?php }
                           ?>
                        </div>
                        <!--//app-card-body-->
                    </div>
                    <!--//app-card-->
                    <?php 
                          if (!empty($data)) :?>
                    <nav class="app-pagination">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                    <!--//app-pagination-->
                    <?php endif; ?>

                </div>
                <!--//tab-pane-->

            </div>
            <!--//tab-content-->



        </div>
        <!--//container-fluid-->
    </div>
    <!--//app-content-->



</div>
<!--//app-wrapper-->
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/popper.min.js" type="text/javascript"></script>
<script src="assets/js/sweetalert.min.js" type="text/javascript"></script>

<script>
$(document).on("click", "#send", function(e) {
    swal({
            title: "Are you sure?",
            text: "To send emails to all of your customers on the list!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Emails successfully sent!", {
                    icon: "success",
                });
            } else {
                swal("Emails not sent!", {
                    icon: "warning",
                });
            }
        });
});
</script>