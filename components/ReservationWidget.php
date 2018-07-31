<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 08.06.2018
 * Time: 16:14
 */

namespace app\components;
use yii\base\Widget;


class ReservationWidget extends Widget
{
    public function run() {
        return $this->render('reservation');
    }
}