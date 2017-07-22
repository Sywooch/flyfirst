<?php

namespace common\sys\repository\blog\models;

use Yii;

/**
 * This is the model class for table "blog_articles".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $alias
 * @property string $posted
 * @property string $summary
 * @property string $body
 * @property string $update_date
 */
class BlogArticles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog_articles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'keywords', 'alias', 'summary', 'body'], 'required'],
            //['alias', 'unique'],
            [['posted', 'update_date'], 'safe'],
            [['description', 'keywords', 'summary', 'body'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['alias'], 'string', 'max' => 100],
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
            'title' => 'Title',
            'alias' => 'Alias',
            'posted' => 'Posted',
            'summary' => 'Summary',
            'body' => 'Body',
            'update_date' => 'Update Date',
        ];
    }

}
