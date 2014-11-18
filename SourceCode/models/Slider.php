<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sliders".
 *
 * @property integer $id
 * @property string $imageLink
 * @property string $caption
 * @property string $link
 * @property integer $publish
 */
class Slider extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'sliders';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
				[['imageLink', 'caption', 'link'], 'required'],
				[['publish'], 'integer'],
				[['imageLink', 'caption'], 'string', 'max' => 45],
				['link', 'string', 'max' => 100],				
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
				'id' => 'ID',
				'imageLink' => 'Link Ảnh',
				'caption' => 'Tiêu Đề',
				'link' => 'Liên Kết Tới',
				'publish' => 'Công Khai',
		];
	}
}
