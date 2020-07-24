<?php
require_once '../db.php';
session_start();
if (isset($_SESSION['student_email'])) {
  Redirect('index.php');
}
if (isset($_POST['student_register'])) {


 $name = $_POST['name'];
 $username = $_POST['username'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 $roll = $_POST['roll'];
 $reg = $_POST['reg'];
 $password = $_POST['password'];

 $errors = array();
 if (empty($name)) {
   $errors['name']="Name filed is required";
 }
 if (empty($username)) {
   $errors['username']="username filed is required";
 }
 if (empty($email)) {
   $errors['email']="email filed is required";
 }
 if (empty($phone)) {
   $errors['phone']="phone filed is required";
 }
 if (empty($roll)) {
   $errors['roll']="roll filed is required";
 }
 if (empty($reg)) {
   $errors['reg']="reg filed is required";
 } 
 if (empty($password)) {
   $errors['password']="password filed is required";
 }
    $image = explode('.', $_FILES['image']['name']);
    $ext = end($image);
    $image = date('Ydmhis.').$ext;

 if (count($errors)==0) {
   $em = "select * from students where email='$email'";
   $email_check = $db->query($em);
   $check=mysqli_num_rows($email_check);
   if ($check) {
    $email_exists = "Email already Exists";
  } 
  if (strlen($username)<4) {
   $username_error = "Username minimum 4 character";
 }
 if (strlen($password)<3) {
   $password_error = "Password minimum 3 character";
 }
 else{
  $password=md5($password);
  $sql ="INSERT INTO `students`(`name`, `username`, `roll`, `email`, `phone`, `reg`,status, `password`,image) VALUES ( '$name' , '$username', '$roll', '$email', '$phone', '$reg','0', '$password','$image')";

  if ($db->query($sql) === TRUE) {
    move_uploaded_file($_FILES['image']['tmp_name'], '../images/students/'.$image);
   $success = "Registation Successfully!!";
 } else {
  $error= $db->error;
}

}



}

}

?>

<!doctype html>
<html lang="en" class="fixed accounts sign-in">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Register</title>

  <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
  <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>

<body>
  <div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
      <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
      <!--LOGO-->
      <div class="logo">
       <h2 class="text-center">Register</h2>
       <?php if (isset($success)) { ?>
         <div class="alert alert-success alert-dismissible " role="alert">
          <strong>

           <?php   echo $success; ?>

         </strong> 
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php } ?>
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
<?php if (isset($email_exists)) { ?>
 <div class="alert alert-danger alert-dismissible " role="alert">
  <strong>

   <?php   echo $email_exists; ?>

 </strong> 
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>
<?php } ?>
<?php if (isset($password_error)) { ?>
 <div class="alert alert-danger alert-dismissible " role="alert">
  <strong>

   <?php   echo $password_error; ?>

 </strong> 
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>
<?php } ?>
<?php if (isset($username_error)) { ?>
 <div class="alert alert-danger alert-dismissible " role="alert">
  <strong>

   <?php   echo $username_error; ?>

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
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group mt-md">
          <span class="input-with-icon">
            <input type="text" class="form-control" value="<?= isset($name)?$name:'' ?>" name="name" placeholder="Name">
            <i class="fa fa-user"></i>
          </span>
          <?php if (isset($errors['name'])) {
            echo '<span class="input-error">'.$errors['name'].'</span>';
          } ?>
        </div>
        <div class="form-group mt-md">
          <span class="input-with-icon">
            <input type="text" class="form-control" name="username" placeholder="Username" value="<?= isset($username)?$username:'' ?>">
            <i class="fa fa-user"></i>
          </span>
          <?php if (isset($errors['username'])) {
            echo '<span class="input-error">'.$errors['username'].'</span>';
          } ?>
        </div>
        <div class="form-group mt-md">
          <span class="input-with-icon">
            <input type="email" class="form-control" name="email" placeholder="Email" value="<?= isset($email)?$email:'' ?>">
            <i class="fa fa-envelope"></i>
          </span>
          <?php if (isset($errors['email'])) {
            echo '<span class="input-error">'.$errors['email'].'</span>';
          } ?>
        </div>
        <div class="form-group mt-md">
          <span class="input-with-icon">
            <input type="text" class="form-control" name="phone" placeholder="Phone" value="<?= isset($phone)?$phone:'' ?>">
            <i class="fa fa-envelope"></i>
          </span>
          <?php if (isset($errors['phone'])) {
            echo '<span class="input-error">'.$errors['phone'].'</span>';
          } ?>
        </div>
        <div class="form-group mt-md">
          <span class="input-with-icon">
            <input type="text" class="form-control" name="roll" pattern="[0-9]{6}" placeholder="Roll" value="<?= isset($roll)?$roll:'' ?>">
            <i class="fa fa-envelope"></i>
          </span>
          <?php if (isset($errors['roll'])) {
           echo '<span class="input-error">'.$errors['roll'].'</span>';
         } ?>
       </div>
       <div class="form-group mt-md">
        <span class="input-with-icon">
          <input type="text" class="form-control" name="reg" pattern="[0-9]{6}" placeholder="Reg" value="<?= isset($reg)?$reg:'' ?>">
          <i class="fa fa-envelope"></i>
        </span>
        <?php if (isset($errors['reg'])) {
          echo '<span class="input-error">'.$errors['reg'].'</span>';
        } ?>
      </div>
      <div class="form-group">
        <span class="input-with-icon">
          <input type="password" class="form-control" name="password" placeholder="Password" value="<?= isset($password)?$password:'' ?>">
          <i class="fa fa-key"></i>
        </span>
        <?php if (isset($errors['password'])) {
          echo '<span class="input-error">'.$errors['password'].'</span>';
        } ?>
      </div>
      <div class="form-group">

        <input type="file" name="image" class="form-control">
      </div>

      <div class="form-group">
        <input class="btn btn-primary btn-block" type="submit" name="student_register" value="Register">
      </div>
      <div class="form-group text-center">
        Have an account?, <a href="login.php">Sign In</a>
      </div>
    </form>
  </div>
</div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../assets/javascripts/template-script.min.js"></script>
<script src="../assets/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>
</html>
