<?php
$db =  mysqli_connect('localhost','root','','test');
//$db =  mysqli_connect('31.186.53.200','Batieva_db','CiZTlVaNf7','Batieva_db');
mysqli_set_charset($db, "utf8mb4");
    $select = "SELECT * FROM review";
    $query = mysqli_query($db,$select);
    
 ?>
<?php include 'inc/header.php';?>
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
                                  <h2>Цитаты</h2>
                                </div>
                                <?php 
                                   if (isset($_SESSION['delete'])) {
                                           ?>
                                            <div class="alert alert-success alert-dismissible" style="margin-top:10px;">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true" style="font-size:20px">×</span>
                                                </button>
                                                <strong><?php echo $_SESSION['delete']; ?></strong>
                                            </div>
                                            <?php
                                            unset($_SESSION['delete']);
                                        }
                                     ?>
                                 <table class="table table-striped table-hover">
                                    <thead>
                                      <tr>
                                        <th>№</th>
                                        <th>Фото</th>
                                        <th>Имя</th>
                                        <th>Статус</th>
                                        <th>Обзор</th>
                                        <th>Действия</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sl = 1; 
                                            foreach ($query as $key => $value) {
                                               if ($value['status']==1) {
                                                 ?>
                                                     <tr>
                                                    <td><?= $sl++?></td>
                                                    
                                                    <td><img src="img/user/<?= $value['img'] ?>" alt="img" width="80px" height="80px" style="border-radius:50%"></td>
                                                    <td><?= $value['name'] ?></td>
                                                    <td><?= $value['user_status'] ?></td>
                                                    <td><?= substr($value['review'],0,50).'[...]' ?></td>
                                                    <td>
                                        <a href="backend/edit-review.php?id=<?= $value['id'] ?>" style="background:#E98F2D;padding:5px;color:#fff;border-radius:2px">Изменить</a>
                                              
                                        <a href="backend/review-delete.php?id=<?=$value['id'] ?>" style="background:#FC324E;padding:5px;color:#fff;border-radius:2px;">Удалить</a>
                                        
                                            </td>
                                            
                                          </tr>

                                        <?php
                                         } else {
                                           ?>
                                                   <tr>
                                                    <td><?= $sl++?></td>
                                                    
                                                    <td><img src="img/user/<?= $value['img'] ?>" alt="img" width="80px" height="80px" style="border-radius:50%"></td>
                                                    <td><?= $value['name'] ?></td>
                                                    <td><?= $value['user_status'] ?></td>
                                                    <td><?= substr($value['review'],0,50).'[...]' ?></td>
                                                    <td>
<!--                                            <a href="backend/edit-review.php?id=--><?//= $value['id'] ?><!--" style="background:#AAAEB4;padding:5px;color:#fff;border-radius:2px">Изменить</a>-->
                                              
                                        <a href="backend/review-delete.php?id=<?=$value['id'] ?>" data-toggle="modal" data-target="#myModal" style="background:#FC324E;padding:5px;color:#fff;border-radius:2px;">Удалить</a>
                                                        <a href="backend/edit-review.php?id=<?= $value['id'] ?>" style="background:#E98F2D;padding:5px;color:#fff;border-radius:2px">Изменить</a>
                                                        <!-- The Modal -->
                                              <div class="modal fade" id="myModal">
                                                <div class="modal-dialog modal-dialog-centered">
                                                  <div class="modal-content">
                                                  
                                                    <!-- Modal Header -->
                                                    <div class="modal-header bg-dark text-light">
                                                      <h5 class="modal-title">Confirmation</h5>
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <div class="modal-body text-center">
                                                      <h4 class="text-danger">Вы действительно хотите <br>удалить?</h4>
                                                    </div>
                                                    
                                                    <!-- Modal footer -->
                                                    <div class="text-center m-3">
                                                      <a href="backend/review-delete.php?id=<?= $value['id'] ?>" class="btn btn-primary">Подтвердить</a>
                                                      <button type="button" class="btn btn-danger" data-dismiss="modal" href="">Закрыть</button>
                                                    </div>

<!--                                                      <a href="edit-portfolio.php?id=--><?//= $value['id'] ?><!--"><img src="img/writing.png" alt="" style="height:25px; margin:5px"></a>-->
<!---->
<!--                                                      <a href="backend/portfolio-delete.php?id=--><?//= $value['id'] ?><!--"><img src="img/delete.png" alt="" style="height:25px; margin:5px"></i></a>-->
<!--                                                    -->
                                                  </div>
                                                </div>
                                              </div>

                                            </td>
                                            
                                          </tr>

                                           <?php
                                         }
                                               
                                    }
                                 ?>
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- container -->
            </div> <!-- content -->
         <?php include 'inc/copyright.php' ?>
        <?php include 'inc/footer.php' ?>