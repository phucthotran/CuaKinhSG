<?php

namespace app\modules\admin\models;

use yii\base\Model;

/**
 * Sidebar is the model behind the sidebar form.
 */
class SidebarForm extends Model
{
	public $title;
	public $body;
	public $priorityMode;
	public $position;
	public $templateMode;
	public $publish = true;	

	/**
	 * @return array the validation rules.
	 */
	public function rules() {
		return [
				[['title', 'body', 'position'], 'required'],
				['title', 'string', 'length' => [3, 20]],
				[['priorityMode', 'position', 'templateMode'], 'integer'],
				[['priorityMode', 'templateMode', 'publish'], 'safe'],
				['publish', 'boolean'],
		];
	}

	/**
	 * @return array customized attribute labels
	 */
	public function attributeLabels() {
		return [
			'title' => 'Tiêu Đề',
			'body' => 'Nội Dung',
			'priorityMode' => 'Mức Độ',
			'position' => 'Vị Trí Ưu Tiên',
			'templateMode' => 'Mẫu Hiển Thị',
			'publish' => 'Công Khai',
		];
	}
}