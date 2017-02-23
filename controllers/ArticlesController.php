<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 15.02.2017
 * Time: 13:12
 */

namespace app\controllers;
use app\models\Article;
use yii\helpers\Url;


class ArticlesController extends AppController
{
    public function actionIndex()
    {
        $articles = Article::find()->all();
        return $this->render('index.twig', compact('articles'));
    }

    public function actionView()
    {
        $url = "/".\Yii::$app->request->get('url');
        $article = Article::find()->where(["url" => $url])->one();

        if ( !$article instanceof Article) {
            throw new \yii\web\HttpException(404);
        }

        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => "$article->metaDescription"
        ]);

        if ( $article->metaKeywords ) {
            \Yii::$app->view->registerMetaTag([
                'name' => 'keywords',
                'content' => "$article->metaKeywords"
            ]);
        }

        \Yii::$app->view->title = "$article->metaTitle";

        return $this->render('view.twig', compact('article'));
    }

}