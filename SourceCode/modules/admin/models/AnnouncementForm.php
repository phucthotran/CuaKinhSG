<?php

namespace app\modules\admin\models;

use yii\base\Model;

/**
 * AnnouncementForm is the model behind the announcement form.
 */
class AnnouncementForm extends Model
{
	public $title;
	public $modeId = 0;
	public $publish = true;
	public $content;
	
	/**
	 * @return array the validation rules.
	 */
	public function rules() {
		return [
			[['title', 'modeId', 'content'], 'required'],
			['title', 'string', 'length' => [4, 45]],
			['content', 'string', 'length' => [20, 200]],
			['modeId', 'integer'],
			['modeId', 'in', 'range' => [0, 1]],
			[['publish'], 'safe'],
			['publish', 'boolean'],
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