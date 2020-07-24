<?php require_once 'header.php'; ?>
                <!-- content HEADER -->
                <!-- ========================================================= -->
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
                    <h4 class="section-subtitle"><b> Issue Book</b></h4>   
                        <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Book Name</th>
                                        <th>Book Image</th>
                                        <th>Book Issue Date</th>
                                   
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $id = $_SESSION['student_id'];
                                            $sql = "select book_id,student_id,book_issue_date ,book_name,book_image from issue_books ,books where issue_books.student_id = '$id' and issue_books.book_id=books.id";
                                            $result = $db->query($sql);
                                            while ($row = $result -> fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?= $row['book_name']?></td>
                                                <td>
                                                    <img src="../images/books/<?= $row['book_image']?>" style="width: 100px">
                                                </td>
                                                <td><?= date('d-M-y',strtotime($row['book_issue_date'])) ?></td>
                                            </tr>

                                    <?php }?>
                             
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
       
                </div>
<?php require_once 'footer.php'; ?>