<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 05.02.2017
 * Time: 15:37
 */

namespace app\widgets;

use yii\base\Widget;


class AdminNavigationList extends Widget
{
    function run()
    {
        return $this->render('adminNavigationList.twig');
    }
}