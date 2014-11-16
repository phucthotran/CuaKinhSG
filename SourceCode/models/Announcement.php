<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "announcement".
 *
 * @property integer $id
 * @property string $title
 * @property integer $mode_id
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
        return 'announcement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'mode_id'], 'required'],
            [['mode_id', 'publish'], 'integer'],
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
            'mode_id' => 'Mức Độ',
            'publish' => 'Công Khai',
            'content' => 'Nội Dung',
        ];
    }
}
