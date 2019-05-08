<!DOCTYPE html>
<html lang="en">
    <head>
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
        <meta charset="utf-8"/>
        <title>
            El aroma del placer
        </title>
        <meta content="Common form elements and layouts" name="description"/>
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0" name="viewport"/>
        <!-- bootstrap & fontawesome -->
        <?php echo $__env->make('layouts.styles.styles', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- inline styles related to this page -->
        <!-- ace settings handler -->
        <?php echo $__env->make('layouts.scripts.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <script>
            $('#datetimepicker').datetimepicker({
          datepicker:false,
          format:'H:i'
        });
        </script>
        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
        <!--[if lte IE 8]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="no-skin">
        <div class="navbar navbar-default ace-save-state" id="navbar">
            <div class="navbar-container ace-save-state" id="navbar-container">
                <button class="navbar-toggle menu-toggler pull-left" data-target="#sidebar" id="menu-toggler" type="button">
                    <span class="sr-only">
                        Toggle sidebar
                    </span>
                    <span class="icon-bar">
                    </span>
                    <span class="icon-bar">
                    </span>
                    <span class="icon-bar">
                    </span>
                </button>
                <div class="navbar-header pull-left">
                    <a class="navbar-brand" href="index.html">
                        <small>
                            <i class="fa fa-leaf">
                            </i>
                            El Aroma del Placer
                        </small>
                    </a>
                </div>
                <div class="navbar-buttons navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">
                        <li class="grey dropdown-modal">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="ace-icon fa fa-tasks">
                                </i>
                                <span class="badge badge-grey">
                                    4
                                </span>
                            </a>
                            <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                                <li class="dropdown-header">
                                    <i class="ace-icon fa fa-check">
                                    </i>
                                    4 Tasks to complete
                                </li>
                                <li class="dropdown-content">
                                    <ul class="dropdown-menu dropdown-navbar">
                                        <li>
                                            <a href="#">
                                                <div class="clearfix">
                                                    <span class="pull-left">
                                                        Software Update
                                                    </span>
                                                    <span class="pull-right">
                                                        65%
                                                    </span>
                                                </div>
                                                <div class="progress progress-mini">
                                                    <div class="progress-bar" style="width:65%">
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="clearfix">
                                                    <span class="pull-left">
                                                        Hardware Upgrade
                                                    </span>
                                                    <span class="pull-right">
                                                        35%
                                                    </span>
                                                </div>
                                                <div class="progress progress-mini">
                                                    <div class="progress-bar progress-bar-danger" style="width:35%">
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="clearfix">
                                                    <span class="pull-left">
                                                        Unit Testing
                                                    </span>
                                                    <span class="pull-right">
                                                        15%
                                                    </span>
                                                </div>
                                                <div class="progress progress-mini">
                                                    <div class="progress-bar progress-bar-warning" style="width:15%">
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="clearfix">
                                                    <span class="pull-left">
                                                        Bug Fixes
                                                    </span>
                                                    <span class="pull-right">
                                                        90%
                                                    </span>
                                                </div>
                                                <div class="progress progress-mini progress-striped active">
                                                    <div class="progress-bar progress-bar-success" style="width:90%">
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="#">
                                        See tasks with details
                                        <i class="ace-icon fa fa-arrow-right">
                                        </i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="purple dropdown-modal">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="ace-icon fa fa-bell icon-animated-bell">
                                </i>
                                <span class="badge badge-important">
                                    8
                                </span>
                            </a>
                            <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                                <li class="dropdown-header">
                                    <i class="ace-icon fa fa-exclamation-triangle">
                                    </i>
                                    8 Notifications
                                </li>
                                <li class="dropdown-content">
                                    <ul class="dropdown-menu dropdown-navbar navbar-pink">
                                        <li>
                                            <a href="#">
                                                <div class="clearfix">
                                                    <span class="pull-left">
                                                        <i class="btn btn-xs no-hover btn-pink fa fa-comment">
                                                        </i>
                                                        New Comments
                                                    </span>
                                                    <span class="pull-right badge badge-info">
                                                        +12
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="btn btn-xs btn-primary fa fa-user">
                                                </i>
                                                Bob just signed up as an editor ...
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="clearfix">
                                                    <span class="pull-left">
                                                        <i class="btn btn-xs no-hover btn-success fa fa-shopping-cart">
                                                        </i>
                                                        New Orders
                                                    </span>
                                                    <span class="pull-right badge badge-success">
                                                        +8
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="clearfix">
                                                    <span class="pull-left">
                                                        <i class="btn btn-xs no-hover btn-info fa fa-twitter">
                                                        </i>
                                                        Followers
                                                    </span>
                                                    <span class="pull-right badge badge-info">
                                                        +11
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="#">
                                        See all notifications
                                        <i class="ace-icon fa fa-arrow-right">
                                        </i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="green dropdown-modal">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="ace-icon fa fa-envelope icon-animated-vertical">
                                </i>
                                <span class="badge badge-success">
                                    5
                                </span>
                            </a>
                            <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                                <li class="dropdown-header">
                                    <i class="ace-icon fa fa-envelope-o">
                                    </i>
                                    5 Messages
                                </li>
                                <li class="dropdown-content">
                                    <ul class="dropdown-menu dropdown-navbar">
                                        <li>
                                            <a class="clearfix" href="#">
                                                <img alt="Alex's Avatar" class="msg-photo" src="<?php echo e(asset('/images/avatars/avatar.png')); ?>"/>
                                                <span class="msg-body">
                                                    <span class="msg-title">
                                                        <span class="blue">
                                                            Alex:
                                                        </span>
                                                        Ciao sociis natoque penatibus et auctor ...
                                                    </span>
                                                    <span class="msg-time">
                                                        <i class="ace-icon fa fa-clock-o">
                                                        </i>
                                                        <span>
                                                            a moment ago
                                                        </span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="clearfix" href="#">
                                                <img alt="Susan's Avatar" class="msg-photo" src="<?php echo e(asset('/images/avatars/avatar3.png')); ?>"/>
                                                <span class="msg-body">
                                                    <span class="msg-title">
                                                        <span class="blue">
                                                            Susan:
                                                        </span>
                                                        Vestibulum id ligula porta felis euismod ...
                                                    </span>
                                                    <span class="msg-time">
                                                        <i class="ace-icon fa fa-clock-o">
                                                        </i>
                                                        <span>
                                                            20 minutes ago
                                                        </span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="clearfix" href="#">
                                                <img alt="Bob's Avatar" class="msg-photo" src="<?php echo e(asset('/images/avatars/avatar4.png')); ?>"/>
                                                <span class="msg-body">
                                                    <span class="msg-title">
                                                        <span class="blue">
                                                            Bob:
                                                        </span>
                                                        Nullam quis risus eget urna mollis ornare ...
                                                    </span>
                                                    <span class="msg-time">
                                                        <i class="ace-icon fa fa-clock-o">
                                                        </i>
                                                        <span>
                                                            3:15 pm
                                                        </span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="clearfix" href="#">
                                                <img alt="Kate's Avatar" class="msg-photo" src="<?php echo e(asset('/images/avatars/avatar2.png')); ?>"/>
                                                <span class="msg-body">
                                                    <span class="msg-title">
                                                        <span class="blue">
                                                            Kate:
                                                        </span>
                                                        Ciao sociis natoque eget urna mollis ornare ...
                                                    </span>
                                                    <span class="msg-time">
                                                        <i class="ace-icon fa fa-clock-o">
                                                        </i>
                                                        <span>
                                                            1:33 pm
                                                        </span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="clearfix" href="#">
                                                <img alt="Fred's Avatar" class="msg-photo" src="<?php echo e(asset('/images/avatars/avatar5.png')); ?>"/>
                                                <span class="msg-body">
                                                    <span class="msg-title">
                                                        <span class="blue">
                                                            Fred:
                                                        </span>
                                                        Vestibulum id penatibus et auctor  ...
                                                    </span>
                                                    <span class="msg-time">
                                                        <i class="ace-icon fa fa-clock-o">
                                                        </i>
                                                        <span>
                                                            10:09 am
                                                        </span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="inbox.html">
                                        See all messages
                                        <i class="ace-icon fa fa-arrow-right">
                                        </i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="light-blue dropdown-modal">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <img alt="Jason's Photo" class="nav-user-photo" src="<?php echo e(asset('/images/avatars/user.jpg')); ?>"/>
                                <span class="user-info">
                                    <small>
                                        Welcome,
                                    </small>
                                </span>
                                <i class="ace-icon fa fa-caret-down">
                                </i>
                            </a>
                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <li>
                                    <a href="#">
                                        <i class="ace-icon fa fa-cog">
                                        </i>
                                        Settings
                                    </a>
                                </li>
                                <li>
                                    <a href="profile.html">
                                        <i class="ace-icon fa fa-user">
                                        </i>
                                        Profile
                                    </a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="/logout">
                                        <i class="ace-icon fa fa-power-off">
                                        </i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.navbar-container -->
        </div>
        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try{ace.settings.loadState('main-container')}catch(e){}
            </script>
            <div class="sidebar responsive ace-save-state" id="sidebar">
                <script type="text/javascript">
                    try{ace.settings.loadState('sidebar')}catch(e){}
                </script>
                <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                        <button class="btn btn-success">
                            <i class="ace-icon fa fa-signal">
                            </i>
                        </button>
                        <button class="btn btn-info">
                            <i class="ace-icon fa fa-pencil">
                            </i>
                        </button>
                        <button class="btn btn-warning">
                            <i class="ace-icon fa fa-users">
                            </i>
                        </button>
                        <button class="btn btn-danger">
                            <i class="ace-icon fa fa-cogs">
                            </i>
                        </button>
                    </div>
                    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                        <span class="btn btn-success">
                        </span>
                        <span class="btn btn-info">
                        </span>
                        <span class="btn btn-warning">
                        </span>
                        <span class="btn btn-danger">
                        </span>
                    </div>
                </div>
                <?php echo $__env->yieldContent('barraizda'); ?>
                <!--<ul class="nav nav-list">
                    <li class="">
                        <a href="index.html">
                            <i class="menu-icon fa fa-tachometer">
                            </i>
                            <span class="menu-text">
                                Dashboard
                            </span>
                        </a>
                        <b class="arrow">
                        </b>
                    </li>
                    <li class="">
                        <a class="dropdown-toggle" href="#">
                            <i class="menu-icon fa fa-desktop">
                            </i>
                            <span class="menu-text">
                                UI & Elements
                            </span>
                            <b class="arrow fa fa-angle-down">
                            </b>
                        </a>
                        <b class="arrow">
                        </b>
                        <ul class="submenu">
                            <li class="">
                                <a class="dropdown-toggle" href="#">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    Layouts
                                    <b class="arrow fa fa-angle-down">
                                    </b>
                                </a>
                                <b class="arrow">
                                </b>
                                <ul class="submenu">
                                    <li class="">
                                        <a href="top-menu.html">
                                            <i class="menu-icon fa fa-caret-right">
                                            </i>
                                            Top Menu
                                        </a>
                                        <b class="arrow">
                                        </b>
                                    </li>
                                    <li class="">
                                        <a href="two-menu-1.html">
                                            <i class="menu-icon fa fa-caret-right">
                                            </i>
                                            Two Menus 1
                                        </a>
                                        <b class="arrow">
                                        </b>
                                    </li>
                                    <li class="">
                                        <a href="two-menu-2.html">
                                            <i class="menu-icon fa fa-caret-right">
                                            </i>
                                            Two Menus 2
                                        </a>
                                        <b class="arrow">
                                        </b>
                                    </li>
                                    <li class="">
                                        <a href="mobile-menu-1.html">
                                            <i class="menu-icon fa fa-caret-right">
                                            </i>
                                            Default Mobile Menu
                                        </a>
                                        <b class="arrow">
                                        </b>
                                    </li>
                                    <li class="">
                                        <a href="mobile-menu-2.html">
                                            <i class="menu-icon fa fa-caret-right">
                                            </i>
                                            Mobile Menu 2
                                        </a>
                                        <b class="arrow">
                                        </b>
                                    </li>
                                    <li class="">
                                        <a href="mobile-menu-3.html">
                                            <i class="menu-icon fa fa-caret-right">
                                            </i>
                                            Mobile Menu 3
                                        </a>
                                        <b class="arrow">
                                        </b>
                                    </li>
                                </ul>
                            </li>
                            <li class="">
                                <a href="typography.html">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    Typography
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                            <li class="">
                                <a href="elements.html">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    Elements
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                            <li class="">
                                <a href="buttons.html">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    Buttons & Icons
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                            <li class="">
                                <a href="content-slider.html">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    Content Sliders
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                            <li class="">
                                <a href="treeview.html">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    Treeview
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                            <li class="">
                                <a href="jquery-ui.html">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    jQuery UI
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                            <li class="">
                                <a href="nestable-list.html">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    Nestable Lists
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                            <li class="">
                                <a class="dropdown-toggle" href="#">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    Three Level Menu
                                    <b class="arrow fa fa-angle-down">
                                    </b>
                                </a>
                                <b class="arrow">
                                </b>
                                <ul class="submenu">
                                    <li class="">
                                        <a href="#">
                                            <i class="menu-icon fa fa-leaf green">
                                            </i>
                                            Item #1
                                        </a>
                                        <b class="arrow">
                                        </b>
                                    </li>
                                    <li class="">
                                        <a class="dropdown-toggle" href="#">
                                            <i class="menu-icon fa fa-pencil orange">
                                            </i>
                                            4th level
                                            <b class="arrow fa fa-angle-down">
                                            </b>
                                        </a>
                                        <b class="arrow">
                                        </b>
                                        <ul class="submenu">
                                            <li class="">
                                                <a href="#">
                                                    <i class="menu-icon fa fa-plus purple">
                                                    </i>
                                                    Add Product
                                                </a>
                                                <b class="arrow">
                                                </b>
                                            </li>
                                            <li class="">
                                                <a href="#">
                                                    <i class="menu-icon fa fa-eye pink">
                                                    </i>
                                                    View Products
                                                </a>
                                                <b class="arrow">
                                                </b>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a class="dropdown-toggle" href="#">
                            <i class="menu-icon fa fa-cogs">
                            </i>
                            <span class="menu-text">
                                Tables
                            </span>
                            <b class="arrow fa fa-angle-down">
                            </b>
                        </a>
                        <b class="arrow">
                        </b>
                        <ul class="submenu">
                            <li class="">
                                <a href="tables.html">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    Simple & Dynamic
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                            <li class="">
                                <a href="jqgrid.html">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    jqGrid plugin
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                        </ul>
                    </li>
                    <li class="active open">
                        <a class="dropdown-toggle" href="#">
                            <i class="menu-icon fa fa-pencil-square-o">
                            </i>
                            <span class="menu-text">
                                Forms
                            </span>
                            <b class="arrow fa fa-angle-down">
                            </b>
                        </a>
                        <b class="arrow">
                        </b>
                        <ul class="submenu">
                            <li class="active">
                                <a href="form-elements.html">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    Form Elements
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                            <li class="">
                                <a href="form-elements-2.html">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    Form Elements 2
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                            <li class="">
                                <a href="form-wizard.html">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    Wizard & Validation
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                            <li class="">
                                <a href="wysiwyg.html">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    Wysiwyg & Markdown
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                            <li class="">
                                <a href="dropzone.html">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    Dropzone File Upload
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="widgets.html">
                            <i class="menu-icon fa fa-list-alt">
                            </i>
                            <span class="menu-text">
                                Widgets
                            </span>
                        </a>
                        <b class="arrow">
                        </b>
                    </li>
                    <li class="">
                        <a href="calendar.html">
                            <i class="menu-icon fa fa-calendar">
                            </i>
                            <span class="menu-text">
                                Calendar
                                <span class="badge badge-transparent tooltip-error" title="2 Important Events">
                                    <i class="ace-icon fa fa-exclamation-triangle red bigger-130">
                                    </i>
                                </span>
                            </span>
                        </a>
                        <b class="arrow">
                        </b>
                    </li>
                    <li class="">
                        <a href="gallery.html">
                            <i class="menu-icon fa fa-picture-o">
                            </i>
                            <span class="menu-text">
                                Gallery
                            </span>
                        </a>
                        <b class="arrow">
                        </b>
                    </li>
                    <li class="">
                        <a class="dropdown-toggle" href="#">
                            <i class="menu-icon fa fa-tag">
                            </i>
                            <span class="menu-text">
                                More Pages
                            </span>
                            <b class="arrow fa fa-angle-down">
                            </b>
                        </a>
                        <b class="arrow">
                        </b>
                        <ul class="submenu">
                            <li class="">
                                <a href="profile.html">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    User Profile
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                            <li class="">
                                <a href="inbox.html">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    Inbox
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                            <li class="">
                                <a href="pricing.html">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    Pricing Tables
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                            <li class="">
                                <a href="invoice.html">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    Invoice
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                            <li class="">
                                <a href="timeline.html">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    Timeline
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                            <li class="">
                                <a href="search.html">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    Search Results
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                            <li class="">
                                <a href="email.html">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    Email Templates
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                            <li class="">
                                <a href="login.html">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    Login & Register
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a class="dropdown-toggle" href="#">
                            <i class="menu-icon fa fa-file-o">
                            </i>
                            <span class="menu-text">
                                Other Pages
                                <span class="badge badge-primary">
                                    5
                                </span>
                            </span>
                            <b class="arrow fa fa-angle-down">
                            </b>
                        </a>
                        <b class="arrow">
                        </b>
                        <ul class="submenu">
                            <li class="">
                                <a href="faq.html">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    FAQ
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                            <li class="">
                                <a href="error-404.html">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    Error 404
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                            <li class="">
                                <a href="error-500.html">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    Error 500
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                            <li class="">
                                <a href="grid.html">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    Grid
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                            <li class="">
                                <a href="blank.html">
                                    <i class="menu-icon fa fa-caret-right">
                                    </i>
                                    Blank Page
                                </a>
                                <b class="arrow">
                                </b>
                            </li>
                        </ul>
                    </li>
                </ul>

                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right" id="sidebar-toggle-icon">
                    </i>
                </div>-->
            </div>
            <div class="main-content">
                <?php echo $__env->yieldContent('contenido'); ?>
            </div>
            <!-- /.main-content -->
            <div class="footer">
                <div class="footer-inner">
                    <div class="footer-content">
                        <span class="bigger-120">
                            <span class="blue bolder">
                                Ace
                            </span>
                            Application © 2013-2014
                        </span>
                        <span class="action-buttons">
                            <a href="#">
                                <i class="ace-icon fa fa-twitter-square light-blue bigger-150">
                                </i>
                            </a>
                            <a href="#">
                                <i class="ace-icon fa fa-facebook-square text-primary bigger-150">
                                </i>
                            </a>
                            <a href="#">
                                <i class="ace-icon fa fa-rss-square orange bigger-150">
                                </i>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
            <a class="btn-scroll-up btn btn-sm btn-inverse" href="#" id="btn-scroll-up">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110">
                </i>
            </a>
        </div>
        <!-- /.main-container -->
        <!-- basic scripts -->
        <!--[if !IE]> -->
        <!-- <![endif]-->
        <!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
        <script type="text/javascript">
            if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
        </script>
        <!-- inline scripts related to this page -->
        <script type="text/javascript">
            jQuery(function($) {
                


                                $('.show-details-btn').on('click', function(e) {
                    e.preventDefault();
                    var elegido=$(this);
                        $('.show-details-btn').each(function(){
                                var aux=$(this);
                                if(elegido[0]!=aux[0])
                                {
                                    console.log("alksdfj");
                                    aux.closest('tr').next().removeClass('open');
                                    aux.find('i').removeClass('fa-angle-double-up').addClass('fa-angle-double-down');
                                }
                        });


                    $(this).closest('tr').next().toggleClass('open');
                    $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
                });

                $('#id-disable-check').on('click', function() {
                    var inp = $('#form-input-readonly').get(0);
                    if(inp.hasAttribute('disabled')) {
                        inp.setAttribute('readonly' , 'true');
                        inp.removeAttribute('disabled');
                        inp.value="This text field is readonly!";
                    }
                    else {
                        inp.setAttribute('disabled' , 'disabled');
                        inp.removeAttribute('readonly');
                        inp.value="This text field is disabled!";
                    }
                });


                if(!ace.vars['touch']) {
                    $('.chosen-select').chosen({allow_single_deselect:true});
                    //resize the chosen on window resize

                    $(window)
                    .off('resize.chosen')
                    .on('resize.chosen', function() {
                        $('.chosen-select').each(function() {
                             var $this = $(this);
                             $this.next().css({'width': $this.parent().width()});
                        })
                    }).trigger('resize.chosen');
                    //resize chosen on sidebar collapse/expand
                    $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
                        if(event_name != 'sidebar_collapsed') return;
                        $('.chosen-select').each(function() {
                             var $this = $(this);
                             $this.next().css({'width': $this.parent().width()});
                        })
                    });


                    $('#chosen-multiple-style .btn').on('click', function(e){
                        var target = $(this).find('input[type=radio]');
                        var which = parseInt(target.val());
                        if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
                         else $('#form-field-select-4').removeClass('tag-input-style');
                    });
                }


                $('[data-rel=tooltip]').tooltip({container:'body'});
                $('[data-rel=popover]').popover({container:'body'});

                autosize($('textarea[class*=autosize]'));

                $('textarea.limited').inputlimiter({
                    remText: '%n character%s remaining...',
                    limitText: 'max allowed : %n.'
                });

                $.mask.definitions['~']='[+-]';
                $('.input-mask-date').mask('99/99/9999');
                $('.input-mask-phone').mask('(999) 999-9999');
                $('.input-mask-eyescript').mask('~9.99 ~9.99 999');
                $(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});



                $( "#input-size-slider" ).css('width','200px').slider({
                    value:1,
                    range: "min",
                    min: 1,
                    max: 8,
                    step: 1,
                    slide: function( event, ui ) {
                        var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
                        var val = parseInt(ui.value);
                        $('#form-field-4').attr('class', sizing[val]).attr('placeholder', '.'+sizing[val]);
                    }
                });

                $( "#input-span-slider" ).slider({
                    value:1,
                    range: "min",
                    min: 1,
                    max: 12,
                    step: 1,
                    slide: function( event, ui ) {
                        var val = parseInt(ui.value);
                        $('#form-field-5').attr('class', 'col-xs-'+val).val('.col-xs-'+val);
                    }
                });



                //"jQuery UI Slider"
                //range slider tooltip example
                $( "#slider-range" ).css('height','200px').slider({
                    orientation: "vertical",
                    range: true,
                    min: 0,
                    max: 100,
                    values: [ 17, 67 ],
                    slide: function( event, ui ) {
                        var val = ui.values[$(ui.handle).index()-1] + "";

                        if( !ui.handle.firstChild ) {
                            $("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>")
                            .prependTo(ui.handle);
                        }
                        $(ui.handle.firstChild).show().children().eq(1).text(val);
                    }
                }).find('span.ui-slider-handle').on('blur', function(){
                    $(this.firstChild).hide();
                });


                $( "#slider-range-max" ).slider({
                    range: "max",
                    min: 1,
                    max: 10,
                    value: 2
                });

                $( "#slider-eq > span" ).css({width:'90%', 'float':'left', margin:'15px'}).each(function() {
                    // read initial values from markup and remove that
                    var value = parseInt( $( this ).text(), 10 );
                    $( this ).empty().slider({
                        value: value,
                        range: "min",
                        animate: true

                    });
                });

                $("#slider-eq > span.ui-slider-purple").slider('disable');//disable third item


                $('#id-input-file-1 , #id-input-file-2').ace_file_input({
                    no_file:'No File ...',
                    btn_choose:'Choose',
                    btn_change:'Change',
                    droppable:false,
                    onchange:null,
                    thumbnail:false //| true | large
                    //whitelist:'gif|png|jpg|jpeg'
                    //blacklist:'exe|php'
                    //onchange:''
                    //
                });
                //pre-show a file name, for example a previously selected file
                //$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])


                $('#id-input-file-3').ace_file_input({
                    style: 'well',
                    btn_choose: 'Drop files here or click to choose',
                    btn_change: null,
                    no_icon: 'ace-icon fa fa-cloud-upload',
                    droppable: true,
                    thumbnail: 'small'//large | fit
                    //,icon_remove:null//set null, to hide remove/reset button
                    /**,before_change:function(files, dropped) {
                        //Check an example below
                        //or examples/file-upload.html
                        return true;
                    }*/
                    /**,before_remove : function() {
                        return true;
                    }*/
                    ,
                    preview_error : function(filename, error_code) {
                        //name of the file that failed
                        //error_code values
                        //1 = 'FILE_LOAD_FAILED',
                        //2 = 'IMAGE_LOAD_FAILED',
                        //3 = 'THUMBNAIL_FAILED'
                        //alert(error_code);
                    }

                }).on('change', function(){
                    //console.log($(this).data('ace_input_files'));
                    //console.log($(this).data('ace_input_method'));
                });


                //$('#id-input-file-3')
                //.ace_file_input('show_file_list', [
                    //{type: 'image', name: 'name of image', path: 'http://path/to/image/for/preview'},
                    //{type: 'file', name: 'hello.txt'}
                //]);




                //dynamically change allowed formats by changing allowExt && allowMime function
                $('#id-file-format').removeAttr('checked').on('change', function() {
                    var whitelist_ext, whitelist_mime;
                    var btn_choose
                    var no_icon
                    if(this.checked) {
                        btn_choose = "Drop images here or click to choose";
                        no_icon = "ace-icon fa fa-picture-o";

                        whitelist_ext = ["jpeg", "jpg", "png", "gif" , "bmp"];
                        whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];
                    }
                    else {
                        btn_choose = "Drop files here or click to choose";
                        no_icon = "ace-icon fa fa-cloud-upload";

                        whitelist_ext = null;//all extensions are acceptable
                        whitelist_mime = null;//all mimes are acceptable
                    }
                    var file_input = $('#id-input-file-3');
                    file_input
                    .ace_file_input('update_settings',
                    {
                        'btn_choose': btn_choose,
                        'no_icon': no_icon,
                        'allowExt': whitelist_ext,
                        'allowMime': whitelist_mime
                    })
                    file_input.ace_file_input('reset_input');

                    file_input
                    .off('file.error.ace')
                    .on('file.error.ace', function(e, info) {
                        //console.log(info.file_count);//number of selected files
                        //console.log(info.invalid_count);//number of invalid files
                        //console.log(info.error_list);//a list of errors in the following format

                        //info.error_count['ext']
                        //info.error_count['mime']
                        //info.error_count['size']

                        //info.error_list['ext']  = [list of file names with invalid extension]
                        //info.error_list['mime'] = [list of file names with invalid mimetype]
                        //info.error_list['size'] = [list of file names with invalid size]


                        /**
                        if( !info.dropped ) {
                            //perhapse reset file field if files have been selected, and there are invalid files among them
                            //when files are dropped, only valid files will be added to our file array
                            e.preventDefault();//it will rest input
                        }
                        */


                        //if files have been selected (not dropped), you can choose to reset input
                        //because browser keeps all selected files anyway and this cannot be changed
                        //we can only reset file field to become empty again
                        //on any case you still should check files with your server side script
                        //because any arbitrary file can be uploaded by user and it's not safe to rely on browser-side measures
                    });


                    /**
                    file_input
                    .off('file.preview.ace')
                    .on('file.preview.ace', function(e, info) {
                        console.log(info.file.width);
                        console.log(info.file.height);
                        e.preventDefault();//to prevent preview
                    });
                    */

                });

                $('#spinner1').ace_spinner({value:0,min:0,max:200,step:10, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
                .closest('.ace-spinner')
                .on('changed.fu.spinbox', function(){
                    //console.log($('#spinner1').val())
                });
                $('#spinner2').ace_spinner({value:0,min:0,max:10000,step:100, touch_spinner: true, icon_up:'ace-icon fa fa-caret-up bigger-110', icon_down:'ace-icon fa fa-caret-down bigger-110'});
                $('#spinner3').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus bigger-110', icon_down:'ace-icon fa fa-minus bigger-110', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
                $('#spinner4').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus', icon_down:'ace-icon fa fa-minus', btn_up_class:'btn-purple' , btn_down_class:'btn-purple'});

                //$('#spinner1').ace_spinner('disable').ace_spinner('value', 11);
                //or
                //$('#spinner1').closest('.ace-spinner').spinner('disable').spinner('enable').spinner('value', 11);//disable, enable or change value
                //$('#spinner1').closest('.ace-spinner').spinner('value', 0);//reset to 0


                //datepicker plugin
                //link
                $('.date-picker').datepicker({
                    autoclose: true,
                    todayHighlight: true
                })
                //show datepicker when clicking on the icon
                .next().on(ace.click_event, function(){
                            
                            $(this).prev().focus();
                });

                //or change it into a date range picker
                $('.input-daterange').datepicker({autoclose:true});


                //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
                $('input[name=date-range-picker]').daterangepicker({
                    'applyClass' : 'btn-sm btn-success',
                    'cancelClass' : 'btn-sm btn-default',
                    locale: {
                        applyLabel: 'Apply',
                        cancelLabel: 'Cancel',
                    }
                })
                .prev().on(ace.click_event, function(){
                    $(this).next().focus();
                });


                $('#timepicker1').timepicker({
                    minuteStep: 1,
                    showSeconds: true,
                    showMeridian: false,
                    disableFocus: true,
                    icons: {
                        up: 'fa fa-chevron-up',
                        down: 'fa fa-chevron-down'
                    }
                }).on('focus', function() {
                    $('#timepicker1').timepicker('showWidget');
                }).next().on(ace.click_event, function(){
                    $(this).prev().focus();
                });




                if(!ace.vars['old_ie']) $('#date-timepicker1').datetimepicker({
                 //format: 'MM/DD/YYYY h:mm:ss A',//use this option to display seconds
                 icons: {
                    time: 'fa fa-clock-o',
                    date: 'fa fa-calendar',
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down',
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-arrows ',
                    clear: 'fa fa-trash',
                    close: 'fa fa-times'
                 }
                }).next().on(ace.click_event, function(){
                    $(this).prev().focus();
                });


                $('#colorpicker1').colorpicker();
                //$('.colorpicker').last().css('z-index', 2000);//if colorpicker is inside a modal, its z-index should be higher than modal'safe

                $('#simple-colorpicker-1').ace_colorpicker();
                //$('#simple-colorpicker-1').ace_colorpicker('pick', 2);//select 2nd color
                //$('#simple-colorpicker-1').ace_colorpicker('pick', '#fbe983');//select #fbe983 color
                //var picker = $('#simple-colorpicker-1').data('ace_colorpicker')
                //picker.pick('red', true);//insert the color if it doesn't exist


                $(".knob").knob();


                var tag_input = $('#form-field-tags');
                try{
                    tag_input.tag(
                      {
                        placeholder:tag_input.attr('placeholder'),
                        //enable typeahead by specifying the source array
                        source: ace.vars['US_STATES'],//defined in ace.js >> ace.enable_search_ahead
                        /**
                        //or fetch data from database, fetch those that match "query"
                        source: function(query, process) {
                          $.ajax({url: 'remote_source.php?q='+encodeURIComponent(query)})
                          .done(function(result_items){
                            process(result_items);
                          });
                        }
                        */
                      }
                    )

                    //programmatically add/remove a tag
                    var $tag_obj = $('#form-field-tags').data('tag');
                    $tag_obj.add('Programmatically Added');

                    var index = $tag_obj.inValues('some tag');
                    $tag_obj.remove(index);
                }
                catch(e) {
                    //display a textarea for old IE, because it doesn't support this plugin or another one I tried!
                    tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
                    //autosize($('#form-field-tags'));
                }


                /////////
                $('#modal-form input[type=file]').ace_file_input({
                    style:'well',
                    btn_choose:'Drop files here or click to choose',
                    btn_change:null,
                    no_icon:'ace-icon fa fa-cloud-upload',
                    droppable:true,
                    thumbnail:'large'
                })

                //chosen plugin inside a modal will have a zero width because the select element is originally hidden
                //and its width cannot be determined.
                //so we set the width after modal is show
                $('#modal-form').on('shown.bs.modal', function () {
                    if(!ace.vars['touch']) {
                        $(this).find('.chosen-container').each(function(){
                            $(this).find('a:first-child').css('width' , '210px');
                            $(this).find('.chosen-drop').css('width' , '210px');
                            $(this).find('.chosen-search input').css('width' , '200px');
                        });
                    }
                })
                /**
                //or you can activate the chosen plugin after modal is shown
                //this way select element becomes visible with dimensions and chosen works as expected
                $('#modal-form').on('shown', function () {
                    $(this).find('.modal-chosen').chosen();
                })
                */



                $(document).one('ajaxloadstart.page', function(e) {
                    autosize.destroy('textarea[class*=autosize]')

                    $('.limiterBox,.autosizejs').remove();
                    $('.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu').remove();
                });

            });
        </script>
        <!--        <script type="text/javascript">
            jQuery(function($) {
                //initiate dataTables plugin
                var myTable =
                $('#dynamic-table')
                //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                .DataTable( {
                    bAutoWidth: false,
                    "aoColumns": [
                      { "bSortable": false },
                      null, null,null, null, null,
                      { "bSortable": false }
                    ],
                    "aaSorting": [],


                    //"bProcessing": true,
                    //"bServerSide": true,
                    //"sAjaxSource": "http://127.0.0.1/table.php"   ,

                    //,
                    //"sScrollY": "200px",
                    //"bPaginate": false,

                    //"sScrollX": "100%",
                    //"sScrollXInner": "120%",
                    //"bScrollCollapse": true,
                    //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
                    //you may want to wrap the table inside a "div.dataTables_borderWrap" element

                    //"iDisplayLength": 50


                    select: {
                        style: 'multi'
                    }
                } );



                $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

                new $.fn.dataTable.Buttons( myTable, {
                    buttons: [
                      {
                        "extend": "colvis",
                        "text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
                        "className": "btn btn-white btn-primary btn-bold",
                        columns: ':not(:first):not(:last)'
                      },
                      {
                        "extend": "copy",
                        "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
                        "className": "btn btn-white btn-primary btn-bold"
                      },
                      {
                        "extend": "csv",
                        "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
                        "className": "btn btn-white btn-primary btn-bold"
                      },
                      {
                        "extend": "excel",
                        "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
                        "className": "btn btn-white btn-primary btn-bold"
                      },
                      {
                        "extend": "pdf",
                        "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
                        "className": "btn btn-white btn-primary btn-bold"
                      },
                      {
                        "extend": "print",
                        "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
                        "className": "btn btn-white btn-primary btn-bold",
                        autoPrint: false,
                        message: 'This print was produced using the Print button for DataTables'
                      }
                    ]
                } );
                myTable.buttons().container().appendTo( $('.tableTools-container') );

                //style the message box
                var defaultCopyAction = myTable.button(1).action();
                myTable.button(1).action(function (e, dt, button, config) {
                    defaultCopyAction(e, dt, button, config);
                    $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
                });


                var defaultColvisAction = myTable.button(0).action();
                myTable.button(0).action(function (e, dt, button, config) {

                    defaultColvisAction(e, dt, button, config);


                    if($('.dt-button-collection > .dropdown-menu').length == 0) {
                        $('.dt-button-collection')
                        .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
                        .find('a').attr('href', '#').wrap("<li />")
                    }
                    $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
                });

                ////

                setTimeout(function() {
                    $($('.tableTools-container')).find('a.dt-button').each(function() {
                        var div = $(this).find(' > div').first();
                        if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
                        else $(this).tooltip({container: 'body', title: $(this).text()});
                    });
                }, 500);





                myTable.on( 'select', function ( e, dt, type, index ) {
                    if ( type === 'row' ) {
                        $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
                    }
                } );
                myTable.on( 'deselect', function ( e, dt, type, index ) {
                    if ( type === 'row' ) {
                        $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
                    }
                } );




                /////////////////////////////////
                //table checkboxes
                $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

                //select/deselect all rows according to table header checkbox
                $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
                    var th_checked = this.checked;//checkbox inside "TH" table header

                    $('#dynamic-table').find('tbody > tr').each(function(){
                        var row = this;
                        if(th_checked) myTable.row(row).select();
                        else  myTable.row(row).deselect();
                    });
                });

                //select/deselect a row when the checkbox is checked/unchecked
                $('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
                    var row = $(this).closest('tr').get(0);
                    if(this.checked) myTable.row(row).deselect();
                    else myTable.row(row).select();
                });



                $(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
                    e.stopImmediatePropagation();
                    e.stopPropagation();
                    e.preventDefault();
                });



                //And for the first simple table, which doesn't have TableTools or dataTables
                //select/deselect all rows according to table header checkbox
                var active_class = 'active';
                $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
                    var th_checked = this.checked;//checkbox inside "TH" table header

                    $(this).closest('table').find('tbody > tr').each(function(){
                        var row = this;
                        if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
                        else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
                    });
                });

                //select/deselect a row when the checkbox is checked/unchecked
                $('#simple-table').on('click', 'td input[type=checkbox]' , function(){
                    var $row = $(this).closest('tr');
                    if($row.is('.detail-row ')) return;
                    if(this.checked) $row.addClass(active_class);
                    else $row.removeClass(active_class);
                });



                /********************************/
                //add tooltip for small view action buttons in dropdown menu
                $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

                //tooltip placement on right or left
                function tooltip_placement(context, source) {
                    var $source = $(source);
                    var $parent = $source.closest('table')
                    var off1 = $parent.offset();
                    var w1 = $parent.width();

                    var off2 = $source.offset();
                    //var w2 = $source.width();

                    if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
                    return 'left';
                }





                $('.show-details-btn').on('click', function(e) {
                    e.preventDefault();
                    $(this).closest('tr').next().toggleClass('open');
                    $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
                });






                /**
                //add horizontal scrollbars to a simple table
                $('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
                  {
                    horizontal: true,
                    styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
                    size: 2000,
                    mouseWheelLock: true
                  }
                ).css('padding-top', '12px');
                */


            })
        </script> -->
    </body>
</html>
