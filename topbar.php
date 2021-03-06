     <div class="content-page">
            <!-- Top Bar Start -->
            <div class="topbar">
                <nav class="navbar-custom">
                    <ul class="list-unstyled topbar-right-menu float-right mb-0">
                        <li class="hide-phone app-search">
                            <form>
                                <label>
                                    <input type="text" placeholder="Поиск..." class="form-control">
                                </label>
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </li>
                 
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fi-speech-bubble noti-icon"></i>
                                <?php
                                    if ($unread['total_unread']!=0) {
                                        ?>
                                        <span class="badge badge-custom badge-pill noti-icon-badge"><?= $unread['total_unread'] ?></span>
                                        <?php
                                    }
                                 ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0"><span class="float-right"><a href="" class="text-dark"><small>Очистить</small></a> </span>Чат</h5>
                                </div>
                                <div class="slimscroll" style="max-height: 230px;">
                                    <!-- item-->
                                    <?php
                                    $db =  mysqli_connect('localhost','root','','test');

#                                    $db =  mysqli_connect('31.186.53.200','Batieva_db','CiZTlVaNf7','Batieva_db');
                                    mysqli_set_charset($db, "utf8mb4");
                                    $select_msg = "SELECT * FROM msg  order by id desc limit 3";
                                     $query_msg = mysqli_query($db,$select_msg);

                                        foreach ($query_msg as $key => $item) {
                                            ?>
                                    <a href="/msg-read.php?id=<?=$item['id']?>" class="dropdown-item notify-item" style="<?= $item['status']==1?'background:#E3EAEF':'background: #fff'; ?>">
                                        <div class="notify-icon"><img src="/assets/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">
                                        <?php
                                            echo $item['name'];
                                        ?>
                                            
                                        </p>
                                        <p class="text-muted font-13 mb-0 user-msg">
                                             <?php
                                                echo substr($item['msg'], 0,30);
                                            
                                            ?>
                                        </p>
                                    </a>
                                            <?php
                                        }
                                     ?>
                                    
                                  
                                </div>
                                <!-- All-->
                                <a href="view-msg.php" class="dropdown-item text-center text-primary notify-item notify-all">
                                    Просмотреть все <i class="fi-arrow-right"></i>
                                </a>
                            </div>
                        </li>
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                              <?php 
                                if (isset($_SESSION['img'])) {
                                    ?>
                                      <img src="img/user/<?php echo $_SESSION['img'] ?>" alt="user-img" title="Mat Helme" width="70px" height="70px"style="border-radius: 50%">
                                    <?php
                                }
                               ?>
                                 <span class="ml-1">
                                    <?php 
                                        if (isset($_SESSION['name'])) {
                                            echo $_SESSION['name'];
                                        }
                                     ?>
                                <i class="mdi mdi-chevron-down"></i> </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h6 class="text-overflow m-0">Добро пожаловать !</h6>
                                </div>
                                <!-- item-->
<!--                                <a href="myaccount.php" class="dropdown-item notify-item">-->
<!--                                    <i class="fi-head"></i> <span>Мой аккаунт</span>-->
<!--                                </a>-->
                                <!-- item-->
                                <!-- item-->
                                <a href="/backend/logout.php" class="dropdown-item notify-item">
                                    <i class="fi-power"></i> <span>Выход</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left disable-btn">
                                <i class="dripicons-menu"></i>
                            </button>
                        </li>
                        <li>
                            <div class="page-title-box">
                                <h4 class="page-title">Админ панель </h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Добро пожаловать, <?= $_SESSION['name'] ?>!</li>
                                </ol>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>