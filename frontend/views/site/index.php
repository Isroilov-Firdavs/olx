<?php
$this->title = "E'lonlar doskasi";
use yii\helpers\Html;
?>
<header class="py-5">
<!-- Page Content-->
<div class="container px-4 px-lg-5">
    <!-- Heading Row-->
    <div class="row gx-4 gx-lg-5 align-items-center my-5">
        <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="../photos/banner.jpg" alt="Banner" /></div>
        <div class="col-lg-5">
            <h1 class="font-weight-light">O'z e'loningizni joylashtiring</h1>
            <p>Bu sayt orqali siz o'z e'lonlaringizni bepulga joylashtirib borishingiz
            mumkin bo'ladi. Istalgan kategoriyangizni tanlang va o'zingiz xohlagan
            e'loningizni joylashtiring</p>
            <a class="btn btn-secondary" href="/site/add">E'lon joylashtirish</a>
        </div>
    </div>
    <!-- Call to Action-->
    <div class="card text-white bg-success my-5 py-4 text-center">
        <div class="card-body"><p class="text-white m-0">Ushbu qidiruv bo'limi orqali siz o'zingiz qidirayotgan biror e'lonni qidirib topishingiz mumkin bo'ladi</p></div>
    </div>

    <div class="card  my-5 py-4 text-center">
        <div class="card-body">
            <form class="row g-3">
                <input type="text" class="form-control form-control-lg" id="search" placeholder="<?=$count;?> e'lonlar yoningizda">
              </div>
              <div class="col-auto">
                <button type="submit" id="search_index" class="btn btn-secondary btn-lg mb-3">Izlash</button>
              </div>
            </form>
        </div>
    </div>
</header>
<!-- Page Content-->
<section class="pt-4">
    <div class="container px-lg-5">
        <!-- Page Features-->
        <div class="row gx-lg-5">

                <div class="col-lg-6 col-xxl-4 mb-5">
                    <a href="/site/filter?id=1" class="category-poster">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"></div>
                            <h2 class="fs-4 fw-bold">Ko'chmas Mulk</h2>
                            <p class="mb-0">Ko'chmas mulk oldi sotdisi. Kvartiralar, uy sotib olish va sotish!</p>
                        </div>
                    </div>
                    </a>
                </div>
            <div class="col-lg-6 col-xxl-4 mb-5">
                <a href="/site/filter?id=2" class="category-poster">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"></div>
                            <h2 class="fs-4 fw-bold">Transport</span></h2>
                            <p class="mb-0">Avtomobil oldi sotdisi va ijarasi.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-xxl-4 mb-5">
                <a href="/site/filter?id=3" class="category-poster">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"></div>
                            <h2 class="fs-4 fw-bold">Elektrotexnika</h2>
                            <p class="mb-0">Turli gadjetlar va mobil qurilmalar oldi sotdisi.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-xxl-4 mb-5">
                <a href="/site/filter?id=4" class="category-poster">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"></div>
                            <h2 class="fs-4 fw-bold">Ish o'rinlari</h2>
                            <p class="mb-0">Turli ish o'rinlari haqidagi e'lonlar to'plami</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<div class="card text-white bg-primary my-5 py-4 text-center">
    <div class="card-body"><p class="text-white m-0 last-posters">Oxirgi joylangan e'lonlar</p></div>
</div>

<div class="container">
    <!-- Page Features-->
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <?foreach($posters as $post):?>
                    <div class="col-lg-3 mb-3">
                        <div class="card">
                            <a href="/site/one?id=<?=$post->id?>"><img src="../../images/<?=$post['image']?>" class="card-img-top img-poster" alt="<?=$post->title?>"></a>
                            <div class="card-body">
                            <div class="poster-title-cont">
                                <a href="/site/one?id=<?=$post->id?>" class="poster-link"><span class="card-title poster-title poster-link"><?=$post->title?></span></a>
                            </div> 
                            <p class="card-text" style="margin: 0"><?=$post->addres->c_name?></p>
                            <p class="card-text">- <?=$post->data?></p>
                            <h5 class="card-subtitle mb-2"><?=$post->price?> SO'M</h5>
                            </div>
                        </div>
                    </div>
                <?endforeach;?>
            </div>
                <div class="col-auto m-auto mt-3 mb-5 text-center">
                    <a href="/site/posters" class="btn btn-outline-secondary btn-lg mb-3">Barcha e'lonlar...</a>
                </div>
        </div>
    </div>
</div>