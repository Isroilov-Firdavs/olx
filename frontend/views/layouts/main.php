<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
    <body>
    	<?php $this->beginBody() ?>
        <!-- Responsive navbar-->
        <header>
    <?php
    NavBar::begin([
        'brandLabel' => "E'lonlar doskasi",
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    if (!Yii::$app->user->isGuest)
    {
    $menuItems = [
        ['label' => "Mening e'lonlarim", 'url' => ['/site/profile', 'id'=>Yii::$app->user->id]],
        ['label' => "E'lon qo'shish", 'url' => ['/site/add']],
        // ['label' => "Posters", 'url' => ['/site/posters']],
    ];
    }
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => "Registratsiya", 'url' => ['/site/signup']];
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
        'items' => $menuItems,
    ]);

    if (Yii::$app->user->isGuest) {
        echo Html::tag('div',Html::a('Login',['/site/login'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
    } else {
        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
            . Html::submitButton(
                'Chiqish (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout text-decoration-none']
            )
            . Html::endForm();
    }
    NavBar::end();
    ?>
</header>

        <!-- Header-->
        <main role="main" class="flex-shrink-0">
		    <div class="container">
                 <div class="row">
                    <div id="main_error" class="col-lg-6 offset-lg-3">
                    </div>
                </div>
		        <?= Breadcrumbs::widget([
		            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
		        ]) ?>
		        <?= Alert::widget() ?>
		        <?= $content ?>
		    </div>
		</main>


        <!-- Footer-->
        <footer class="footer mt-auto py-3 text-muted">
            <div class="container">
                <p class="float-start">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
            </div>
        </footer>
        <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
