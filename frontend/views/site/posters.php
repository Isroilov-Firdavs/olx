<?php
use yii\helpers\Url;

$this->title = "E'lonlar"
?>
<!-- Header-->
<div class="container mt-5">
  <div class="card my-5 py-4 text-center border-0">
    <div class="card-body">
      <form class="row g-3"> 
        <div class="row">
          <div class="col-lg-8">
            <label for="search" class="visually-hidden">Qidiruv</label>
            <input type="text" class="form-control form-control-lg" id="search" placeholder="Nima qidiryapsiz?"></div>
          <div class="col-lg-4">
          <button type="submit" id="search_page" class="btn btn-primary btn-lg mb-3">Izlash</button></div>
        </div>
        </div>
      </form>
    </div>
  </div>
  <hr>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <div class="category_filter">
        <a href="/site/filter?id=1">Ko'chmas mulk <span class="css_count"><?=$count_real_estate;?></span></a>
        <a href="/site/filter?id=2">Transport <span class="css_count"><?=$transport;?></span></a>
        <a href="/site/filter?id=3">Elektronika <span class="css_count"><?=$electronics;?></span></a>
        <a href="/site/filter?id=4">Ish o'rinlari <span class="css_count"><?=$jobs;?></span></a>
      </div>
    </div>
  </div>
</div>

<div class="container">
    <!-- Page Features-->
    <div class="row">
      <div class="col-lg-10 offset-lg-1">
          <div class="row">
            <?foreach ($posters as $post):?>
              <div class="card mb-3">
                <div class="row g-0">
                  <div class="col-md-3">
                    <a href="/site/one?id=<?=$post->id?>" class="poster-link"><img src="../../images/<?=$post->image?>" class="img-fluid rounded-start img-board" width='100px' alt="<?=$post->title?>"></a>
                  </div>
                  <div class="col-md-9">
                    <div class="card-body flex-poster-body">
                      <div class="flex-poster-title">
                        <div class="title-item-one"><a href="/site/one?id=<?=$post->id?>" class="poster-link">
                          <span class="card-title poster-title poster-link poster-flexible"><?=$post->title?></span>
                        </a></div>
                        <h5 class="title-item-two"><?=$post->price?> SO'M</h5>
                      </div>
                      <div><p class="card-text"><small class="text-muted"><?=$post->addres->c_name?>  - <?=$post->data?> 16:45</small></p></div>
                    </div>
                  </div>
                </div>
              </div>
            <?endforeach;?>
            <?php
                  echo \yii\bootstrap5\LinkPager::widget(
              [
              'pagination' => $sahifa,

              ])
            ?>
          </div>
      </div>
    </div>
</div>