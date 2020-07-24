<?php require_once 'header.php'; ?>
<?php 

if (isset($_POST['save'])) {

    $book_name=$_POST['book_name'];
    $book_authore_name=$_POST['book_authore_name'];
    $book_publication_name=$_POST['book_publication_name'];
    $book_purchase_date=$_POST['book_purchase_date'];
    $book_price=$_POST['book_price'];
    $book_qty=$_POST['book_qty'];
    $abilable_qty=$_POST['abilable_qty'];

    $image = explode('.', $_FILES['book_image']['name']);
    $ext = end($image);
    $image = date('Ydmhis.').$ext;
    $librarian_name = $_SESSION['librarian_name'];
    $errors = array();
    if (empty($book_name)) {
     $errors['book_name']="Book Name filed is required";
 }
 if (empty($book_authore_name)) {
     $errors['book_authore_name']="Authore Name filed is required";
 }
 if (empty($book_publication_name)) {
     $errors['book_publication_name']="Publication Name filed is required";
 }
 if (empty($book_purchase_date)) {
     $errors['book_purchase_date']="Purchase Date filed is required";
 }
 if (empty($book_price)) {
     $errors['book_price']="Book Price filed is required";
 }
 if (empty($book_qty)) {
     $errors['book_qty']="Book Qty filed is required";
 }
 if (empty($abilable_qty)) {
     $errors['abilable_qty']="Abilable Book filed is required";
 }
 if (empty($image)) {
     $errors['image']="Book Image filed is required";
 }


 $sql = "INSERT INTO `books`(`book_name`, `book_image`, `book_authore_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `abilable_qty`, `librarian_name`) VALUES ('$book_name','$image','$book_authore_name','$book_publication_name','$book_purchase_date','$book_price','$book_qty','$abilable_qty','$librarian_name')";

 if ($db->query($sql) === TRUE) {
    move_uploaded_file($_FILES['book_image']['tmp_name'], '../images/books/'.$image);
    $success = "Add Book  Successfully!!";
} else {
  $error= $db->error;
}


}



?>
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">Add Book</a></li>
        </ul>
    </div>
</div>
<div class="row animated fadeInUp">
    <div class="col-sm-8 col-sm-offset-2">
        <h4 class="section-subtitle"><b>New</b> Book</h4>
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
                <form class="form-horizontal" method="post" action="<?= $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" >
                    <h5 class="mb-lg"></h5>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Book Name</label>
                        <div class="col-sm-10">
                            <input type="text"  name="book_name" class="form-control"  placeholder="Book Name" required="" value="<?= isset($book_name)?$book_name:'' ?>">
                        </div>
                        <?php if (isset($errors['book_name'])) {
                            echo '<span class="input-error">'.$errors['book_name'].'</span>';
                        } ?>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Author Name</label>
                        <div class="col-sm-10">
                            <input type="text"  name="book_authore_name" class="form-control"  placeholder="Author Name" required="" value="<?= isset($book_authore_name)?$book_authore_name:'' ?>">
                        </div>
                        <?php if (isset($errors['book_authore_name'])) {
                            echo '<span class="input-error">'.$errors['book_authore_name'].'</span>';
                        } ?>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Publication Name</label>
                        <div class="col-sm-10">
                            <input type="text"  name="book_publication_name" class="form-control"  placeholder="Publication Name" required="" value="<?= isset($book_publication_name)?$book_publication_name:'' ?>">
                        </div>
                        <?php if (isset($errors['book_publication_name'])) {
                            echo '<span class="input-error">'.$errors['book_publication_name'].'</span>';
                        } ?>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Book Price</label>
                        <div class="col-sm-10">
                            <input type="text"  name="book_price" class="form-control"  placeholder="Book Price" required="" value="<?= isset($book_price)?$book_price:'' ?>">
                        </div>
                        <?php if (isset($errors['book_price'])) {
                            echo '<span class="input-error">'.$errors['book_price'].'</span>';
                        } ?>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Book Qty</label>
                        <div class="col-sm-10">
                            <input type="number"  name="book_qty" class="form-control"  placeholder="Book Qty" required="" value="<?= isset($book_qty)?$book_qty:'' ?>">
                        </div>
                        <?php if (isset($errors['book_qty'])) {
                            echo '<span class="input-error">'.$errors['book_qty'].'</span>';
                        } ?>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Abilable Qty</label>
                        <div class="col-sm-10">
                            <input type="number"  name="abilable_qty" class="form-control"  placeholder="Abilable Qty" required="" value="<?= isset($abilable_qty)?$abilable_qty:'' ?>">
                        </div>
                        <?php if (isset($errors['abilable_qty'])) {
                            echo '<span class="input-error">'.$errors['abilable_qty'].'</span>';
                        } ?>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Purchase Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="book_purchase_date" class="form-control"placeholder="Purchase Date" required="" value="<?= isset($book_purchase_date)?$book_purchase_date:'' ?>">
                        </div>
                        <?php if (isset($errors['book_purchase_date'])) {
                            echo '<span class="input-error">'.$errors['book_purchase_date'].'</span>';
                        } ?>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Book Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="book_image" class="form-control"placeholder="Book Image" required="">
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="save" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

</div>
<?php require_once 'footer.php'; ?>