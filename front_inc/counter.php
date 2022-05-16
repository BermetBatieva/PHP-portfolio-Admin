<?php 


$db =  mysqli_connect('localhost','root','','test');
//$db =  mysqli_connect('31.186.53.200','Batieva_db','CiZTlVaNf7','Batieva_db');

mysqli_set_charset($db, "utf8mb4");
    $sel_service = "SELECT COUNT(*) as total_service from services";
    $services_q = mysqli_query($db,$sel_service);
    $assoc_ser = mysqli_fetch_assoc($services_q);

    //selecting from portfolio
    $sel_pro = "SELECT COUNT(*) as total_pro from portfolio";
    $services_p = mysqli_query($db,$sel_pro);
    $assoc_pro = mysqli_fetch_assoc($services_p);
 ?>
<section class="fact-area">
                <div class="container">
                    <div class="fact-wrap">
                        <div class="row justify-content-between">
                            <div class="col-xl-2 col-lg-3 col-sm-6">
                                <div class="fact-box text-center mb-50">
                                    <div class="fact-icon">
                                        <i class="flaticon-award"></i>
                                    </div>
                                    <div class="fact-content">
                                        <h2><span class="count"><?=$assoc_ser['total_service']?></span></h2>
                                        <span>Используемые продукты</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-sm-6">
                                <div class="fact-box text-center mb-50">
                                    <div class="fact-icon">
                                        <i class="flaticon-like"></i>
                                    </div>
                                    <div class="fact-content">
                                        <h2><span class="count">345</span></h2>
                                        <span> Успешные проекты</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-sm-6">
                                <div class="fact-box text-center mb-50">
                                    <div class="fact-icon">
                                        <i class="flaticon-event"></i>
                                    </div>
                                    <div class="fact-content">
                                        <h2><span class="count"><?=$assoc_ser['total_service']?></span></h2>
                                        <span>Навыки</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-sm-6">
                                <div class="fact-box text-center mb-50">
                                    <div class="fact-icon">
                                        <i class="flaticon-woman"></i>
                                    </div>
                                    <div class="fact-content">
                                        <h2><span class="count">3</span>k</h2>
                                        <span>Подписчики</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>