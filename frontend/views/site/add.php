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
        <?=
        $form->field($model, 'price')->textInput(['type'=>'number'])
        ?>
        </div>
        <div class="col-lg-6">
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

        <?= $form->field($model, 'description')->textarea(['rows' => '5']) ?>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-success', 'id'=> 'add_btn']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>
