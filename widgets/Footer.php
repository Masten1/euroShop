<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 07.02.2017
 * Time: 11:25
 */

namespace app\widgets;

use yii\base\Widget;
use app\models\Category;


class Footer extends Widget
{
    function run()
    {
        $categories = Category::find()->all();

        return $this->render('footer.twig', compact('categories'));
    }
}