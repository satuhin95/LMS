<?php require_once 'header.php'; ?>
<?php 

if (isset($_POST['update'])) {
   $id=$_POST['id'];
   $book_name=$_POST['book_name'];
   $book_authore_name=$_POST['book_authore_name'];
   $book_publication_name=$_POST['book_publication_name'];
   $book_purchase_date=$_POST['book_purchase_date'];
   $book_price=$_POST['book_price'];
   $book_qty=$_POST['book_qty'];
   $abilable_qty=$_POST['abilable_qty'];
   $librarian_name = $_SESSION['librarian_name'];
   if ($_FILES['book_image']) {

    $raw = "select * from books where id='$id'";
    $result = $db->query($raw);
    $data = $result->fetch_assoc();
    $img = $data['book_image'];
    $img_path = "../images/books/".$img;
    unlink($img_path);
    $image = explode('.', $_FILES['book_image']['name']);
    $ext = end($image);
    $image = date('Ydmhis.').$ext;

    $sql = "UPDATE `books` SET `book_name`='$book_name',`book_image`='$image',`book_authore_name`='$book_authore_name',`book_publication_name`='$book_publication_name',`book_purchase_date`='$book_purchase_date',`book_price`='$book_price',`book_qty`='$book_qty',`abilable_qty`='$abilable_qty',`librarian_name`='$librarian_name' WHERE id='$id'";

    if ($db->query($sql) === TRUE) {
        move_uploaded_file($_FILES['book_image']['tmp_name'], '../images/books/'.$image);
        $success = "Update Book  Successfully!!";
       
    } else {
      $error= $db->error;
  }
}else{
   $sql = "UPDATE `books` SET `book_name`='$book_name',`book_authore_name`='$book_authore_name',`book_publication_name`='$book_publication_name',`book_purchase_date`='$book_purchase_date',`book_price`='$book_price',`book_qty`='$book_qty',`abilable_qty`='$abilable_qty',`librarian_name`='$librarian_name' WHERE id='$id'";

   if ($db->query($sql) === TRUE) {
    
    $success = "Update Book  Successfully!!";
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
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">Students</a></li>
        </ul>
    </div>
</div>
<div class="row animated fadeInUp">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b> Student List</b></h4> 
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
        <div class="table-responsive">
            <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Author</th>
                        <th>Publication</th>
                        <th>Purchase Date</th>
                        <th>Book Qty</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $sql = "select * from books";
                    $result = $db->query($sql);
                    while ($row = $result -> fetch_assoc()) {   ?>
                        <tr>

                            <td><?= $row['book_name'];?></td>
                            <td><?= $row['book_authore_name'];?></td>
                            <td><?= $row['book_publication_name'];?></td>
                            <td><?= $row['book_purchase_date'];?></td>
                            <td><?= $row['book_qty'];?></td>
                            <td>
                                <img src="../images/books/<?= $row['book_image'];?>" style="width: 50px" >
                            </td>
                            <td>

                                <a href="javascript:avoid(0)" class="btn btn-primary" data-toggle="modal"  data-target="#book-<?= $row['id'] ?>">View</a>

                                <a href="javascript:avoid(0)" class="btn btn-info" data-toggle="modal"  data-target="#book-update-<?= $row['id'] ?>">Edit</a>
                                <a href="delete.php?id=<?= base64_encode($row['id']); ?>" class="btn btn-danger" id="delete">Delete</a>

                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
<!-- show by useing modal -->
<?php 
$sql = "select * from books";
$result = $db->query($sql);
while ($row = $result -> fetch_assoc()) {   ?>
   <div class="modal fade" id="book-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-success-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-success">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-success-label"><i class="fa fa-book"></i>Book Details</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Name :</th>
                        <td><?= $row['book_name'];?></td>
                    </tr>
                    <tr>
                        <th>Author :</th>
                        <td><?= $row['book_authore_name'];?></td>
                    </tr>
                    <tr>
                        <th>Publication :</th>
                        <td><?= $row['book_publication_name'];?></td>
                    </tr>
                    <tr>
                        <th>Purchase Date :</th>
                        <td><?= $row['book_purchase_date'];?></td>
                    </tr>
                    <tr>
                        <th>Book Qty :</th>
                        <td><?= $row['book_qty'];?></td>
                    </tr>
                    <tr>
                        <th>Abilable Qty :</th>
                        <td><?= $row['abilable_qty'];?></td>
                    </tr>
                    <tr>
                        <th>Price :</th>
                        <td><?= $row['book_price'];?></td>
                    </tr>
                    <tr>
                        <th>Image :</th>
                        <td>
                            <img src="../images/books/<?= $row['book_image'];?>" style="width: 100px" >
                            
                        </td>
                    </tr>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php }?>
<!-- End show -->
<!-- Start Update -->
<?php 
$sql = "select * from books";
$result = $db->query($sql);
while ($row = $result -> fetch_assoc()) {   ?>
   <div class="modal fade" id="book-update-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-success-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-success">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-success-label"><i class="fa fa-book"></i>Book Update</h4>
            </div>
            <div class="modal-body">
             <form class="form-horizontal" method="post" action="<?= $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" >
                <h5 class="mb-lg"></h5>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Book Name </label>
                    <div class="col-sm-10">
                        <input type="text"  name="book_name" class="form-control"  placeholder="Book Name" required="" value="<?= $row['book_name'] ?>">
                    </div>
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <?php if (isset($errors['book_name'])) {
                        echo '<span class="input-error">'.$errors['book_name'].'</span>';
                    } ?>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Author Name</label>
                    <div class="col-sm-10">
                        <input type="text"  name="book_authore_name" class="form-control"  placeholder="Author Name" required="" value="<?= $row['book_authore_name'] ?>">
                    </div>
                    <?php if (isset($errors['book_authore_name'])) {
                        echo '<span class="input-error">'.$errors['book_authore_name'].'</span>';
                    } ?>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Publication Name</label>
                    <div class="col-sm-10">
                        <input type="text"  name="book_publication_name" class="form-control"  placeholder="Publication Name" required="" value="<?= $row['book_publication_name'] ?>">
                    </div>
                    <?php if (isset($errors['book_publication_name'])) {
                        echo '<span class="input-error">'.$errors['book_publication_name'].'</span>';
                    } ?>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Book Price</label>
                    <div class="col-sm-10">
                        <input type="text"  name="book_price" class="form-control"  placeholder="Book Price" required="" value="<?= $row['book_price'] ?>">
                    </div>
                    <?php if (isset($errors['book_price'])) {
                        echo '<span class="input-error">'.$errors['book_price'].'</span>';
                    } ?>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Book Qty</label>
                    <div class="col-sm-10">
                        <input type="number"  name="book_qty" class="form-control"  placeholder="Book Qty" required="" value="<?= $row['book_qty'] ?>">
                    </div>
                    <?php if (isset($errors['book_qty'])) {
                        echo '<span class="input-error">'.$errors['book_qty'].'</span>';
                    } ?>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Abilable Qty</label>
                    <div class="col-sm-10">
                        <input type="number"  name="abilable_qty" class="form-control"  placeholder="Abilable Qty" required="" value="<?= $row['abilable_qty'] ?>">
                    </div>
                    <?php if (isset($errors['abilable_qty'])) {
                        echo '<span class="input-error">'.$errors['abilable_qty'].'</span>';
                    } ?>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Purchase Date</label>
                    <div class="col-sm-10">
                        <input type="date" name="book_purchase_date" class="form-control"placeholder="Purchase Date" required="" value="<?= $row['book_purchase_date'] ?>">
                    </div>
                    <?php if (isset($errors['book_purchase_date'])) {
                        echo '<span class="input-error">'.$errors['book_purchase_date'].'</span>';
                    } ?>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Book Image</label>
                    <div class="col-sm-10">
                        <input type="file" name="book_image" class="form-control"placeholder="Book Image" >

                    </div>
                    <img src="../images/books/<?php echo $row['book_image'] ?>" style="width: 50px">

                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="update" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>
</div>
<?php }?>
<?php require_once 'footer.php'; ?>