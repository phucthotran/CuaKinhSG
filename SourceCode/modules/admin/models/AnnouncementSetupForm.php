<?php

namespace app\modules\admin\models;

use yii\base\Model;

/**
 * AnnouncementSetupForm is the model behind the announcement setup form.
 */
class AnnouncementSetupForm extends Model
{
	public $enable;
	
	/**
	 * @return array the validation rules.
	 */
	public function rules() {
		return [
			// enable is required
			[['enable'], 'required'],
			['enable', 'boolean', 'trueValue' => true, 'falseValue' => false],
			['enable', 'default', 'value' => true],
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