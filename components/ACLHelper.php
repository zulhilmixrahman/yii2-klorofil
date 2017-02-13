<?php

namespace app\components;

use Yii;
use yii\base\Component;

class ACLHelper extends Component
{

    public static function checkAccessLevel($roleId)
    {
        if (Yii::$app->user->isGuest)
            return false;

        if (!is_array($roleId))
            throw new \yii\web\HttpException(500, '$roleId need to be in array format.');

        if (in_array(Yii::$app->user->identity->role_id, $roleId)) {
            return true;
        } else {
            return false;
        }
    }

}