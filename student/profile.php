<?php require_once 'header.php'; ?>

<?php 
    $id = $_SESSION['student_id'];

    $sql = "select * from students where id = '$id'";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();

?>
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
            <li><a href="#">Test</a></li>
        </ul>
    </div>
</div>
<div class="row animated fadeInUp">
    <div class="col-sm-12">
        <div class="col-md-6 col-md-offset-3">
        <div>
            <div class="profile-photo">
                <img  alt="User photo" src="../images/students/<?= $row['image']?>" style="width:100px"  />
            </div>
            <div class="user-header-info">
                <h2 class="user-name"><?= ucwords($row['name']) ?></h2>
                <h5 class="user-position">UI Designer</h5>
            </div>
        </div>
        <div class="panel bg-scale-0 b-primary bt-sm mt-xl">
            <div class="panel-content">
                <h4 class=""><b>Contact Information</b></h4>
                <ul class="user-contact-info ph-sm">
                    <li><b><i class="color-primary mr-sm fa fa-envelope"></i></b> <?= $row['email']?></li>
                    <li><b><i class="color-primary mr-sm fa fa-phone"></i></b><?= $row['phone']?></li>
                    <li><b><i class="color-primary mr-sm fa fa-globe"></i></b> Helsinki, Finland</li>
                    <li class="mt-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum dolorem error itaque maxime minus saepe similique voluptatibus. Beatae cumque dolore doloribus impedit omnis porro tempore tenetur. Aperiam dolorum odio quo?</li>
                </ul>
            </div>
            <a href="update_profile.php" class="btn btn-info ">Update Profile</a>
        </div>
    </div>
</div>
</div>
<?php require_once 'footer.php'; ?>