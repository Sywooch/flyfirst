<?php

namespace common\sys\repository\landing\models;

use Yii;

/**
 * This is the model class for table "airline".
 *
 * @property integer $id
 * @property string $description
 * @property string $keywords
 * @property string $name
 * @property string $alias
 * @property string $title
 * @property string $summary
 * @property string $body
 * @property string $created_date
 * @property string $update_date
 */
class Airline extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'airline';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'keywords', 'name', 'alias', 'title', 'summary', 'body'], 'required'],
            [['description', 'keywords', 'summary', 'body'], 'string'],
            [['created_date', 'update_date'], 'safe'],
            [['name', 'alias'], 'string', 'max' => 100],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => '[SEO] Description',
            'keywords' => '[SEO] Keywords',
            'name' => 'Name',
            'alias' => 'Alias',
            'title' => 'Title',
            'summary' => 'Summary',
            'body' => 'Body',
            'created_date' => 'Created Date',
            'update_date' => 'Update Date',
        ];
    }
}
