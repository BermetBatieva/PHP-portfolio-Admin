<?php 

$db =  mysqli_connect('localhost','root','','test');
//mysqli_set_charset($db, "utf8mb4");
//$db =  mysqli_connect('31.186.53.200','Batieva_db','CiZTlVaNf7','Batieva_db');
mysqli_set_charset($db, "utf8mb4");
 	$select = "SELECT * FROM portfolio";
    $query = mysqli_query($db,$select);
  
    
 
  ?>
<section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>Мои проекты</span>
                                <h2>Мои лучшие работы</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
						<?php 
							foreach ($query as $key => $value) {
								?>
								<div class="col-lg-4 col-md-6 pitem">
		                            <div class="speaker-box">
										<div class="speaker-thumb">
											<img src="img/portfolio/<?= $value['img']?>" alt="img">
										</div>
										<div class="speaker-overlay">
											<span><?= $value['catagory']?></span>
											<h4><a href=frontend/portfolio-single.php?id=<?=$value['id']?>"<?= $value['heading']?></a></h4>
											<a href="frontend/portfolio-single.php?id=<?=$value['id'] ?>" class="arrow-btn">Больше.. <span></span></a>
										</div>
									</div>
		                        </div>
								<?php
							}
						 ?>
					  </div>
                </div>
            </section>