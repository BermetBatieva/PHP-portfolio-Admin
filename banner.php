<?php
include 'inc/header.php';
 
 ?>
 <?php 
// $db =  mysqli_connect('31.186.53.200','Batieva_db','CiZTlVaNf7','Batieva_db');

 $db =  mysqli_connect('localhost','root','','test');
 mysqli_set_charset($db, "utf8mb4");

 $select = "SELECT * FROM banner";
 $query1 = mysqli_query($db,$select);
 $assoc = mysqli_fetch_assoc($query1);
 $id = $assoc['id'];

 $sel = "SELECT * FROM banner  WHERE id='$id'";
 $query2 = mysqli_query($db,$sel);
 $value = mysqli_fetch_assoc($query2);
    
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
                                  <h2>Изменить главный экран</h2>
                                </div>
                                <?php 
                                        if (isset($_SESSION['success'])) {
                                            
                                            ?>
                                            <div class="alert alert-success alert-dismissible" style="margin-top:10px;">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true" style="font-size:20px">×</span>
                                                </button>
                                                <strong><?php echo $_SESSION['success']; ?></strong>
                                            </div>
                                            <?php
                                            unset($_SESSION['success']);
                                        }
                                     ?>
                                <form action="backend/banner-add.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" value="<?php echo $value['id'] ?>" name="id">
                                  <div class="form-group">
                                    <label for="title1">Название 1</label>
                                    <input type="text" class="form-control err"  id="title1" name="title1" value="<?= $value['title1'] ?>">
                                <!-- Title 1 error showing -->
                                  
                                    <?php 
                                        if (isset($_SESSION['empty_title1'])) {
                                            ?>
                                            <span style='color:red;font-size:15px;margin-left:10px'>
                                                <?php echo $_SESSION['empty_title1']; ?>
                                            </span>
                                            <style>.err{border:1px solid red;}</style>
                                            <?php
                                            unset($_SESSION['empty_title1']);
                                        }
                                        if (isset($_SESSION['title1_err'])) {
                                            ?>
                                            <span style='color:red;font-size:15px;margin-left:10px'>
                                                <?php echo $_SESSION['title1_err']; ?>
                                            </span>
                                            <style>.err{border:1px solid red;}</style>
                                            <?php
                                            unset($_SESSION['title1_err']);
                                        }
                                     ?>
                                  </div>
                                  
                                  <div class="form-group">
                                    <label for="title2">Название 2</label>
                                    <input type="text" class="form-control err"  id="title2" name="title2" value="<?= $value['title2'] ?>">
                                    <!-- title2 error showing -->
                                    <?php 
                                        if (isset($_SESSION['empty_title2'])) {
                                            ?>
                                            <span style='color:red;font-size:15px;margin-left:10px'>
                                                <?php echo $_SESSION['empty_title2']; ?>
                                            </span>
                                            <style>.err{border:1px solid red;}</style>
                                            <?php
                                            unset($_SESSION['empty_title2']);
                                        }
                                        if (isset($_SESSION['title2_err'])) {
                                            ?>
                                            <span style='color:red;font-size:15px;margin-left:10px'>
                                                <?php echo $_SESSION['title2_err']; ?>
                                            </span>
                                            <style>.err{border:1px solid red;}</style>
                                            <?php
                                            unset($_SESSION['title2_err']);
                                        }
                                     ?>
                                  </div>
                                  <div class="form-group">
                                    <label for="description">Описание</label>
                                  
                                  <textarea name="description" id="description" class="form-control"><?= $value['description']?></textarea>
                                  <!-- description error showing here -->
                                  <?php 
                                    if (isset($_SESSION['desc_err'])) {
                                            ?>
                                            <span style='color:red;font-size:15px;margin-left:10px'>
                                                <?php echo $_SESSION['desc_err']; ?>
                                            </span>
                                            <style>.err{border:1px solid red;}</style>
                                            <?php
                                            unset($_SESSION['desc_err']);
                                        }
                                   ?>
                                  </div>
                                  <div class="form-group">
                                      <label for="banner-img">Фото</label><br>
                                      <img src="img/banner/<?= $value['image']?>" alt="img" width="150px"height="150px">
                                      <input type="file" class="" style="border:none;" name="image" value="<?php echo $value['image']?>"><br>
                                      <?php 
                                         if (isset($_SESSION['empty_image'])) {
                                            ?>
                                            <span style='color:red;font-size:15px;margin-left:10px'>
                                                <?php echo $_SESSION['empty_image']; ?>
                                            </span>
                                            <style>.err{border:1px solid red;}</style>
                                            <?php
                                            unset($_SESSION['empty_image']);
                                        }
                                        if (isset($_SESSION['img_err'])) {
                                            ?>
                                            <span style='color:red;font-size:15px;margin-left:10px'>
                                                <?php echo $_SESSION['img_err']; ?>
                                            </span>
                                            <style>.err{border:1px solid red;}</style>
                                            <?php
                                            unset($_SESSION['img_err']);
                                        }
                                       ?>
                                  </div>
                                <div class="form-group text-center mt-3">
                                    <button type="submit" class="btn btn-primary btn-lg">Сохранить</button>
                                </div>
                                  
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- container -->
            </div> <!-- content -->
         <?php include 'inc/copyright.php' ?>
        <?php include 'inc/footer.php' ?>
