<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Signup';
?>
<div class="container mtt">
          <div class="row">
            <div class="col-lg-8 offset-lg-2">
              <div class="card p-4 mb-5">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                        <?= $form->field($model, 'email') ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>

                        <div class="form-group">
                            <?= Html::submitButton('Signup', ['class' => 'btn btn-success form-control', 'name' => 'signup-button']) ?>
                        </div>

                    <?php ActiveForm::end(); ?>
              </div>
            </div>
          </div>
        </div>