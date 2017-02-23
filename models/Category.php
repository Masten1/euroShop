<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 13.12.2016
 * Time: 13:01
 */

namespace app\models;
use yii\db\ActiveRecord;


class Category extends ActiveRecord
{
    public function getHref()
    {
        $trimUrl = trim($this->url, '/');
        return "/categories"."/#$trimUrl";
    }

    public function getBlockHref()
    {
        $trimUrl = trim($this->url, '/');
        return "$trimUrl";
    }

    public function getProducts()
    {
        return Product::find()->where(["category_id" => $this->primaryKey])->andWhere(["inStock" => 1])->all();
    }
}