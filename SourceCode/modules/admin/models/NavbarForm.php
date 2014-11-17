<?php

namespace app\modules\admin\models;

use yii\base\Model;

/**
 * NavbarForm is the model behind the navbar form.
 */
class NavbarForm extends Model
{
	public $items = array();
	
	/**
	 * @return array the validation rules.
	 */
	public function rules() {
		return [
			[['items'], 'safe'],
		];
	}
	
	/**
	 * @return array customized attribute labels
	 */
	public function attributeLabels() {
		return [
			'items' => 'Các Mục Sẽ Hiển Thị Trên Thanh Điều Hướng'
		];
	}
}