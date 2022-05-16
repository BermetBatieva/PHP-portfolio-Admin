<?php include 'inc/header.php';

$db =  mysqli_connect('localhost','root','','test');
//
//mysqli_set_charset($db, "utf8mb4");

//$db =  mysqli_connect('31.186.53.200','Batieva_db','CiZTlVaNf7','Batieva_db');
mysqli_set_charset($db, "utf8mb4");
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
                                  <h2>Добавить навыки</h2>
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
                                <form action="backend/services-add.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="heading" class="">Название</label>
                                    <input type="text" class="form-control <?php echo isset($_SESSION['name_err'])? 'err':'' ?>" id="heading" placeholder="Введите заголовок" name="heading">
                                    <!-- error showing -->
                                    <?php 
                                        if (isset($_SESSION['name_err'])) {
                                            ?>
                                            <span style='color:red;font-size:15px;margin-left:10px'>
                                                <?php echo $_SESSION['name_err']; ?>
                                            </span>
                                            <style>.err{border:1px solid red;}</style>
                                            <?php
                                            unset($_SESSION['name_err']);
                                        }
                                        
                                     ?>
                                  </div>
                                  <div class="form-group">
                                    <label for="desc">Описание</label>
                                    <textarea name="description" id="desc" class="form-control <?php echo isset($_SESSION['desc_err'])? 'err':'' ?>" placeholder="Напишите краткое описание о ваших навыках"></textarea>
                                    <!-- error showing -->
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
                                    <label for="icon">Добавить иконку</label>
                                    <input name="icon" id="icon" class="form-control <?php echo isset($_SESSION['icon_err'])? 'err':'' ?>"placeholder="название иконки"/>
                                    <!-- error showing -->
                                    <?php 
                                        if (isset($_SESSION['icon_err'])) {
                                            ?>
                                            <span style='color:red;font-size:15px;margin-left:10px'>
                                                <?php echo $_SESSION['icon_err']; ?>
                                            </span>
                                            <style>.err{border:1px solid red;}</style>
                                            <?php
                                            unset($_SESSION['icon_err']);
                                        }
                                     ?>
                                  </div>
                                <div class="form-group text-center mt-3">
                                    <button type="submit" class="btn btn-primary btn-lg">Добавить</button>
                                </div>
                                  
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- container -->
                

            </div> <!-- content -->
         <?php include 'inc/copyright.php' ?>
        <?php include 'inc/footer.php' ?>