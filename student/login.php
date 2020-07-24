<?php 
require_once '../db.php';
session_start();
if (isset($_SESSION['student_email'])) {
  Redirect('index.php');
}
if (isset($_POST['login'])) {
 $email = $_POST['email'];
 $password = md5($_POST['password']);

 $sql = "select * from students where email='$email' or username='$email'";
 $result = $db->query($sql);
 if (mysqli_num_rows($result)==1) {
  $data = $result->fetch_assoc();
  if ($data['password']==$password) {
   if ($data['status']==1) {
     $_SESSION['student_email']=$email;
     $_SESSION['student_id']=$data['id'];
     $_SESSION['student_name']=$data['name'];
     Redirect('index.php');
   }else{
    $error = "Your Status Inactive";
  }
}
else{
  $pass_error = "Password is Invalid";
}
}else{
  $error = "Email or Username Invalid";
}

}


?>
<!doctype html>
<html lang="en" class="fixed accounts sign-in">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Login</title>
  <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
  <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>

<body>
  <div class="wrap">
    <div class="page-body animated slideInDown">
      <div class="logo">
        <h2 class="text-center">Login</h2>
        <?php if (isset($error)) { ?>
         <div class="alert alert-danger alert-dismissible " role="alert">
          <strong>
           <?php   echo $error; ?>
         </strong> 
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php } ?>
    <?php if (isset($pass_error)) { ?>
     <div class="alert alert-danger alert-dismissible " role="alert">
      <strong>
       <?php   echo $pass_error; ?>
     </strong> 
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php } ?>
</div>
<div class="box">
  <!--SIGN IN FORM-->
  <div class="panel mb-none">
    <div class="panel-content bg-scale-0">
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group mt-md">
          <span class="input-with-icon">
            <input type="text" class="form-control" name="email" placeholder="Email or Username" value="<?= isset($email)?$email:'' ?>">
            <i class="fa fa-envelope"></i>
          </span>
        </div>
        <div class="form-group">
          <span class="input-with-icon">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <i class="fa fa-key"></i>
          </span>
        </div>
        <div class="form-group">
          <input type="submit" name="login" class="btn btn-primary btn-block" value="Sign in">
        </div>
        <div class="form-group text-center">
          <a href="pages_forgot-password.html">Forgot password?</a>
          <hr/>
          <span>Don't have an account?</span>
          <a href="register.php" class="btn btn-block mt-sm">Register</a>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
<script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
<script src="../assets/javascripts/template-script.min.js"></script>
<script src="../assets/javascripts/template-init.min.js"></script>
</body>
</html>
