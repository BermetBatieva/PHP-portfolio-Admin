<?php include 'inc/header.php';
 
 ?>
 <?php
 $db =  mysqli_connect('localhost','root','','test');
// $db =  mysqli_connect('31.186.53.200','Batieva_db','CiZTlVaNf7','Batieva_db');
 mysqli_set_charset($db, "utf8mb4");
 $id = $_GET['id'];
    $select = "SELECT * FROM msg where id='$id'";
    $query = mysqli_query($db,$select);
    $assoc = mysqli_fetch_assoc($query);

    $update = "UPDATE msg SET status=2 where id = '$id'";
    $q = mysqli_query($db,$update);
    
  ?>
        <!-- ========== Left Sidebar Start ========== -->
      <?php include 'sidebar.php' ?>
        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
            <!-- Top Bar start -->
    <?php include 'topbar.php' ?>
            <!-- Top Bar End -->
            <!-- Start Page content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <div class="jumbotron text-center">
                                  <h2>Сообщение от юзера</h2>
                                </div>
                               <div class="card ml-5">
                                <p><?= $assoc['msg']?></p><br>
                                <strong>-->From</strong>
                                <strong style='font-style: italic'><?=$assoc['name']?></strong>
                                <strong style='font-style: italic'><?=$assoc['email']?></strong>
                               </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- container -->
            </div> <!-- content -->
         <?php include 'inc/copyright.php' ?>
        <?php include 'inc/footer.php' ?>
