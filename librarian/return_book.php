<?php require_once 'header.php'; ?>
<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">Return Book</a></li>
        </ul>
    </div>
</div>
<div class="row animated fadeInUp">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b> Return Book</b></h4> 
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Roll</th>
                                <th>Phone</th>
                                <th>Book Name</th>
                                <th>Book Issue Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sql = "select i.id,i.book_issue_date,b.book_name,b.book_image,s.name,s.roll,s.phone from issue_books i INNER JOIN students s on s.id = i.student_id INNER JOIN books b on b.id = i.book_id WHERE i.book_return_date='' ";
                            $result = $db->query($sql);
                            while ($row = $result -> fetch_assoc()) {   ?>
                                <tr>
                                    <td><?= $row['id'];?></td>
                                    <td><?= ucwords($row['name']);?></td>
                                    <td><?= $row['roll'];?></td>
                                    <td><?= $row['phone'];?></td>
                                    <td><?= $row['book_name'];?></td>
                                    <td><?= $row['book_issue_date'];?></td>
                                    <td>
                                        <a class="btn btn-info" href="return_book.php?id=<?= $row['id'];?>">Return Book</a>
                                    </td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div >
</div>
<?php 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $date = date('d-m-Y');
    $sql = "UPDATE `issue_books` SET `book_return_date`='$date' WHERE id='$id' ";
    $result = $db->query($sql);
    if ($result) {
      if ($result) {?>
       <script type='text/javascript'>
        toastr.success('Book Return  Successfully..!');
        javascript.history.go(-1);
    </script>

    <?php
}

else{
    ?>
    <script type='text/javascript'>
        toastr.error('Book Return  Error..!');
        javascript.history.go(-1);
    </script>

    <?php

}
}
}
?>
<?php require_once 'footer.php'; ?>