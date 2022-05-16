<?php

//$db =  mysqli_connect('31.186.53.200','Batieva_db','CiZTlVaNf7','Batieva_db');
$db =  mysqli_connect('localhost','root','','test');

mysqli_set_charset($db, "utf8mb4");

$select="SELECT * FROM contact";
$query = mysqli_query($db,$select);
    $assoc = mysqli_fetch_assoc($query);
 ?>
            <section id="contact" class="contact-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="section-title mb-20">
                                <span>information</span>
                                <h2>Контактная информация:</h2>
                            </div>
                            <div class="contact-content">
                                <p><?= $assoc['description'] ?></p>
                                <h5>Месторасположение: <span>Бишкек</span></h5>
                                <div class="contact-list">
                                    <ul>
                                        <li><i class="fas fa-map-marker"></i><span>Адрес :</span><?= $assoc['address'] ?></li>
                                        <li><i class="fas fa-headphones"></i><span>Номер телефона :</span><?=$assoc['phone'] ?></li>
                                        <li><i class="fas fa-globe-asia"></i><span>Почта :</span><?= $assoc['email'] ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-form">
                                <form action="../backend/msg-us.php" method='post'>
                                    <?php 
                                        if (isset($_SESSION['msg'])) {
                                            echo $_SESSION['msg'];
                                            
                                        }
                                     ?>
                                    <input type="text" placeholder="ваше имя *" name="name" style="text-transform: capitalize">
                                    <input type="email" placeholder="Ваша почта *" name="email" style="text-transform: lowercase">
                                    <textarea name="msg" id="message" placeholder="Сообщение *" style="text-transform: default"></textarea>
                                    <button class="btn" type="submit">Отправить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
