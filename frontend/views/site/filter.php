<?php
use yii\helpers\Url;

$this->title = "E'lonlar"
?>
<!-- Header-->
<div class="container mt-5">
  <div class="card my-5 py-4 text-center border-0">
    <div class="card-body">
      <form class="row g-3">
          <label for="search" class="visually-hidden">Qidiruv</label>
          <input type="text" class="form-control form-control-lg" id="search" placeholder="E'lonlar qidiruvi...">
          <h3>Filtrlash</h3>
          <div class="search-filter">
            <div class="search-item m-2">
              <label for="category" class="form-label">Kategoriya</label>
              <select class="form-select mx-2" id="category" aria-label="Default select example">
                <option selected>Kategoriyani tanlang</option>
                <option value="1">Ko'chmas mulk</option>
                <option value="2">Transport</option>
                <option value="3">Elektronika</option>
                <option value="4">Ish o'rinlari</option>
              </select>
            </div>
            <div class="search-item m-2">
              <label for="amount" class="form-label">Narxi</label>
              <div class="input-group">
                <input type="text" id="amount" class="form-control price-input-filter mx-2" placeholder="dan">
                <input type="text" id="amount" class="form-control price-input-filter mx-2" placeholder="gacha">
              </div>
            </div>
            <div class="search-item m-2">
              <label for="region" class="form-label">Hudud</label>
              <select class="form-select" id="region" aria-label="Default select example">
                <option selected>Hududni tanlang</option>
                <option value="Toshkent">Toshkent</option>
                <option value="Qarshi">Qarshi</option>
                <option value="Buxoro">Buxoro</option>
                <option value="Navoiy">Navoiy</option>
                <option value="Andijon">Andijon</option>
                <option value="Namangan">Namangan</option>
                <option value="Farg'ona">Farg'ona</option>
                <option value="Guliston">Guliston</option>
                <option value="Termiz">Termiz</option>
                <option value="Samarqand">Samarqand</option>
                <option value="Xorazm">Xorazm</option>
                <option value="Nukus">Nukus</option>
              </select>
            </div>
          </div>
          <div class="col-auto">
          <button type="submit" class="btn btn-primary btn-lg mb-3">Izlash</button>
        </div>
      </form>
    </div>
  </div>
  <hr>
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
              //     echo \yii\bootstrap5\LinkPager::widget(
              // [
              // 'pagination' => $sahifa,

              // ])
            ?>
          </div>
      </div>
    </div>
</div>
