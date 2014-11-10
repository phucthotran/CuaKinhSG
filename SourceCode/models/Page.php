<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pages".
 *
 * @property integer $id
 * @property string $title
 * @property string $url
 * @property string $keywords
 * @property integer $publish
 * @property resource $content
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'url', 'keywords', 'content'], 'required'],
            [['publish'], 'integer'],
            [['content'], 'string'],
            [['title', 'keywords'], 'string', 'max' => 100],
            [['url'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Tiêu Đề',
            'url' => 'Liên Kết',
            'keywords' => 'Từ Khóa',
            'publish' => 'Công Khai',
            'content' => 'Nội Dung',
        ];
    }
}
