 <?php
// $db =  mysqli_connect('31.186.53.200','Batieva_db','CiZTlVaNf7','Batieva_db');

 $db =  mysqli_connect('localhost','root','','test');
// mysqli_set_charset($db, "utf8mb4");
 mysqli_set_charset($db, "utf8mb4");
 $sel = "SELECT * FROM review";
    $query = mysqli_query($db,$sel);
?>       
            <section class="testimonial-area primary-bg pt-115 pb-115">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>Цитаты</span>
                                <h2>Мои любимые цитаты</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10">
                            <div class="testimonial-active">
                                <?php 
                                    foreach ($query as $key => $value) {
                                        if($value['status']==2){?>
                                         <div class="single-testimonial text-center">
                                            <div class="testi-avatar">
                                                <img src="img/user/<?= $value['img']?>" alt="img" width="150px" height="150px" style="border-radius:50%">
                                            </div>
                                            <div class="testi-content text-center">
                                                <h4><span>“</span><?= $value['review'] ?><span>”</span><br><br><span style="font-size: 15px;color:#fff">Оценка</span><br>
                                                <?php 
                                                    $star = $value['rating'];
                                                    if($star <=5) {
                                                        for ($i=0; $i <$star ; $i++) { 
                                                            ?>
                                                            <i class="fas fa-star" style="color:yellow"></i>
                                                            <?php
                                                        }
                                                    }
                                                 ?>
                                             </h4>

                                                <div class="testi-avatar-info">
                                                    <h5><?= $value['name'] ?></h5>
                                                    <span><?= $value['user_status'] ?></span>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                }
                                    }
                                 ?>                               
                            </div>
                        </div>
                    </div>


                </div>
            </section>
