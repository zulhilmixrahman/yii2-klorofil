<?php

namespace app\components;

use Yii;
use yii\base\Component;


class NotificationHelper extends Component
{

    public static function email($to, $subject, $body)
    {
        // modify view path to module views
        $mailer = Yii::$app->mailer->compose();

        if (is_array($to)) {
            foreach ($to as $address) {
                $mailer->setTo($address);
            }
        } else {
            $mailer->setTo($to);
        }

        $mailer->setSubject($subject);
        $mailer->setHtmlBody($body);
        return $mailer->send();
    }

}