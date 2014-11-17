<?php

namespace app\modules\admin\models;

use yii\base\Model;

class NavbarForm extends Model
{
	public $items = array();
	
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['items'], 'safe'],
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'items' => 'Các Mục Sẽ Hiển Thị Trên Thanh Điều Hướng'
		];
	}
}