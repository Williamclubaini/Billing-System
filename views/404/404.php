<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Development method</title>
</head>

<body>
    <style>
    .bg-body {
        background-color: #fff !important;
    }

    .text-secondary {
        color: #6c757d !important;
    }

    .py-5 {
        padding-top: 3rem !important;
        padding-bottom: 3rem !important;
    }

    .px-4 {
        padding-right: 1.5rem !important;
        padding-left: 1.5rem !important;
    }

    .pt-5 {
        padding-top: 3rem !important;
    }

    .mx-auto {
        margin-right: auto !important;
        margin-left: auto !important;
    }

    .text-black {
        color: #000;
    }

    .display-5 {
        font-size: calc(1.425rem + 2.1vw);
        font-weight: 300;
        line-height: 1.2;
    }

    .italic {
        font-style: italic;
    }

    .msg-size {
        font-size: 1.5rem;
    }

    .text-center {
        text-align: center !important;
    }

    .theme-color {
        color: #2895ab !important;
    }

    .error {
        color: #bf2945 !important;
    }

    .btn-outline {
        color: #2895ab !important;
        border-color: #2895ab !important;
    }

    .btn:hover {
        color: #fff !important;
        background-color: #2895ab !important;
        border-color: #2895ab !important;
    }
    </style>
    <div class="bg-body error-box py-5 px-4 text-center" style="height: 80vh;">
        <?php
        if (CONFIG['environment'] == '' && CONFIG['environment'] == NULL) {?>

        <div class="py-5">
            <div style="padding-top:16%;">
                <div class="mx-auto">
                    <h1 class="display-5 error">ERROR: System Environment!</h1>
                </div>
            </div>
        </div>

        <?php } else {?>
        <div class="py-5">
            <div style="padding-top: 16%;">

                <div class="mx-auto">
                    <small class="display-5 theme-color">404 Page Not Found</small><br>
                    <small class="msg-size theme-color">
                        Page you are trying to access does not exist or might be temporally unvailable.
                    </small><br>
                    <?php if(CONFIG['environment'] === 'development') :?>
                    <small class="text-black italic">
                        <span class="bold">PAGE NOT FOUND</span>
                        <b>:<?php echo $page.'.php';?></b>
                    </small>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</body>

</html>
<?php 
exit();
?>