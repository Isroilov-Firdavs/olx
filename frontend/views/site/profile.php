<div class="container mt-5 mtt">
  <div class="row">
    <div class="container mb-5">
      <div class="row">
        <div class="col-lg-4">
          <div class="card">
            <img src="../photos/noAvatar.png" style="height: 100%;" alt="">
          </div>
        </div>

        <?foreach($user as $u):?>
        <?$this->title = "Profile | $u->username";?>
        <div class="col-lg-8">
          <div class="row">
            <div class="card">
              <h3 class="poster-page-title">Foydalanuvchi haqida ma'lumot</h3>
              <h1 class="poster-page-amount mb-5"><?=$u->username?></h1>
              <h4>Qo'shimcha ma'lumotlar</h4>
              <hr>
              <div>
                <h5 class="">Username: <small class="text-primary"><?=$u->username?></small></h5>
                <h5 class="">Email: <small class="text-primary"><?=$u->email?></small></h5>
                <!-- <h5 class="">Telefon: <small class="text-primary">+998911234567</small></h5> -->

              </div>
              <hr>
              <div class="d-flex justify-content-between">
                <p>ID: <?=$u->created_at;?></p>
                <p>E'lonlar soni: 10</p>
              </div>
            </div>
          </div>
        </div>
        <?php
          if( ( Yii::$app->user->isGuest ) )
          {
            ?>
            <div class="alert alert-success mt-5" role="alert">
              <p>E'lon joylashtirish uchun avval ro'yxatdan o'ting</p>
            </div>
            <?

          }
          else if($u->username == Yii::$app->user->identity->username)
          {
              echo "<a href='/profile/change' class='btn mt-3 btn-success'>O'zgartirish</a>";
          }
        ?>

        <?endforeach;?>
      </div>
    </div>
  </div>
</div>

<div class="card text-white bg-primary my-5 py-4 text-center">
    <div class="card-body"><p class="text-white m-0 last-posters">Foydalanuvchining oxirgi e'lonlari</p></div>
</div>

<div class="container">
    <!-- Page Features-->
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <? foreach ($posters as $posters):?>
                    <div class="col-lg-3 mb-3">
                        <div class="card">
                            <a href="/site/one?id=<?=$posters->id?>"><img src="../../images/<?=$posters->image?>" class="card-img-top img-poster" alt=""></a>
                            <div class="card-body">
                            <div class="poster-title-cont">
                                <a href="/site/one?id=<?=$posters->id?>" class="poster-link"><span class="card-title poster-title poster-link"><?=$posters->title?></span></a>
                            </div>
                            <p class="card-text" style="margin: 0"><?=$posters->addres->c_name?> viloyati.</p>
                            <p class="card-text">- <?=$posters->data?></p>
                            <h5 class="card-subtitle mb-2"><?=$posters->price?> SO'M</h5>
                            </div>
                        </div>
                    </div>
                <?endforeach;?>
            </div>
        </div>
    </div>
</div>