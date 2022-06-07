<?php 
if (!empty($data)) {?>

<?php 
    if ($data[0] === 1) {?>
<footer class="app-auth-footer">
    <div class="container text-center py-3">
        <small>
            Developed by Wongani Harry Mkandawire</small>
    </div>
</footer>
<!--//app-auth-footer-->
</div>
<!--//flex-column-->
</div>
<!--//auth-main-col-->
<div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
    <div class="auth-background-holder">
    </div>
    <div class="auth-background-mask"></div>
    <div class="auth-background-overlay p-3 p-lg-5">
        <div class="d-flex flex-column align-content-end h-100">
            <div class="h-100"></div>
            <div class="overlay-content p-3 p-lg-4 rounded">
                <h5 class="mb-3 overlay-title">Welcome To Agro Dealers</h5>
            </div>
        </div>
    </div>
    <!--//auth-background-overlay-->
</div>
<!--//auth-background-col-->

</div>
<!--//row-->
<?php }
?>

<?php } else {?>
<footer class="app-footer">
    <div class="container text-center py-3">


    </div>
</footer>
<!--//app-footer-->
</div>
<!--//app-wrapper-->
<!-- Javascript -->
<script src="assets/plugins/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Charts JS -->
<script src="assets/plugins/chart.js/chart.min.js"></script>
<script src="assets/js/index-charts.js"></script>

<!-- Page Specific JS -->
<script src="assets/js/app.js"></script>

<?php }
?>
</body>

</html>