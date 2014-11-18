<?php

namespace app\modules\admin\models;

use yii\base\Model;

/**
 * AnnouncementSetupForm is the model behind the announcement setup form.
 */
class AnnouncementSetupForm extends Model
{
	public $enable = true;
	
	/**
	 * @return array the validation rules.
	 */
	public function rules() {
		return [
			// enable is required
			[['enable'], 'required'],
			['enable', 'boolean'],
		];
	}
	
	/**
	 * @return array customized attribute labels
	 */
	public function attributeLabels() {
		return [
			'enable' => 'Kích Hoạt'
		];
	}
}