<?php include 'inc/header.php';
    error_reporting(0);


$db =  mysqli_connect('localhost','root','','test');
//
//mysqli_set_charset($db, "utf8mb4");


//$db =  mysqli_connect('31.186.53.200','Batieva_db','CiZTlVaNf7','Batieva_db');
mysqli_set_charset($db, "utf8mb4");

$id = $_GET['id'];
    $sel = "SELECT * FROM education  WHERE id='$id'";
    $query = mysqli_query($db,$sel);
    $value = mysqli_fetch_assoc($query);
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
                                  <img src="img/portfolio.png" alt="edit" height="80px">
                                  <h2>Изменить образование</h2>
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
                                <form action="backend/update-education.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" value="<?= $value['id']?>" name="id">
                                <div class="form-group">
                                    <label for="degree" class="">Сертификация в</label>
                                    <input type="text" class="form-control <?php echo isset($_SESSION['name_err'])? 'err':'' ?>" id="degree" placeholder="Название" name="cir_name" value="<?= $value['name'] ?>">
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
                                  <div class="row">
                                      <div class="form-group col">
                                        <label for="year" class="">Год</label>
                                        <input type="text" class="form-control <?php echo isset($_SESSION['year_empty'])? 'err':'' ?>" id="year" placeholder="Год окончания" name="year" value="<?= $value['year']?>">
                                        <!-- error showing -->
                                         <?php 
                                        if (isset($_SESSION['year_empty'])) {
                                            ?>
                                            <span style='color:red;font-size:15px;margin-left:10px'>
                                                <?php echo $_SESSION['year_empty']; ?>
                                            </span>
                                            <style>.err{border:1px solid red;}</style>
                                            <?php
                                            unset($_SESSION['year_empty']);
                                        }
                                     ?>
                                      </div>
                                      <div class="form-group col">
                                        <label for="result" class="">Результат(%)</label>
                                        <input type="number" class="form-control <?php echo isset($_SESSION['result_empty'])? 'err':'' ?>" id="result" placeholder="Результат" min="10" max="100" name="result" value="<?= $value['result']?>">
                                        <!-- error showing -->
                                          <?php 
                                            if (isset($_SESSION['result_empty'])) {
                                                ?>
                                                <span style='color:red;font-size:15px;margin-left:10px'>
                                                    <?php echo $_SESSION['result_empty']; ?>
                                                </span>
                                                <style>.err{border:1px solid red;}</style>
                                                <?php
                                                unset($_SESSION['result_empty']);
                                            }
                                     ?>
                                      </div>
                                  
                                  </div>
                                <div class="form-group text-center mt-3">
                                    <button type="submit" class="btn btn-primary btn-lg">Изменить</button>
                                </div>
                                  
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- container -->
            </div> <!-- content -->
         <?php include 'inc/copyright.php' ?>
        <?php include 'inc/footer.php' ?>