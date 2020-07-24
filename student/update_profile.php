<?php require_once 'header.php'; ?>
<?php 
$id = $_SESSION['student_id'];

$sql = "select * from students where id = '$id'";
$result = $db->query($sql);
$row = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $password = md5($_POST['password']);


    if ($_FILES['image']) {
     $raw = "select * from students where id='$id'";
    $result = $db->query($raw);
    $data = $result->fetch_assoc();
    $img = $data['image'];
    $img_path = "../images/students/".$img;

    $image = explode('.', $_FILES['image']['name']);
    $ext = end($image);
    $image = date('Ydmhis.').$ext;
    $id = $_SESSION['student_id'];
    
        
    $sql = "UPDATE students SET name='$name',username='$username',phone='$phone',password='$password',image='$image' WHERE id='$id' ";


    if ($db->query($sql) === TRUE) {
        unlink($img_path);
        move_uploaded_file($_FILES['image']['tmp_name'], '../images/students/'.$image);
        $success = "Update Successfully!!";
    } else {
      $error= $db->error;
  }
}
}

?>
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
            <li><a href="#">Student</a></li>
        </ul>
    </div>
</div>
<div class="row animated fadeInUp">
    <div class="col-sm-8 col-md-offset-2">
        <h4 class="section-subtitle"><b>Update</b> Profile</h4>
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
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="<?= $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Name </label>
                                <input type="text" name="name" value="<?= $row['name']?>"  class="form-control" >
                            </div>
                            <div class="form-group">
                                <label>Username </label>
                                <input type="text" name="username" value="<?= $row['username']?>"  class="form-control" >
                            </div>
                            <div class="form-group">
                                <label>Phone </label>
                                <input type="text" name="phone" value="<?= $row['phone']?>"  class="form-control" >
                            </div>
                            <div class="form-group">
                                <label>Password </label>
                                <input type="password" name="password"  class="form-control" >
                            </div>
                            <div class="form-group">
                                <label>Image </label>
                                <input type="file" name="image"  class="form-control" >
                            </div>
                            <div class="form-group">
                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<?php require_once 'footer.php'; ?>