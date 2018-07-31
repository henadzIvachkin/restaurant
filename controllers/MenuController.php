<?php

namespace app\controllers;


use app\models\Food;
use Yii;
use yii\data\Pagination;


class MenuController extends \yii\web\Controller
{
    public $layout = 'restaurant';



    public function actionMenuCarousel()
    {
        $breakfast = Food::find()
            ->where(['type' => 'breakfast'])
            ->limit(3)
            ->all();
        $lunch = Food::find()
            ->where(['type' => 'lunch'])
            ->limit(3)
            ->all();
        $dinner = Food::find()
            ->where(['type' => 'dinner'])
            ->limit(3)
            ->all();
        $desserts = Food::find()
            ->where(['type' => 'desserts'])
            ->limit(3)
            ->all();
        return $this->render('menu-carousel',
            ['breakfast' => $breakfast,
                'lunch' => $lunch,
                'dinner' => $dinner,
                'desserts' => $desserts,
            ]);
    }


    public function actionList($type = null){
        $types = ['breakfast','lunch','dinner','desserts'];
        $oneType = false;
        if($type && in_array($type,$types,true) ){
            $food = Food::find()
                ->where(['status' => '1','type' => $type])
                ->orderBy(['id' => SORT_DESC])
                ->all();
            $oneType = true;
        } else {
            $food = Food::find()
                ->where(['status' => '1'])
                ->orderBy(['id' => SORT_DESC])
                ->all();
        }
        if (!$food) {
            throw new \yii\web\HttpException(404, 'This food not found.');
        }
        return $this->render('menu_list', ['food' => $food, 'oneType' => $oneType]);
    }



    public function actionItem($id = 1){
        $food = Food::findOne($id);
        if (!$food){
            throw new \yii\web\HttpException(404, 'This menu item not found.');
        }
        return $this->render('menu_item',['food' => $food]);
    }

}
