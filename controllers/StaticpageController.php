<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 18.02.2017
 * Time: 14:11
 */

namespace app\controllers;
use app\models\Staticpage;


class StaticpageController extends AppController
{
    public function actionIndex()
    {
        $url = "/".\Yii::$app->request->get('url');

        $page = Staticpage::find()->where(["url" => $url])->one();

        if ( !$page instanceof Staticpage) {
            throw new \yii\web\HttpException(404);
        }

        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => "$page->metaDescription"
        ]);

        if ( $page->metaKeywords ) {
            \Yii::$app->view->registerMetaTag([
                'name' => 'keywords',
                'content' => "$page->metaKeywords"
            ]);
        }

        \Yii::$app->view->title = "$page->metaTitle";

        return $this->render('index.twig', compact('page'));
    }
}