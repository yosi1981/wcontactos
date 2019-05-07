<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Login
                </div>
                <div class="panel-body">
                    <!-- /.col -->
                    <form action="<?php echo e(route('login')); ?>" class="form-horizontal" method="POST" role="form">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label" for="email">
                                E-Mail Address
                            </label>
                            <div class="col-md-6">
                                <input autofocus="" class="form-control" id="email" name="email" required="" type="email" value="<?php echo e(old('email')); ?>">
                                    <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong>
                                            <?php echo e($errors->first('email')); ?>

                                        </strong>
                                    </span>
                                    <?php endif; ?>
                                </input>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label" for="password">
                                Password
                            </label>
                            <div class="col-md-6">
                                <input class="form-control" id="password" name="password" required="" type="password">
                                    <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong>
                                            <?php echo e($errors->first('password')); ?>

                                        </strong>
                                    </span>
                                    <?php endif; ?>
                                </input>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button class="btn btn-primary" type="submit">
                                    Login
                                </button>
                                <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <script src="<?php echo e(asset('/js/jquery-2.1.4.min.js')); ?>">
        </script>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>