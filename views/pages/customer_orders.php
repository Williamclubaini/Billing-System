<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <div class="row g-3 mb-4 app-nav-tabs shadow-sm p-2 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0"><i class="bi bi-file-text-fill"></i> Orders</h1>
                    <hr>
                    <?php 
                        if (!empty($data)) {?>
                    <small class="mb-1">Customer: <?php echo USERNAME.' '.SURNAME;?></small>
                    <ul class="notification-meta list-inline mb-0">
                        <small
                            class="list-inline-item">Contact:<?php echo str_replace('0', '+265', PHONE);?></small><br>
                        <small class="list-inline-item">Email: <?php echo EMAIL;?></small><br>
                        <small class="list-inline-item">Location: <?php echo LOCATION;?></small>
                    </ul>

                    <?php }
                    ?>
                </div>
                <!--//col-auto-->
            </div>
            <!--//row-->



            <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                <a class="flex-sm-fill text-sm-start nav-link active" id="orders-all-tab" data-bs-toggle="tab"
                    href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Orders List</a>

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

                                            <!-- <th class="cell">Customer ID</th> -->

                                            <th class="cell">Product</th>
                                            <th class="cell">Quantity</th>
                                            <th class="cell">Price</th>
                                            <th class="cell">Total</th>
                                            <th class="cell">Status</th>
                                            <th class="cell">0rder Date</th>
                                            <th class="cell">Approved Date</th>
                                            <th class="cell">Request Invoice</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        foreach ($data as $order):?>
                                        <tr>
                                            <td class="cell">#<?php echo $order->id;?></td>
                                            <!-- <td class="cell"><span
                                                    class="truncate"><?php echo $order->customer_id;?></span>
                                            </td> -->
                                            <td class="cell"><span
                                                    class="truncate"><?php echo ucwords($order->product);?></span>
                                            </td>
                                            <td class="cell"><?php echo $order->quantity;?></td>
                                            <td class="cell"><?php echo 'MK'.number_format($order->price,2);?></span>
                                            </td>
                                            <td class="cell"><?php echo 'MK'.number_format($order->total_cost, 2);?>
                                            </td>
                                            <?php 
                                            if($order->status === 'approved')
                                            {?>
                                            <td class="cell">
                                                <span
                                                    class="badge bg-success"><?php echo ucfirst($order->status);?></span>
                                            </td>
                                            <?php } elseif ($order->status === 'pending') {?>
                                            <td class="cell">
                                                <span
                                                    class="badge bg-danger"><?php echo ucfirst($order->status);?></span>
                                            </td>
                                            <?php } else {?>
                                            <td class="cell">
                                                <span
                                                    class="badge bg-warning"><?php echo ucfirst($order->status);?></span>
                                            </td>
                                            <?php }
                                            ?>
                                            <td class="cell">
                                                <?php echo date('l, F d, Y', strtotime($order->order_date));?></td>
                                            <td class="cell">
                                                <?php echo $order->ac_date;?></td>
                                            <?php 
                                                  if ($order->status === 'pending') {?>
                                            <td class="cell"><a class="btn-sm app-btn-secondary"
                                                    href="<?php echo URL;?>orders&orderId=<?php echo $order->id;?>">Request</a>
                                            </td>
                                            <?php } else {?>
                                            <td class="cell"> No Action
                                            </td>
                                            <?php }
                                            ?>
                                        </tr>
                                        <?php endforeach;?>

                                    </tbody>
                                </table>
                            </div>
                            <?php } else {?>
                            <div class="text-success fw-bold text-center p-5">
                                No Orders Found.
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
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/popper.min.js" type="text/javascript"></script>
<script src="assets/js/sweetalert.min.js" type="text/javascript"></script>

<script>
<?php  
    if(isset($mixed['msg'])) {?>
swal('', '<?php echo $mixed['msg'];?>', '<?php echo $mixed['icon'];?>');
<?php }
       ?>
</script>