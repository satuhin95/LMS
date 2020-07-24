<?php require_once 'header.php'; ?>
<?php 
 if (isset($_POST['issue_book'])) {
     $student_id = $_POST['student_id'];
     $book_id = $_POST['book_id'];
     $book_issue_date = $_POST['book_issue_date'];

      $librarian_id = $_SESSION['librarian_id'];

     $sql = "INSERT INTO `issue_books`( `student_id`, `book_id`, `book_issue_date`,librarian_id) VALUES ('$student_id','$book_id','$book_issue_date','$librarian_id')";
                 $result = $db->query($sql);
                 
 }


?>
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">Issue Book</a></li>
        </ul>
    </div>
</div>
<div class="row animated fadeInUp">
    <div class="col-sm-6 col-sm-offset-3">
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-inline" method="post" action="<?= $_SERVER['PHP_SELF']?>">
                            <div class="form-group">
                                <select class="form-control" name="student_id">
                                    <option value="0">Select</option>
                                    <?php 
                                    $sql = "select * from students where status='1'";
                                    $result = $db->query($sql);
                                    while ($row = $result -> fetch_assoc()) {   ?>
                                        <option value="<?= $row['id'] ?>"><?= ucwords($row['name']). ' - ' . $row['roll']  ?></option>

                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="search" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php 
                if (isset($_POST['search'])) {
                   $id = $_POST['student_id'];
                   $sql = "select * from students where id='$id' and status='1'";
                   $result = $db->query($sql);
                   $row = $result->fetch_assoc(); ?>
                   <div class="panel">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
                                    <div class="form-group">
                                        <label>Student Name</label>
                                        <input type="text" class="form-control" value="<?= ucwords($row['name']) ?>" readonly>
                                        <input type="hidden" name="student_id" value="<?= $row['id'] ?>"  >
                                    </div>
                                    <div class="form-group">
                                        <label>Book Name</label>
                                        <select class="form-control" name="book_id">
                                            <option value="0">Select</option>
                                            <?php 
                                            $sql = "select * from books where abilable_qty > '0'";
                                            $result = $db->query($sql);
                                            while ($row = $result -> fetch_assoc()) {   ?>
                                                <option value="<?= $row['id'] ?>"><?= $row['book_name'] ?></option>

                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Book Issue Date</label>
                                        <input type="text" name="book_issue_date" value="<?= date('d-m-Y')?>" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="issue_book" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            <?php }     ?>
        </div>
    </div>
</div>

</div>
<?php require_once 'footer.php'; ?>