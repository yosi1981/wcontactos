<?php $__env->startSection('content'); ?>
<div class="container" >
    <div class="row" >

        <div class="col-md-8 col-md-offset-2" style="top:200px;left:60px">
                    <div class="tableefecto widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
                        <div class="widget-header widget-header-small">
                            <h6 class="widget-title">
                                <i class="ace-icon fa fa-table">
                                </i>
                               Acceso
                            </h6>
                        </div>
                        <div class="widget-body" style="display: block;">
                    <form action="<?php echo e(route('login')); ?>" class="form-horizontal" method="POST" role="form">
                        <?php echo e(csrf_field()); ?>


                            <div class="widget-main ">
                                    <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                        <label class="col-md-4 control-label" for="email">
                                            email
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
                                            password
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
                            </div>
                            <div class="modal-footer">
                                        <button class="btn btn-primary" type="submit">
                                                Entrar
                                        </button>
                            </div>
<?php echo e(Form::close()); ?>

                        </div>
                    </div>
        </div>
    </div>
        <script src="<?php echo e(asset('/js/jquery-2.1.4.min.js')); ?>">
        </script>

</div>
<style>
.tableefecto{
  box-shadow: 1px 1px 20px #000;
}
</style>
<?php $__env->stopSection(); ?>






<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>