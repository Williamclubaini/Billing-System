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
                        <h5 class="">Late Payments</h5>
                    </div>
                    <!--//col-->
                    <div class="col-auto">
                        <div class="card-header-action">
                            <button id="send" class="btn app-btn-primary"><i class="bi bi-envelope"></i>
                                Send Emails</button>
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
                                            <th class="cell">Cust. ID</th>
                                            <?php if (isset($_SESSION['admin'])) :?>
                                            <th class="cell">Customer Name</th>
                                            <?php endif;?>
                                            <th class="cell">Total</th>
                                            <th class="cell">Status</th>
                                            <th class="cell">Invoice Created Date</th>
                                            <th class="cell">Number of Days</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        foreach ($data as $invoice):?>
                                        <tr>
                                            <td class="cell"><?php echo $invoice->customer_id;?></td>
                                            <?php if (isset($_SESSION['admin'])) :?>
                                            <td class="cell"><span
                                                    class="truncate"><?php echo ucwords($this->customer_name($invoice->customer_id)[0]->firstname.' '.$this->customer_name($invoice->customer_id)[0]->surname);?></span>
                                            </td>
                                            <?php endif;?>
                                            <td class="cell">MK<?php echo number_format($invoice->total_cost, 2);?></td>
                                            <?php 
                                            if($invoice->status === 'paid')
                                            {?>
                                            <td class="cell">
                                                <span
                                                    class="badge bg-success"><?php echo ucfirst($invoice->status);?></span>
                                            </td>
                                            <?php } elseif ($invoice->status === 'unpaid') {?>
                                            <td class="cell">
                                                <span
                                                    class="badge bg-danger"><?php echo ucfirst($invoice->status);?></span>
                                            </td>
                                            <?php } else {?>
                                            <td class="cell">
                                                <span
                                                    class="badge bg-warning"><?php echo ucfirst($invoice->status);?></span>
                                            </td>
                                            <?php }
                                            ?>
                                            <td class="cell">
                                                <?php echo date('l, F d, Y', $invoice->created_date);?></td>
                                            <td class="cell">
                                                <?php echo date('t', $invoice->created_date);?></td>
                                        </tr>
                                        <?php endforeach;?>

                                    </tbody>
                                </table>
                            </div>
                            <?php } else {?>
                            <div class="text-success fw-bold text-center p-5">
                                No Invoices Found.
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