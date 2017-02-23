<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 25.12.2016
 * Time: 19:11
 */

namespace app\widgets;

use yii\base\Widget;
use app\models\Category;


class NavigationList extends Widget
{
    function run()
    {
       $navigation = Category::find()->orderBy('weight ASC')->all();

        return $this->render('navigationList.twig', compact('navigation'));
    }
}