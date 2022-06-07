   <div class="app-wrapper">
       <div class="app-content pt-3 p-md-3 p-lg-4">
           <div class="container-xl">
               <?php 
               if (!empty($data)) {?>
               <div class="row g-3 mb-4 align-items-center justify-content-between">
                   <div class="col-auto">
                       <h1 class="app-page-title mb-0"><i class="bi bi-cart3"></i> Products</h1>
                       <hr>
                   </div>
                   <!--//col-auto-->
               </div>
               <!--//row-->
               <div class="container">
                   <div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-3">
                       <?php 

                        foreach ($data as $product) {?>
                       <div class="col">
                           <div class="p-3 border bg-light">
                               <form method="post">

                                   <div class="app-card app-card-doc shadow-sm h-100">
                                       <div class="app-card-thumb-holder p-3">

                                           <div class="app-card-thumb">
                                               <img class="thumb-image"
                                                   src="assets/images/products/<?php echo $product->image;?>" alt="" />
                                           </div>
                                           <span class="badge"
                                               style="background-color:crimson;"><?php echo $product->status;?></span>
                                           <a class="app-card-link-mask" href="#file-link"></a>
                                       </div>
                                       <div class="app-card-body p-3 has-card-actions">
                                           <h4 class="app-doc-title truncate mb-0">
                                               <a href="#file-link"><?php echo ucfirst($product->name);?></a>
                                           </h4>
                                           <div class="app-doc-meta">
                                               <ul class="list-unstyled mb-0">
                                                   <li><span class="text-muted">Price:</span>
                                                       <?php echo 'MK'.number_format($product->price, 2);?></li>
                                                   <li><span class="text-muted">Quantity:</span>
                                                       <?php echo $product->quantity;?><br>
                                                       <input type="number" class="w-100"
                                                           max="<?php echo $product->quantity;?>" min="1"
                                                           placeholder="select number of items" name="qty">
                                                   </li>
                                                   <li>
                                                       <button type="submit" name="placeOrder"
                                                           class="dropdown-item bg-primary text-white rounded-1 mt-2"><i
                                                               class="bi bi-cart3"></i> Place An
                                                           Order</button>
                                                   </li>
                                               </ul>
                                           </div>
                                           <!--//app-doc-meta-->

                                           <!--=== INSERT INTO DATABASE -->
                                           <input type="hidden" name="pname" value="<?php echo $product->name;?>">
                                           <input type="hidden" name="pprice" value="<?php echo $product->price;?>">
                                           <input type="hidden" name="total"
                                               value="<?php echo $product->quantity * $product->price;?>">
                                           <!--===== INSERT INTO DATABASE -->
                                       </div>
                                       <!--//app-card-body-->
                                   </div>
                                   <!--//app-card-->

                               </form>

                           </div>
                           <!--//row-->
                       </div>
                       <?php }
                   ?>
                   </div>
               </div>
           </div>
           <div class="row g-4">


               <nav class="app-pagination mt-5">
                   <ul class="pagination justify-content-center">
                       <li class="page-item disabled">
                           <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                       </li>
                       <li class="page-item active">
                           <a class="page-link" href="#">1</a>
                       </li>
                       <li class="page-item"><a class="page-link" href="#">2</a></li>
                       <li class="page-item"><a class="page-link" href="#">3</a></li>
                       <li class="page-item">
                           <a class="page-link" href="#">Next</a>
                       </li>
                   </ul>
               </nav>
               <!--//app-pagination-->
               <?php } else {?>

               <!--  -->
               <br><br><br>

               <div class="inner bg-body shadow-lg rounded">

                   <div class="app-card-body text-center p-3 p-lg-4">
                       <h3 class="mb-3">No products available in stock</h3>
                       <i class="bi bi-bell text-success display-3"></i>
                       <div class="row gx-5 gy-3">
                           <div class="col-12">
                               <p class="mb-0 mt-1">Please Subscribe to get notified when products are available
                                   in
                                   the stock.</p> <br>

                               <a href="<?php echo URL;?>subscribe"
                                   class="btn btn-success  rounded-pill text-white w-50 theme-btn mx-auto">
                                   Subscribe
                               </a>

                           </div>
                       </div>
                       <!--//row-->

                   </div>
                   <!--//app-card-body-->

               </div>
               <!--//inner-->





               <?php }
               ?>
           </div>
           <!--//container-fluid-->
       </div>

       <script src="assets/js/jquery.min.js" type="text/javascript"></script>
       <script src="assets/js/popper.min.js" type="text/javascript"></script>
       <script src="assets/js/sweetalert.min.js" type="text/javascript"></script>

       <script>
       <?php  
            if(isset($mixed['msg'])) {?>
       swal('', '<?php echo $mixed['msg'];?>', 'success');
       <?php }
       ?>
       </script>