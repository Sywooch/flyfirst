<?php

namespace common\sys\models\request;

use yii;
use yii\base\Model;

class FlightRequestMax extends Model
{
    public $from;
    public $to;
    public $name;
    public $phone;
    public $email;
    public $message;
    public $dep_date;
    public $arr_date;
    public $cabin_class_name;
    public $people_number;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from', 'to', 'dep_date', 'arr_date', 'name', 'phone', 'email'], 'required'],
            ['email', 'email'],
            [['phone', 'from', 'to', 'dep_date', 'arr_date'], 'safe'],
            [['name', 'phone', 'email', 'from', 'to'], 'string'],
            [['from', 'to'], 'string', 'max' => 500],
            [['name'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Your Name',
            'phone' => 'Your Telephone',
            'email' => 'Your Email',
            'from' => 'From',
            'to' => 'To',
            'dep_date' => 'Departure Date',
            'arr_date' => 'Return Date',
            'cabin_class_name' => 'Cabin class',
            'people_number' => 'People number'
        ];
    }

    public function sendEmailFlightRequest($email, $model)
    {
        return '';
    }
}