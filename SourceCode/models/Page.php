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
 * @property integer $sidebarSupport
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
            [['publish', 'sidebarSupport'], 'integer'],
            [['content'], 'string'],
            [['title', 'keywords'], 'string', 'max' => 70],
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
        	'sidebarSupport' => 'Hỗ Trợ Sidebar',
            'publish' => 'Công Khai',
            'content' => 'Nội Dung',
        ];
    }
}
