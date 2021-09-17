<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trainee Login</title>
    <link rel="stylesheet" href="<?php echo e(asset('bootstrap.min.css')); ?>">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top: 45px">
                 <h4>Trainee Login</h4><hr>
                 <form action="<?php echo e(route('trainee.check')); ?>" method="post">
                    <?php if(Session::get('fail')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(Session::get('fail')); ?>

                        </div>
                    <?php endif; ?>
                    <?php echo csrf_field(); ?>
                     <div class="form-group">
                         <label for="email">Email</label>
                         <input type="text" class="form-control" name="email" placeholder="Enter email address" value="<?php echo e(old('email')); ?>">
                         <span class="text-danger"><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                     </div>
                     <div class="form-group">
                         <label for="password">Password</label>
                         <input type="password" class="form-control" name="password" placeholder="Enter password" value="<?php echo e(old('password')); ?>">
                         <span class="text-danger"><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                     </div>
                     <div class="form-group">
                         <button type="submit" class="btn btn-primary">Login</button>
                     </div>
                     <br>
                     <a href="<?php echo e(route('trainee.register')); ?>">Create new Account</a>
                 </form>
            </div>
        </div>
    </div>
</body>
</html><?php /**PATH /opt/lampp/htdocs/freelancers/resources/views/dashboard/trainee/login.blade.php ENDPATH**/ ?>