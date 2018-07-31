<?php

namespace app\components;
use yii\base\Widget;


class SubscribeWidget extends Widget
{
    public function run() {
        return $this->render('subscribe');
    }
}