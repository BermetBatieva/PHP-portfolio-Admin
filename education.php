<?php include 'inc/header.php';


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
                                  <h2>Добавить образование</h2>
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
                                <form action="backend/education-add.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="degree" class="">Сертификация в </label>
                                    <input type="text" class="form-control <?php echo isset($_SESSION['name_err'])? 'err':'' ?>" id="degree" placeholder="Введите название" name="cir_name">
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
                                        <input type="text" class="form-control <?php echo isset($_SESSION['year_empty'])? 'err':'' ?>" id="year" placeholder="Год окончания" name="year">
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
                                        <label for="year" class="">Результат(%)</label>
                                        <input type="number" class="form-control <?php echo isset($_SESSION['result_empty'])? 'err':'' ?>" id="year" placeholder="Результат" min="10" max="100" name="result">
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