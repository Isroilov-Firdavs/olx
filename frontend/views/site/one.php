<div class="container">
  <div class="row">
    <?foreach ($model as $one):?>
    <div class="col-lg-8">
      <div class="container mb-5 mtt">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <img src="../../images/<?=$one->image?>" class="rounded mt-lg-3 mb-lg-3 img-fluid img-poster-page mx-auto d-block" alt="...">
            </div>
          </div>
        </div>
      </div>

      <div class="container mb-5">
          <div class="row">
            <div class="col-lg-12">
                <div class="row">
                  <div class="card">
                    <div class="mb-3"><p class="card-text"><small class="text-muted">Joylangan sana - <?=$one->data?></small></p></div>
                    <h3 class="poster-page-title"><?=$one->title?></h3>
                    <h1 class="poster-page-amount mb-5"><?=$one->price?> SO'M</h1>
                    <h5>Tavsif</h5>
                    <p><?=$one->description?></p>
                      <hr>
                      <div class="d-flex justify-content-between">
                        <p>ID: <?=$one->poster_id?></p>
                        <p>Ko'rildi: 1025</p>
                      </div>
                  </div>
                </div>
            </div>
          </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="container mb-5 mtt">
        <div class="row">
          <div class="card p-3">
            <h4 class="mb-5">Foydalanuvchi</h4>
            <div class="d-flex justify-content-between">
              <img 
                src="../photos/noAvatar.png"
                class="rounded-circle img-fluid" 
                alt="Cinque Terre"
                style="width: 100px; height: 100px">
              <div class="d-flex flex-column">
                <a href="#"><h5><?=$one->user->username;?></h5></a>
                <p>Saytda: 01.01.2021 dan beri</p>
                <p>E'lonlar soni: 20 ta</p>
              </div>
            </div>
            <a href="#" type="button" class="btn btn-outline-secondary">+998911234567</a>
            <a href="/site/profile?id=<?=$one->user_id?>" type="button" class="btn mt-3 btn-success">Muallifning boshqa e'lonlari</a>
          </div>
        </div>
      </div>
    </div>
    <?endforeach;?>
  </div>
</div>