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
                    <small>List of all detailed invoice's available in the system.</small>
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

            <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                <a class="flex-sm-fill text-sm-start nav-link active" id="orders-all-tab" data-bs-toggle="tab"
                    href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Invoice List</a>

            </nav>

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
                                            <th class="cell">ID</th>
                                            <?php if (isset($_SESSION['admin'])) :?>
                                            <th class="cell">Customer Name</th>
                                            <?php endif;?>
                                            <th class="cell">Product</th>
                                            <th class="cell">Quantity</th>
                                            <th class="cell">Price</th>
                                            <th class="cell">Total</th>
                                            <th class="cell">Status</th>
                                            <th class="cell">Invoice Created Date</th>
                                            <th class="cell">Invoice Paid Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        foreach ($data as $invoice):?>
                                        <tr>
                                            <td class="cell"><?php echo '#INVC - '.$invoice->id;?></td>
                                            <?php if (isset($_SESSION['admin'])) :?>
                                            <td class="cell"><span
                                                    class="truncate"><?php echo ucwords($this->customer_name($invoice->customer_id)[0]->firstname.' '.$this->customer_name($invoice->customer_id)[0]->surname);?></span>
                                            </td>
                                            <?php endif;?>
                                            <td class="cell"><span
                                                    class="truncate"><?php echo ucwords($invoice->product);?></span>
                                            </td>
                                            <td class="cell"><?php echo $invoice->quantity;?></td>
                                            <td class="cell"><?php echo number_format($invoice->price, 2);?></span></td>
                                            <td class="cell"><?php echo number_format($invoice->total_cost, 2);?></td>
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
                                                <?php echo $invoice->paid_date;?></td>
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