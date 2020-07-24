<?php require_once 'header.php'; ?>
<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
            <li><a href="#">Books</a></li>
        </ul>
    </div>
</div>
<div class="row animated fadeInUp">
    <div class="col-sm-12">
     <div class="panel">
        <div class="panel-content">
            <form method="post" action="<?= $_SERVER['PHP_SELF']?>">
                <div class="row pt-md">
                    <div class="form-group col-sm-9 col-lg-10">
                        <span class="input-with-icon">
                            <input type="text" name="book" class="form-control" id="lefticon" placeholder="Search" required="">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                    <div class="form-group col-sm-3  col-lg-2 ">
                        <button type="submit" name="search_book" class="btn btn-primary btn-block">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php 
if (isset($_POST['search_book'])) {
        $book = $_POST['book'];
    ?>
      <div class="col-sm-12">
     <div class="panel" >

        <div class="panel-content">
            <div class="row">
                <?php 
                $sql = "SELECT * FROM `books` WHERE `book_name` LIKE '%$book%' or book_authore_name  LIKE '%$book%' ";
                $result = $db->query($sql);
                $check = mysqli_num_rows($result);
                if ($check==0) {
                    echo "<span class='text-center'><h3>Data Not Found!!</h3></span>";
                }else{
                while ($row = $result -> fetch_assoc()) {   ?>
                    <div class="col-sm-3">
                        <img src="../images/books/<?= $row['book_image']?>" style="width:150px">
                        <p><?= $row['book_name']?></p>
                        <p>Abilable Book :<?= $row['abilable_qty']?></p>
                    </div>
                <?php }
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
}
else{
    ?>
    <div class="col-sm-12">
     <div class="panel">
        <div class="panel-content">
            <div class="row">
                <?php 
                $sql = "select * from books";
                $result = $db->query($sql);
                while ($row = $result -> fetch_assoc()) {   ?>
                    <div class="col-sm-3">
                        <img src="../images/books/<?= $row['book_image']?>" style="width:150px">
                        <p><?= $row['book_name']?></p>
                        <p>Abilable Book :<?= $row['abilable_qty']?></p>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>



<?php
}
?>

</div>
<?php require_once 'footer.php'; ?>