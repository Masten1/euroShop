<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 25.12.2016
 * Time: 19:47
 */

namespace app\widgets;

use yii\base\Widget;
use app\models\Banner;


class BannersList extends Widget
{
    function run()
    {
        $banners = Banner::find()->all();

        return $this->render('bannersList.twig', compact('banners'));
    }
}