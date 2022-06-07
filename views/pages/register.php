<body class="app app-signup p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img
                                class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"></a></div>
                    <h2 class="auth-heading text-center mb-4">Welcome to Agro Dealers</h2>
                    <small class="bg-danger text-white text-center mb-4 rounded">
                        <?php echo $data['error'] ?? NULL;?>
                    </small>

                    <div class="auth-form-container text-start mx-auto">
                        <form class="auth-form auth-signup-form" method="POST">
                            <div class="email mb-3">
                                <label class="sr-only" for="signup-email">Your Name</label>
                                <input id="signup-name" name="firstname" type="text" class="form-control signup-name"
                                    placeholder="Full name" required="required">
                                <small class="bg-danger text-white text-center mb-4 rounded">
                                    <?php echo $data['firstname'] ?? NULL;?>
                                </small>
                            </div>
                            <div class="email mb-3">
                                <label class="sr-only" for="signup-email">Your Surname</label>
                                <input id="signup-name" name="surname" type="text" class="form-control signup-name"
                                    placeholder="Surname" required="required">
                                <small class="bg-danger text-white text-center mb-4 rounded">
                                    <?php echo $data['surname'] ?? NULL;?>
                                </small>
                            </div>
                            <div class="email mb-3">
                                <label class="sr-only" for="signup-email">Your email</label>
                                <input id="signup-name" name="email" type="text" class="form-control signup-name"
                                    placeholder="Email" required="required">
                                <small class="bg-danger text-white text-center mb-4 rounded">
                                    <?php echo $data['email'] ?? NULL;?>
                                </small>
                            </div>
                            <div class="email mb-3">
                                <label class="sr-only" for="signup-email">Contact</label>
                                <input id="signup-name" name="phone" type="text" class="form-control signup-name"
                                    placeholder="Contact" required="required">
                                <small class="bg-danger text-white text-center mb-4 rounded">
                                    <?php echo $data['phone'] ?? NULL;?>
                                </small>
                            </div>
                            <div class="email mb-3">
                                <label class="sr-only" for="signup-email">Location</label>
                                <input id="signup-email" name="location" type="text" class="form-control signup-email"
                                    placeholder="Location" required="required">
                                <small class="bg-danger text-white text-center mb-4 rounded">
                                    <?php echo $data['location'] ?? NULL;?>
                                </small>
                            </div>
                            <div class="password mb-3">
                                <label class="sr-only" for="signup-password">Password</label>
                                <input id="signup-password" name="password" type="password"
                                    class="form-control signup-password" placeholder="Password" required="required">
                                <small class="bg-danger text-white text-center mb-4 rounded">
                                    <?php echo $data['password'] ?? NULL;?>
                                </small>
                            </div>
                            <div class="extra mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="RememberPassword">
                                    <label class="form-check-label" for="RememberPassword">
                                        I agree to Portal's <a href="#" class="app-link">Terms of Service</a> and <a
                                            href="#" class="app-link">Privacy Policy</a>.
                                    </label>
                                </div>
                            </div>
                            <!--//extra-->

                            <div class="text-center">
                                <button type="submit" name="register"
                                    class="btn app-btn-primary w-100 theme-btn mx-auto">Sign
                                    Up</button>
                            </div>
                        </form>
                        <!--//auth-form-->

                        <div class="auth-option text-center pt-5">Already have an account? <a class="text-link"
                                href="<?php echo URL;?>login">Log in</a></div>
                    </div>
                    <!--//auth-form-container-->



                </div>
                <!--//auth-body-->