<?php

namespace app\components\widgets\request;

use yii;
use yii\base\Widget;

class RequestHotel extends Widget
{
    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function run()
    {
        $request_hotel_model = new \common\sys\models\request\RequestHotel();

        $rooms = [];
        for($i = 1; $i < 10; $i++){
            $rooms[$i] = $i;
        }

        $adults = [];
        for($i = 1; $i < 7; $i++){
            $adults[$i] = $i;
        }

        $children = [];
        for($i = 0; $i < 7; $i++){
            $children[$i] = $i;
        }

        return $this->render(
            'request-hotel', [
                'rooms'  => $rooms,
                'adults' => $adults,
                'children' => $children,
                'model' => $request_hotel_model,
            ]
        );
    }
}