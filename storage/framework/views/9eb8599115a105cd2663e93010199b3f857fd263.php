<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
        <title>
            Lingerie Store Css Template
        </title>
 <?php echo $__env->make('layouts.styles.styles1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  
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
