<?php
//    require 'backend/db.php';

$db =  mysqli_connect('localhost','root','','test');
//
////$db =  mysqli_connect('31.186.53.200','Batieva_db','CiZTlVaNf7','Batieva_db');
//mysqli_set_charset($db, "utf8mb4");
//$db =  mysqli_connect('31.186.53.200','Batieva_db','CiZTlVaNf7','Batieva_db');
mysqli_set_charset($db, "utf8mb4");

$select_site="SELECT * FROM contact";
    $query_con = mysqli_query($db,$select_site);
    $contact = mysqli_fetch_assoc($query_con);

    //
    $sel_icon = "SELECT * FROM social_media";
    $social = mysqli_query($db,$sel_icon);
 ?>
<header>
            <div id="header-sticky" class="transparent-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-menu">
                                <nav class="navbar navbar-expand-lg">
                                    <a href="../index.php" class="navbar-brand logo-sticky-none"><img src="../assets/images/logo_sm.png" alt="Logo"></a>
                                    <a href="../index.php" class="navbar-brand s-logo-none"><img src="../assets/images/logo_sm.png" alt="Logo"></a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarNav">
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarNav">
                                        <ul class="navbar-nav ml-auto">
                                            <li class="nav-item active"><a class="nav-link" href="#home">главная</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#about">обо мне</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#service">навыки</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#portfolio">портфолио</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#contact">контакты</a></li>
                                        </ul>
                                    </div>
                                    <div class="header-btn">
                                        <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- offcanvas-start -->
            <div class="extra-info">
                <div class="close-icon menu-close">
                    <button>
                        <i class="far fa-window-close"></i>
                    </button>
                </div>
                <div class="side-info mb-30">
                    <div class="contact-list mb-30">
                        <h4>Адрес учебного заведения:</h4>
                        <p><?= $contact['address'] ?></p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Номер телефона:</h4>
                        <p><?= $contact['phone'] ?></p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Электронная почта:</h4>
                        <p><?= $contact['email'] ?></p>
                    </div>
                </div>
                <div class="social-icon-right mt-20">
                    <?php 
                    foreach ($social as $key => $value) {
                        ?>
                        <a href="<?= $value['link'] ?>"><i class="<?= $value['label'] ?>"></i></a>
                        <?php
                    }
                     ?>
                    

                </div>
            </div>
            <div class="offcanvas-overly"></div>
            <!-- offcanvas-end -->
        </header>