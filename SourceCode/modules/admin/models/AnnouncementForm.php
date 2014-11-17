<?php

namespace app\modules\admin\models;

use yii\base\Model;

/**
 * AnnouncementForm is the model behind the announcement form.
 */
class AnnouncementForm extends Model
{
	public $title;
	public $modeId;
	public $publish = true;
	public $content;
	
	/**
	 * @return array the validation rules.
	 */
	public function rules() {
		return [
			[['title', 'modeId', 'content'], 'required'],
			[['publish'], 'safe'],
		];
	}
	
	/**
	 * @return array customized attribute labels
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