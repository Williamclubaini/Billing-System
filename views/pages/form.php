<style>
input[type="text"],
input[type="email"]:disabled {
    background: #fff !important;
}

input[type="text"],
input[type="email"] {
    cursor: pointer;
}
</style>
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                <a class="flex-sm-fill text-sm-start nav-link active" id="orders-all-tab" data-bs-toggle="tab"
                    href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Payment Type:
                    <?php echo ucwords(str_replace('_', ' ', $_GET['payment']));?></a>

            </nav>

            <div class="container">
                <main>
                    <div class="row g-5">

                        <div class="col-md-7 col-lg-10 mx-auto">
                            <h4 class="mb-3">Billing address</h4>
                            <form method="POST">
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label for="firstName" class="form-label">First name</label>
                                        <input type="text" class="form-control" id="firstName"
                                            value="<?php echo USERNAME;?>" disabled>

                                    </div>

                                    <div class="col-sm-6">
                                        <label for="lastName" class="form-label">Last name</label>
                                        <input type="text" class="form-control" id="lastName"
                                            value="<?php echo SURNAME;?>" disabled>

                                    </div>

                                    <div class="col-12">
                                        <label for="email" class="form-label">Email </label>
                                        <input type="email" class="form-control" id="email" value="<?php echo EMAIL;?>"
                                            disabled>

                                    </div>

                                    <div class="col-12">
                                        <label for="address" class="form-label">Contact</label>
                                        <input type="text" class="form-control" id="address"
                                            placeholder="<?php echo str_replace('0', '+265',PHONE);?>" disabled>

                                    </div>

                                    <div class="col-12">
                                        <label for="address2" class="form-label">Location</label>
                                        <input type="text" class="form-control" id="address2"
                                            value="<?php echo LOCATION;?>" disabled>
                                    </div>
                                    <h4 class="mb-3">Payment</h4>
                                    <div class="fst-italic fw-bold">Please select the number of invoice you would like
                                        to pay
                                        for:</div>

                                    <div class="col-md-12">
                                        <label for="country" class="form-label">Invoice List</label>
                                        <select class="form-select" name="invoice_id" required>
                                            <?php 
                                                 foreach ($data as $invoice) {?>
                                            <option value="<?php echo $invoice->id;?>">
                                                <?php echo '#INVC - '.$invoice->id;?>
                                            </option>
                                            <?php }
                                            ?>
                                        </select>
                                        <small class="text-muted fw-bold">Please reference your invoice number to this
                                            section.
                                            <a href="<?php echo URL;?>invoice">Click here</a></small>
                                    </div>

                                </div>

                                <div class="row gy-3 mt-1">
                                    <?php 
                                        if ($_GET['payment'] === 'debit_card' || $_GET['payment'] === 'credit_card') {?>
                                    <div class="col-md-6">
                                        <label for="cc-name" class="form-label">Account name on the card</label>
                                        <input type="text" class="form-control" id="cc-name" required>
                                        <small class="text-muted">Full name as displayed on the card</small>
                                        <div class="invalid-feedback">
                                            Name on card is required
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="cc-number" class="form-label">ACCOUNT NUMBER</label>
                                        <input type="text" class="form-control" name="accNumber"
                                            placeholder="XXXX-XXXX-XXXX-XXXX" required>
                                        <small class="text-danger">NOTE: will deduct the total bill of your
                                            invoice to
                                            this number.</small>
                                    </div>
                                    <?php } else {?>
                                    <div class="col-md-6">
                                        <label for="cc-name" class="form-label">Account Name (Your name)</label>
                                        <input type="text" class="form-control" id="cc-name" required>
                                        <small class="text-muted">Full name as displayed on the account name</small>
                                        <div class="invalid-feedback">
                                            Name on card is required
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="cc-number"
                                            class="form-label">Contact(<?php echo ucwords(str_replace('_', ' ', $_GET['payment']));?>
                                            Account Phone
                                            Number)</label>
                                        <input type="text" class="form-control" name="accNumber" required>
                                        <small class="text-danger">NOTE: will deduct the total bill of your
                                            invoice to
                                            this number.</small>
                                    </div>
                                    <?php }
                                    ?>

                                    <div class="col-md-5">
                                        <label for="cc-expiration" class="form-label">Payment Method</label>
                                        <input type="text" name="payMethod" class="form-control"
                                            value="<?php echo ucwords(str_replace('_', ' ', $_GET['payment']));?>">

                                    </div>
                                </div>

                                <hr class="my-4">

                                <button class="w-100 text-white btn btn-primary btn-lg" name="Pay"
                                    type="submit">Continue to
                                    checkout</button>
                            </form>
                        </div>
                    </div>
                </main>

                <footer class="my-5 pt-5 text-muted text-center text-small">
                    <p class="mb-1">© 2016 – 2022 AGRO-DEALERS</p>
                </footer>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/popper.min.js" type="text/javascript"></script>
<script src="assets/js/sweetalert.min.js" type="text/javascript"></script>

<script>
<?php  
            if(isset($mixed['msg'])) {?>
swal('', '<?php echo $mixed['msg'];?>', 'success');
setTimeout(function() {
    window.location.assign("http://localhost/billing_system/index.php?page=payments");
}, 3000)
<?php }
       ?>
</script>