<?php require_once 'header.php'; ?>
<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
        </ul>
    </div>
</div>
<div class="row animated fadeInUp">
    <div class="col-sm-12">

        <div class="row">
            <!--Total Books -->
               <?php 
            $sql = "select sum(book_qty) totalbook   from books  ";
            $result = $db->query($sql);
            $books = $result->fetch_assoc();
             $dd = $db->query("select count(id) total  from books ");
             $book = $dd->fetch_assoc();


            ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel widgetbox wbox-1 bg-darker-1">
                    <a href="manage_book.php">
                        <div class="panel-content">
                            <h1 class="title color-w"><i class="fa fa-book"></i> Books </h1>
                            <h4 class="subtitle color-lighter-1"><?= $book['total'].' ('.$books['totalbook'] .')' ?></h4>
                        </div>
                    </a>
                </div>
            </div>
          
            <!--Students part -->
            <?php 
            $sql = "select count(id)  totalstudent from students  ";
            $result = $db->query($sql);
            $std = $result->fetch_assoc();


            ?>

            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                    <a href="students.php">
                        <div class="panel-content">
                            <h1 class="title color-darker-2"> <i class="fa fa-users"></i> <?= $std['totalstudent'] ?></h1>
                            <h4 class="subtitle color-darker-1">Totla Students</h4>
                        </div>
                    </a>
                </div>
            </div>
              <!--issue books 1-->
              <?php 
            $sql = "select count(id)  issuebook from issue_books  ";
            $result = $db->query($sql);
            $issue = $result->fetch_assoc();


            ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel widgetbox wbox-1 bg-darker-2 color-light">
                    <a href="issue_book.php">
                        <div class="panel-content">
                            <h1 class="title color-light-1"> <i class="fa fa-book"></i> <?= $issue['issuebook'] ?> </h1>
                            <h4 class="subtitle">Total Issue Book</h4>
                        </div>
                    </a>
                </div>
            </div>
            <!--Librarian-->
               <?php 
            $sql = "select *   from librarian  ";
            $result = $db->query($sql);
            $totallibrarian = mysqli_num_rows($result);


            ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel widgetbox wbox-1 bg-light color-darker-2">
                    <a href="#">
                        <div class="panel-content">
                            <h1 class="title color-darker-2"><i class="fa fa-user"></i><?= $totallibrarian; ?>  </h1>
                            <h4 class="subtitle">Librarian</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
<?php require_once 'footer.php'; ?>