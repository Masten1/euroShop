<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 07.02.2017
 * Time: 12:45
 */

namespace app\widgets;

use yii\base\Widget;
use app\models\Navigation;


class NavigationUpper extends Widget
{
    function run()
    {
        $navigation = Navigation::find()->orderBy('weight ASC')->all();

        return $this->render('navigationUpperList.twig', compact('navigation'));
    }
}