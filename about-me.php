<?php
include 'inc/header.php';

$db =  mysqli_connect('localhost','root','','test');

//$db =  mysqli_connect('31.186.53.200','Batieva_db','CiZTlVaNf7','Batieva_db');
mysqli_set_charset($db, "utf8mb4");
?>
<?php
$select = "SELECT * FROM about_me";
$query1 = mysqli_query($db,$select);
$assoc = mysqli_fetch_assoc($query1);
$id = $assoc['id'];

$sel = "SELECT * FROM about_me  WHERE id='$id'";
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
                                  <h2>Обо мне</h2>
                                </div>
                                 <?php 
                                        if (isset($_SESSION['update'])) {
                                            
                                            ?>
                                            <div class="alert alert-success alert-dismissible" style="margin-top:10px;">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true" style="font-size:20px">×</span>
                                                </button>
                                                <strong><?php echo $_SESSION['update']; ?></strong>
                                            </div>
                                            <?php
                                            unset($_SESSION['update']);
                                        }
                                     ?>
                                      <?php 
                                        if (isset($_SESSION['empty'])) {
                                            
                                            ?>
                                            <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true" style="font-size:20px">×</span>
                                                </button>
                                                <strong><?php echo $_SESSION['empty']; ?></strong>
                                            </div>
                                            <?php
                                            unset($_SESSION['empty']);
                                        }
                                     ?>
                                <form action="backend/about-me-add.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" value="<?php echo $value['id'] ?>" name="id">

                                    <div class="form-group">
                                    <label for="title" class="">Название</label>
                                    <input type="text" class="form-control err" id="link" name="title" value="<?= $value['title'] ?>">
                                    <!-- error showing -->
                                    <?php 
                                        if (isset($_SESSION['empty_title'])) {
                                            ?>
                                            <span style='color:red;font-size:15px;margin-left:10px'>
                                                <?php echo $_SESSION['empty_title']; ?>
                                            </span>
                                            <style>.err{border:1px solid red;}</style>
                                            <?php
                                            unset($_SESSION['empty_title']);
                                        }
                                        if (isset($_SESSION['title_err'])) {
                                            ?>
                                            <span style='color:red;font-size:15px;margin-left:10px'>
                                                <?php echo $_SESSION['title_err']; ?>
                                            </span>
                                            <style>.err{border:1px solid red;}</style>
                                            <?php
                                            unset($_SESSION['title_err']);
                                        }
                                     ?>
                                  </div>
                                  <div class="form-group">
                                    <label for="description" class="">О себе</label>
                                      <textarea name="description" id="description" class="form-control err"><?=$value['description']?></textarea>
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
                                    <button type="submit" class="btn btn-primary btn-lg">Изменить</button>
                                </div>
                                  
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- content -->
         <?php include 'inc/copyright.php' ?>
        <?php include 'inc/footer.php'
?>

