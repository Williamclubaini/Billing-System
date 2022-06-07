<?php sleep(2); ?>

<body class="app app-login p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding mb-4">
                        <a class="app-logo" href="index.html"><img class="logo-icon me-2"
                                src="assets/images/app-logo.jpg" alt="logo" /></a>
                    </div>
                    <h2 class="auth-heading text-center mb-5">Automated Billing System for Aliko Agro-dealers.</h2>
                    <p class="bg-danger text-white text-center mb-4 rounded">
                        <?php echo $data['error'] ?? NULL;?>
                    </p>
                    <div class="auth-form-container text-start">
                        <form method="POST" class="auth-form login-form">
                            <div class="email mb-3">
                                <label class="sr-only" for="signin-email">Email</label>
                                <input id="signin-email" name="email" type="email" class="form-control signin-email"
                                    placeholder="Email address" required="required" />
                                <span class="bg-danger text-light py-2"><?php echo $data['email'] ?? NULL; ?></span>
                            </div>
                            <!--//form-group-->
                            <div class="password mb-3">
                                <label class="sr-only" for="signin-password">Password</label>
                                <input id="signin-password" name="password" type="password"
                                    class="form-control signin-password" placeholder="Password" required="required" />
                                <span
                                    class="bg-danger text-white mb-1 mt-4"><?php echo $data['password'] ?? NULL; ?></span>
                                <div class="extra mt-3 row justify-content-between">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="RememberPassword" />
                                            <label class="form-check-label" for="RememberPassword">
                                                Remember me
                                            </label>
                                        </div>
                                    </div>
                                    <!--//col-6-->

                                    <!--//col-6-->
                                </div>
                                <!--//extra-->
                            </div>
                            <!--//form-group-->
                            <div class="text-center">
                                <button type="submit" name="login" class="btn app-btn-primary w-100 theme-btn mx-auto">
                                    Log In
                                </button>
                            </div>
                        </form>

                        <div class="auth-option text-center pt-5">
                            No Account? Sign up
                            <a class="text-link" href="<?php echo URL;?>register">here</a>. <br>
                            <?php 
                                  if(!isset($_GET['page']) || $_GET['page'] === 'login')
                                  {?>
                            <span class="spinner-grow text-success spinner-grow-sm" role="status"
                                aria-hidden="true"></span>
                            <small class="copyright"><a class="app-link" href="<?php echo URL;?>admin">Administrator
                                    System</a></small>
                            <?php }
                            ?>
                        </div>

                    </div>
                    <!--//auth-form-container-->
                </div>
                <!--//auth-body-->