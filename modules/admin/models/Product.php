<?php

namespace app\modules\admin\models;

use zxbodya\yii2\galleryManager;
use app\models\Category;
use Yii;
use yii\helpers\ArrayHelper;
use Imagine\Image;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $title
 * @property string $url
 * @property string $img
 * @property string $description
 * @property string $specification
 * @property string $price
 * @property integer $isRecommend
 * @property integer $isInfo
 * @property string $metaTitle
 * @property string $metaDescription
 * @property string $metaKeywords
 * @property integer $category_id
 * @property string $howBuy
 * @property integer $inStock
 * @property string $oldPrice
 * @property integer $rating
 *
 * @property Product $category
 * @property Product[] $products
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file;

    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'url', 'description', 'price', 'rating'], 'required'],
            [['description', 'metaTitle', 'metaDescription', 'metaKeywords', 'howBuy', 'specification'], 'string'],
            [['price', 'oldPrice'], 'number'],
            [['file'], 'file'],
            [['isRecommend', 'isInfo', 'category_id', 'inStock', 'rating'], 'integer'],
            [['title', 'url', 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'url' => 'Url',
            'file' => 'Изображение',
            'description' => 'Характеристики',
            'specification' => 'Описание',
            'price' => 'Цена',
            'isRecommend' => 'Рекомендованный товар?',
            'inStock' => 'В наличии?',
            'metaTitle' => 'Meta Title',
            'metaDescription' => 'Meta Description',
            'metaKeywords' => 'Meta Keywords',
            'category_id' => 'Категория товара',
            'howBuy' => 'Как купить',
            'rating' => 'Рейтинг товара',
            'oldPrice' => 'Старая цена'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Product::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }

    public function getCategoryList() { // could be a static func as well
        $models = Category::find()->asArray()->all();
        return ArrayHelper::map($models, 'id', 'name');
    }

    public function getImageUrl()
    {
        return $this->img;
    }

    public function getCategoryName()
    {
        $category = Category::find()->where(["id" => $this->category_id])->one();

        return $category->name;

        //return $this->category->price;
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
}
