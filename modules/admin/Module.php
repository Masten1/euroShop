<?php

namespace app\modules\admin;

use yii\helpers\Url;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->layout = "main-admin";

        if ( !\Yii::$app->user->identity->isAdmin ) {
            return \Yii::$app->getResponse()->redirect(Url::to('/user/login'), 302);
        }
        parent::init();

        // custom initialization code goes here
    }
}
