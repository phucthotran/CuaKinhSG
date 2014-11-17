<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "announcements".
 *
 * @property integer $id
 * @property string $title
 * @property integer $modeId
 * @property integer $publish
 * @property string $content
 */
class Announcement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'announcements';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'modeId'], 'required'],
            [['modeId', 'publish'], 'integer'],
            [['title'], 'string', 'max' => 45],
            [['content'], 'string', 'max' => 200]
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
            'modeId' => 'Mức Độ',
            'publish' => 'Công Khai',
            'content' => 'Nội Dung',
        ];
    }
}
