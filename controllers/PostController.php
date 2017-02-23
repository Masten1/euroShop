<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 08.12.2016
 * Time: 14:09
 */

namespace app\controllers;


class PostController extends AppController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionTest()
    {
        return $this->render('test');
    }
}