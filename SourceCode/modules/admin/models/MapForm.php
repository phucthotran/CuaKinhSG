<?php

namespace app\modules\admin\models;

use yii\base\Model;

/**
 * MapForm is the model behind the map form.
 */
class MapForm extends Model
{
	public $lat;
	public $long;
	
	/**
	 * @return array the validation rules.
	 */
	public function rules()	{
		return [
			//lat, long is required
			[['lat', 'long'], 'required'],
		];
	}
	
	/**
	 * @return array customized attribute labels
	 */
	public function attributeLabels() {
		return [
			'lat' => 'Lat',
			'long' => 'Long',
		];
	}
}