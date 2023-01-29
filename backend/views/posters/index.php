<?php

use backend\models\Posters;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\PostersSerch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Posters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posters-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Posters', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'price',
            'category',
            'image',
            //'description:ntext',
            //'user_id',
            //'address',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Posters $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
