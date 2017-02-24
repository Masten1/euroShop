<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 26.12.2016
 * Time: 10:56
 */

namespace app\controllers;
use app\models\Category;


class CategoriesController extends AppController
{
    public function actionIndex()
    {
        $categories = Category::find()->all();

        $this->view->registerJsFile(
            '@web/theme/scripts/agency.js',

            ['depends' => [\yii\web\JqueryAsset::className()]]
        );

        $this->view->registerJsFile(
            '@web/theme/scripts/categories.js',

            ['depends' => [\yii\web\JqueryAsset::className()]]
        );


        return $this->render('index.twig', compact('categories'));
    }
}