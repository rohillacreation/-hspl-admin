
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HSPL | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo e(asset('bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('bower_components/font-awesome/css/font-awesome.min.css')); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo e(asset('bower_components/Ionicons/css/ionicons.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('dist/css/AdminLTE.min.css')); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/iCheck/square/blue.css')); ?>">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="<?php if(env('APP_ENV') == 'local') { ?>background-image: url('<?php echo e(asset('images/backgroundimage/abc.jpg')); ?>')<?php } else { ?> background-image: url('<?php echo e(asset('public/images/backgroundimage/abc.jpg')); ?>') <?php } ?>;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  overflow: hidden;
  background-blend-mode: overlay;
  background-position: center;">
  <!-- <body class="hold-transition login-page" style="background-image: url('<?php echo e(asset('public/images/backgroundimage/abc.jpg')); ?>; background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  overflow: hidden;opacity: 0.5"> -->
<div class="login-box">
  <div class="login-logo">
    <a href="#">
     <?php if(env('APP_ENV') == 'local'): ?>
    
     <img src="<?php echo e(asset('images/backgroundimage/cname.png')); ?>" style="width: auto;height: 35px;"></a>
    
    <?php else: ?>
    
     <img src="<?php echo e(asset('public/images/backgroundimage/cname.png')); ?>" style="width: auto;height: 35px;"></a> 
    
    <?php endif; ?>
<div style="text-align: center;border: 1px solid #3c8dbc;border-radius: 37px;background-color: #3c8dbc;">
    <h5 style="font-family: sans-serif;font-weight: 600;color: white;">Quality. Safety. Excellence</h5>
</div>
    <!-- <a href="#"><b style="font-family: initial;">HSPL</b></a> -->
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <!-- <p class="login-box-msg">Quality, Safity and Excellence</p> -->

    <form method="POST" action="<?php echo e(route('login')); ?>">
        <?php echo csrf_field(); ?>
      <div class="form-group has-feedback">
        <input id="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" placeholder="Email">

        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($message); ?></strong>
            </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" placeholder="Password">

        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($message); ?></strong>
            </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
       
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>

        <div class="col-xs-8">
          <a href="#" onclick="forget()" style="float: right;">Forget Password</a>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- model start -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <p class="modal-title">Forget Password</p>
              </div>
              <div class="box-body" id="forgetpassword" style="min-height: 100px">
                <label for="email_id">Enter Your Email</label><br>
                <input type="text" name="email_id" id="email_id" style="width: 50%;border-collapse: collapse;border-color: black;" placeholder="Enter Your Email" required>
                <button class="btn btn-primary" onclick="send_otp();" style="width: 20%;">Send OTP</button><br>

                <label for="otp">Enter OTP</label><br>
                <input type="text" name="otp" id="otp" style="width: 50%;border-collapse: collapse;border-color: black;" placeholder="Enter Your OTP" required>
                <button type="button" class="btn btn-primary" onclick="verify_otp();" style="width: 20%;">Submit</button>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
      </div>
    </div>


    <!-- model start -->
    <div class="modal fade" id="myModal1" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <p class="modal-title">Reset Password</p>
              </div>

              
              <div class="box-body" id="resetpassword" style="min-height: 100px">
                 <!-- <form role="form" method="POST" action="<?php echo e(url('/new_password')); ?>">
                    <?php echo csrf_field(); ?> -->
                        <label for="password1">Enter New Password</label><br>
                        <input type="password" name="password1" id="password1" style="width: 50%;border-collapse: collapse;border-color: black;" placeholder="Enter Your Password" required><br>


                        <label for="confirmpassword">Confirm Password</label><br>
                        <input type="password" name="confirmpassword" id="confirmpassword" style="width: 50%;border-collapse: collapse;border-color: black;" placeholder="Confirm Your Password" required>
                        <button type="button" onclick="password_change()" class="btn btn-primary" style="width: 20%;">Submit</button>
                <!-- </form> -->
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
      </div>
    </div>
  <!-- model end -->

   
    <!-- /.social-auth-links -->

    

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo e(asset('bower_components/jquery/dist/jquery.min.js')); ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo e(asset('bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<!-- iCheck -->
<script src="<?php echo e(asset('plugins/iCheck/icheck.min.js')); ?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });

  function forget() 
   {
       $('#myModal').modal();
   }

   function send_otp()
   {  
      var appBaseUrl = <?php echo json_encode(url('/')); ?>; 
      var email_id = $('#email_id').val();

       $.ajax({
           url: appBaseUrl+'/reset_password/send_otp',
           type:'POST',
           data:{email_id : email_id,  _token: '<?php echo e(csrf_token()); ?>' }, 
           success: function(result)
           {
            alert(result);
              //console.log(result);           
           }
         });
   }

   function verify_otp()
   {
      var appBaseUrl = <?php echo json_encode(url('/')); ?>; 
      var otp = $('#otp').val();

       $.ajax({
           url: appBaseUrl+'/reset_password/verify_otp',
           type:'POST',
           data:{otp : otp,  _token: '<?php echo e(csrf_token()); ?>' }, 
           success: function(result)
           {
            if(result == 'Otp Verified')
            {
                alert(result);
                $('#myModal').hide();
                $('#myModal1').modal();
            }
            else
            {
                alert(result);
            }
              //console.log(result);           
           }
         });
   }

   function password_change()
   {  
      var appBaseUrl = <?php echo json_encode(url('/')); ?>; 
      var password = $('#password1').val();
      var confirmpassword = $('#confirmpassword').val();
       $.ajax({
           url: appBaseUrl+'/new_password',
           type:'POST',
           data:{password : password,confirmpassword: confirmpassword,  _token: '<?php echo e(csrf_token()); ?>' }, 
           success: function(result)
           {
              if(result == '200')
              {
                alert('Password Change Successfully Please Login With New Password !');
                location.reload();
              }
              else
              {
                alert(result);
              }
           }
         });
   }
</script>
</body>
</html>

<?php /**PATH E:\public_html\hspl-admin\resources\views/auth/login.blade.php ENDPATH**/ ?>