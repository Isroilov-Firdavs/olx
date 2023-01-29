<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\AuthAssignment $model */

$this->title = 'Create Auth Assignment';
$this->params['breadcrumbs'][] = ['label' => 'Auth Assignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-assignment-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
