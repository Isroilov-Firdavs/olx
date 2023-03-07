<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use kartik\select2\Select2;
use frontend\models\Category;
use frontend\models\Country;
use yii\helpers\ArrayHelper;


use kartik\editors\Summernote;
use kartik\money\MaskMoney;

/** @var yii\web\View $this */
/** @var frontend\models\Posters $model */
/** @var ActiveForm $form */

$this->title = "E'lon qo'shish";
?>
<div class="site-add">

    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div id="loader">
                
            </div>
        </div>
    </div>

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-6">
        <?= $form->field($model, 'title')->textInput(['id' => 'title']) ?>
        </div>
        <div class="col-lg-6">
        <?php // $form->field($model, 'price')?>
        <?=$form->field($model, 'price', )->textInput(['id' => '444444'])->widget(MaskMoney::classname(), [
            'name' => 'amount_rounded_1',
            'value' => 1000,
            'pluginOptions' => [
            'prefix' => '$ ',
            // 'suffix' => ' €',
            'precision' => 0
        ]
        ])?>
        </div>
        <div class="col-lg-6">
        <?php //$form->field($model, 'category') ?>
        <?=
            $form->field($model, 'category')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Category::find()->all(), 'id', 'category_name'),
            'language' => 'de',
            'options' => ['placeholder' => "Bo'limni tanglang"],
            'pluginOptions' => [
                'allowClear' => true
            ],
            ]);
            ?>
        </div>
        <div class="col-lg-6">
        <?= $form->field($model, 'image')->fileInput() ?>
        </div>
    </div>
        <?php // $form->field($model, 'address') ?>
        <?=
            $form->field($model, 'address')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Country::find()->all(), 'id', 'c_name'),
            'language' => 'de',
            'options' => ['placeholder' => "Hududni tanglang"],
            'pluginOptions' => [
                'allowClear' => true
            ],
            ]);
            ?>

        <?php // $form->field($model, 'description') ?>
        <?php // Usage with model & active form including model validation
            echo $form->field($model, 'description')->widget(Summernote::class, [
                'useKrajeePresets' => true,
                // other widget settings
            ]);
                ?>
        <?php // $form->field($model, 'user_id') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'id'=> 'add_btn']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-add -->
