<?php

namespace app\modules\admin\models;

use yii\base\Model;

class AnnouncementForm extends Model
{
	public $title;
	public $modeId;
	public $publish = true;
	public $content;
	
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['title', 'modeId', 'content'], 'required'],
			[['publish'], 'safe'],
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'title' => 'Tiêu Đề',
			'modeId' => 'Mức Độ',
			'publish' => 'Công Khai',
			'content' => 'Nội Dung'
		];
	}
}