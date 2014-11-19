<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sidebars".
 *
 * @property integer $id
 * @property string $title
 * @property string $body
 * @property integer $priorityMode
 * @property integer $position
 * @property integer $templateMode
 * @property integer $publish
 */
class Sidebar extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'sidebars';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['title', 'body', 'position'], 'required'],
			[['priorityMode', 'position', 'templateMode', 'publish'], 'integer'],
			[['title'], 'string', 'max' => 20],							
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
			'body' => 'Nội Dung',
			'priorityMode' => 'Mức Độ',
			'position' => 'Vị Trí Ưu Tiên',
			'templateMode' => 'Mẫu Hiển Thị',
			'publish' => 'Công Khai',
		];
	}
}
