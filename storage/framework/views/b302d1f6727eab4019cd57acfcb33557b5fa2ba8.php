<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
        <title>
            Lingerie Store Css Template
        </title>
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
            <!-- Font Awesome -->
            <link href="<?php echo e(asset('css/font-awesome.css')); ?>" rel="stylesheet">
                <!-- Theme style -->
                <link href="<?php echo e(asset('css/AdminLTE.min.css')); ?>" rel="stylesheet">
                    <link href="<?php echo e(asset('css/lightbox.min.css')); ?>" rel="stylesheet">
                        <link href="<?php echo e(asset('css/neon.css')); ?>" rel="stylesheet">
                            <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
                            <link href="<?php echo e(asset('css/_all-skins.min.css')); ?>" rel="stylesheet">
                                <link href="<?php echo e(asset('img/apple-touch-icon.png')); ?>" rel="apple-touch-icon">
                                    <link href="<?php echo e(asset('img/favicon.ico')); ?>" rel="shortcut icon">
                                        <script crossorigin="anonymous" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" src="https://code.jquery.com/jquery-3.1.1.js">
                                        </script>
                                    </link>
                                </link>
                            </link>
                        </link>
                    </link>
                </link>
            </link>
        </link>
    </head>
    <body>
        <div id="header">
            <div align="center">
                <h1>
                    <span>
                        E
                    </span>
                    <span>
                        l
                    </span>
                    <span class="sep">
                        A
                    </span>
                    <span>
                        r
                    </span>
                    <span>
                        o
                    </span>
                    <span>
                        m
                    </span>
                    <span>
                        a
                    </span>
                    <span class="sep">
                        D
                    </span>
                    <span>
                        e
                    </span>
                    <span>
                        l
                    </span>
                    <span class="sep">
                        P
                    </span>
                    <span>
                        l
                    </span>
                    <span>
                        a
                    </span>
                    <span>
                        c
                    </span>
                    <span>
                        e
                    </span>
                    <span>
                        r
                    </span>
                </h1>
            </div>
        </div>
        <div id="main_container">
            <div id="main_content">
                <div class="left_sidebar">
                    <div id="left_menu">
                        <aside class="main-sidebar">
                            <!-- sidebar: style can be found in sidebar.less -->
                            <section class="sidebar">
                                <!-- Sidebar user panel -->
                                <!-- sidebar menu: : style can be found in sidebar.less -->
                                <ul class="sidebar-menu">
                                    <?php echo $__env->yieldContent('barraizquierda'); ?>
                                </ul>
                            </section>
                            <!-- /.sidebar -->
                        </aside>
                    </div>
                    <div>
                    </div>
                    <div class="submenu_pic">
                    </div>
                </div>
                <div id="center_content">
                    <?php echo $__env->yieldContent('contenido'); ?>
                </div>
            </div>
            <div id="footer">
                <div class="left_foter">
                    <img alt="" src="<?php echo e(asset('img/footer_logo.gif')); ?>" title=""/>
                </div>
            </div>
        </div>
    </body>
</html>
<!-- jQuery 2.1.4 -->
<script src="<?php echo e(asset('js/jQuery-2.1.4.min.js')); ?>">
</script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>">
</script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('js/app.min.js')); ?>">
</script>
<script src="<?php echo e(asset('js/lightbox-plus-jquery.min.js')); ?>">
</script>
