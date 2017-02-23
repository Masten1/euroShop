<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 22.12.2016
 * Time: 22:13
 */

namespace app\widgets;

use yii\base\Widget;
use app\models\Category;


class CategoriesList extends Widget
{
    function run()
    {
        $categories = Category::find()->all();

        return $this->render('categoriesList.twig', compact('categories'));
    }
}