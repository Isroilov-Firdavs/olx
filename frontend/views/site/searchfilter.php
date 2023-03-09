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
            <div class="col-lg-10 offset-lg-1">
              <div class="card">
                <div class="card-body">
                  <input type="text" id="search" class="form-control mb-3" placeholder="Nima qidiryapsiz?">
                  <button type="submit" id="search_index" class="btn btn-success text-center mb-3">Izlash</button>
                </div>
              </div>
            </div>
          </div>
          <h3>Filtrlash</h3>
          <div class="search-filter">
            <div class="search-item m-2">
              <label for="category" class="form-label">Kategoriya</label>
              <select class="form-select mx-2" id="category" aria-label="Default select example">
                <option value="0">Kategoriyani tanlang</option>
                <option value="1">Ko'chmas mulk</option>
                <option value="2">Transport</option>
                <option value="3">Elektronika</option>
                <option value="4">Ish o'rinlari</option>
              </select>
            </div>
            <div class="search-item m-2">
              <label for="amount" class="form-label">Narxi</label>
              <div class="input-group">
                <input type="number" id="amount_from" value="0" class="form-control price-input-filter mx-2" placeholder="dan">
                <input type="number" id="amount_to" value="0" class="form-control price-input-filter mx-2" placeholder="gacha">
              </div>
            </div>
            <div class="search-item m-2">
              <label for="region" class="form-label">Hudud</label>
              <select class="form-select" id="region" aria-label="Default select example">
                <option value="0">Hududni tanlang</option>
                <option value="1">Toshkent</option>
                <option value="2">Namangan</option>
                <option value="3">Farg'ona</option>
                <option value="4">Andijon</option>
                <option value="5">Sirdayyo</option>
                <option value="6">Jizzax</option>
                <option value="7">Qashqadaryo</option>
                <option value="8">Suxxandaryo</option>
                <option value="9">Navoiy</option>
                <option value="10">Xorazim</option>
                <option value="11">Qoraqalpog'iston</option>
                <option value="12">Samarqand</option>
                <option value="13">Buxoro</option>
              </select>
            </div>
          </div>
          <div class="col-auto">
          <button type="submit" id="search_page" class="btn btn-success btn-lg mb-3">Izlash</button>
        </div>
      </form>
    </div>
  </div>
  <hr>
</div>

<div class="container mb-3">
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


<?php
  if ( $model ){
    ?>
    <div class="container">
    <!-- Page Features-->
    <div class="row">
      <div class="col-lg-10 offset-lg-1">
          <div class="row">
            <?foreach ($model as $post):?>
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
    <?php
  }
  else
  {
    ?>
    <div class="row">
      <div class="col-lg-10 offset-lg-1">
        <div class="alert alert-danger">Hech narsa topilmadi</div>
      </div>
    </div>
    <?php
  }
?>