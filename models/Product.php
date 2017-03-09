<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 08.12.2016
 * Time: 15:41
 */

namespace app\models;
use yii\db\ActiveRecord;
use zxbodya\yii2\galleryManager;
use Imagine\Image;
use Yii;



class Product extends ActiveRecord
{
    public function getHref()
    {
        return "/product".$this->url;
    }

    public function getPrice()
    {
        return (int)$this->price;
    }

    public function isRecommend()
    {
        if ( $this->isRecommend )
            return true;

        return false;
    }

    public function getOldPrice()
    {
        return (int)$this->oldPrice;
    }

    public function isInStock()
    {
        if ( $this->inStock == 1 )
            return true;

        return false;
    }

    public function behaviors()
    {
        return [
            'galleryBehavior' => [
                'class' => galleryManager\GalleryBehavior::className(),
                'type' => 'product',
                'extension' => 'jpg',
                'directory' => Yii::getAlias('@webroot') . '/uploads/img/product/gallery',
                'url' => Yii::getAlias('@web') . '/uploads/img/product/gallery',
                'versions' => [
                    'small' => function ($img) {
                        /** @var \Imagine\Image\ImageInterface $img */
                        return $img
                            ->copy()
                            ->thumbnail(new \Imagine\Image\Box(200, 200));
                    },
                    'medium' => function ($img) {
                        /** @var Image\ImageInterface $img */
                        $dstSize = $img->getSize();
                        $maxWidth = 800;
                        if ($dstSize->getWidth() > $maxWidth) {
                            $dstSize = $dstSize->widen($maxWidth);
                        }
                        return $img
                            ->copy()
                            ->resize($dstSize);
                    },
                ]
            ]
        ];
    }

    public function sendMail()
    {
        $thisEntity = Order::findOne("$this->id");
        $ctime = $thisEntity->ctime;

        \app\widgets\MailerToAdmin::widget(array(
            'mail' => "$this->mail",
            'name' => "$this->name",
            'text' => "$this->text",
            'cTime' => "$ctime",
            'subject' => "Новый заказ товара с сайта www.euro-tehnika.com.ua"
        ));
    }

    public function getOffer()
    {
        $offer = Offer::find()->one();

        if ( $offer )
            return $offer;

        return false;
    }

    public function getCategoryUrl()
    {
        $catId = $this->category_id;

        $cat = Category::findOne("$catId");

        if ( $cat instanceof Category) {
            $trimUrl = trim($this->url, '/');
            return "/categories"."/#$trimUrl";
        } else {
            return "/";
        }

    }
}