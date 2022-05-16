<?php
$db =  mysqli_connect('localhost','root','','test');
//
//mysqli_set_charset($db, "utf8mb4");


//$db =  mysqli_connect('31.186.53.200','Batieva_db','CiZTlVaNf7','Batieva_db');
mysqli_set_charset($db, "utf8mb4");
    $select = "SELECT * FROM msg order by id desc";
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
                                  <h2>Сообщения</h2>
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
                                 <table class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th>№</th>
                                        <th>Имя</th>
                                        <th>Почта</th>
                                        <th>Сообщение</th>
                
                                        <th>Действия</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sl = 1; 
                                            foreach ($query as $key => $value) {
                                                
                                                  ?>
                                                   <tr style="<?= $value['status']==1?'background: #E9ECEF':'background: #fff'; ?>">
                                                    <td><?= $sl++?></td>
                                                    <td><?= $value['name'] ?></td>
                                                    
                                                    <td><?= $value['email'] ?></td>
                                                    <td><?= substr($value['msg'],0,50).'[...]' ?></td>
                                                    <td>
                                        <a href="msg-read.php?id=<?= $value['id'] ?>" style="<?= $value['status']==1?'background:#DB574C;color:#fff;padding:5px;border-radius:3px':'background:#AAAEB4;color:#fff;padding:5px;border-radius:3px '; ?>"><?= $value['status']==1?'Непрочитанный':'Читать' ?></a>
                                              
                                        <a href="backend/msg-delete.php?id=<?=$value['id'] ?>"style="background:#FC324E;padding:5px;color:#fff;border-radius:2px;">Удалить</a>
                                        
                                            </td>
                                            
                                          </tr>
                                        <?php

                                        
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