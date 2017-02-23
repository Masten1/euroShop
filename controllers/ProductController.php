<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 08.12.2016
 * Time: 15:43
 */

namespace app\controllers;
use app\models\Order;
use app\models\Product;
use app\models\Offer;


class ProductController extends AppController
{
    public function actionIndex()
    {
        $products = Product::find()->all();

        return $this->render('index.twig', compact('products'));
    }

    public function actionView()
    {
        $url = "/".\Yii::$app->request->get('url');

        $product = Product::find()->where(["url" => $url])->one();

        if ( !$product instanceof Product) {
            throw new \yii\web\HttpException(404);
        }

        $this->view->registerJsFile(
            '@web/theme/scripts/agency-product.js',

            ['depends' => [\yii\web\JqueryAsset::className()]]
        );

        $this->view->registerJsFile(
            '@web/theme/libs/jQuery.countdown-master/dist/jquery.countdown.min.js',

            ['depends' => [\yii\web\JqueryAsset::className()]]
        );

        $this->view->registerJsFile(
            '@web/theme/scripts/products.js',

            ['depends' => [\yii\web\JqueryAsset::className()]]
        );

        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => "$product->metaDescription"
        ]);

        if ( $product->metaKeywords ) {
            \Yii::$app->view->registerMetaTag([
                'name' => 'keywords',
                'content' => "$product->metaKeywords"
            ]);
        }

        \Yii::$app->view->title = "$product->metaTitle";

        return $this->render('view.twig', compact('product'));
    }

    public function actionBuy()
    {
        $data = \Yii::$app->request->post();

        $productId = $data["productId"];

        $product = Product::findOne($productId);
        $data["totalPrice"] = $product->getPrice();
        $data["productName"] = $product->title;

        $order = new Order($data);

        if ($order->validate()) {
            // все данные корректны

            $order->save();
            $order->sendMail();

            return json_encode([
                'type' => 'success',
            ]);
        } else {
            // данные не корректны: $errors - массив содержащий сообщения об ошибках
            $errors = $order->errors;

            return json_encode([
                'type' => 'error',
                'errors' => array($errors),
            ]);
        }
    }
}