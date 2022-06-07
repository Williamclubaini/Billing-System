<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <!--//row-->
            <?php
                   if (isset($_GET['id'])) {?>

            <?php $this->orders($_GET['orderId']);?>
            <div class="inner bg-body shadow-lg rounded">

                <div class="app-card-body text-center p-3 p-lg-4">
                    <h3 class="mb-3"><i class="bi bi-file-text-fill"></i> Creating Invoice...</h3>
                    <div class="d-flex justify-content-center">
                        <div class="spinner-border text-success" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <div class="row gx-5 gy-3">
                        <div class="col-12">
                            <p class="mb-0 mt-1 fst-italic">This might take longer than expected. Please wait patiently.
                            </p> <br>

                            <a href="javascript:void(0)"
                                class="btn btn-success  rounded-pill text-white w-50 theme-btn mx-auto" disabled>
                                Loading...
                            </a>

                        </div>
                    </div>
                    <!--//row-->

                </div>
                <!--//app-card-body-->
                <script type="text/javascript">
                setTimeout(function() {
                    window.location.assign("http://localhost/billing_system/index.php?page=ordersList");
                }, 5000)
                </script>

            </div>
            <?php }
            ?>

        </div>
    </div>