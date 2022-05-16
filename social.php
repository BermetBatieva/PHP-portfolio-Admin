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
                                  <h2>Добавить социальную сеть</h2>
                                </div>
                                <form action="backend/social-add.php" method="post" enctype="multipart/form-data">
                                  <div class="form-group">
                                    <?php 
                                        if (isset($_SESSION['insert'])) {
                                            
                                            ?>
                                            <div class="alert alert-success alert-dismissible" style="margin-top:10px;">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true" style="font-size:20px">×</span>
                                                </button>
                                                <strong><?php echo $_SESSION['insert']; ?></strong>
                                            </div>
                                            <?php
                                            unset($_SESSION['insert']);
                                        }
                                     ?>
                                    <label for="label">Название</label>
                                    <input type="text" class="form-control err" placeholder="Введите название социальной сети" id="label" name="label">
                                    <!-- social media error -->
                                    <span style= "color:red; font-size:15px;margin-left:5px">
                                        <?php 
                                        if (isset($_SESSION['label_empty'])) {
                                            echo $_SESSION['label_empty'];?>
                                            <style>
                                                .err{border:1px solid red;}
                                            </style>
                                            <?php
                                            unset($_SESSION['label_empty']);
                                        }
                                     ?>
                                    </span>
                                     </div>
                                     <div class="form-group">
                                    <label for="link" class="">URL(ссылка)</label>
                                    <input type="text" class="form-control" id="link" placeholder="https://socialmedia.com" name="link">
                                  </div>
                                <div class="form-group text-center mt-3">
                                    <button type="submit" class="btn btn-primary btn-lg">Добавить в главный экран(баннер)</button>
                                </div>
                                  
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- container -->
            </div> <!-- content -->
         <?php include 'inc/copyright.php' ?>
        <?php include 'inc/footer.php' ?>