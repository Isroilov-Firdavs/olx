<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

// Models
use backend\models\AuthItem;
use backend\models\User;


use kartik\select2\Select2;
use yii\helpers\ArrayHelper;


/** @var yii\web\View $this */
/** @var backend\models\AuthAssignment $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="auth-assignment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //$form->field($model, 'item_name')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'item_name')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(AuthItem::find()->all(), 'name', 'description'),
    'language' => 'de',
    'options' => ['placeholder' => "Bo'limni tanglang"],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]);
    ?>

    <?php // $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'user_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(User::find()->all(), 'id', 'username'),
    'language' => 'de',
    'options' => ['placeholder' => "Userni tanlang"],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
