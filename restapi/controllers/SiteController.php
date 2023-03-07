<?php
namespace restapi\controllers;

use yii\rest\Controller;

use frontend\models\Posters;

class SiteController extends Controller 
{
    public function actionIndex()
    {
        return Posters::find()->all();
    }
}
?>