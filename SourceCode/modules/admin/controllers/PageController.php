<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

class PageController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
