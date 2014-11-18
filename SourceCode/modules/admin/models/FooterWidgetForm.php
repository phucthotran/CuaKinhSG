<?php

namespace app\modules\admin\models;

use yii\base\Model;

/**
 * FooterWidgetForm is the model behind the footer widget form.
 */
class FooterWidgetForm extends Model
{
	public $enable = true;
	public $widget1Title;
	public $widget1Text;
	public $widget2Title;
	public $widget2Text;
	
	/**
	 * @return array the validation rules.
	 */
	public function rules() {
		return [
			[['enable', 'widget1Title', 'widget1Text', 'widget2Title', 'widget2Text'], 'required'],
			['enable', 'boolean'],
			['widget1Title', 'string', 'length' => [3, 45]],
			['widget2Title', 'string', 'length' => [3, 45]],
		];
	}
	
	/**
	 * @return array customized attribute labels
	 */
	public function attributeLabels() {
		return [
			'enable' => 'Kích hoạt',
			'widget1Title' => 'Widget 1 - Tiêu Đề',
			'widget1Text' => 'Widget 1 - Nội Dung (Hỗ trợ HTML)',
			'widget2Title' => 'Widget 2 - Tiêu Đề',
			'widget2Text' => 'Widget 2 - Nội Dung (Hỗ trợ HTML)',			
		];
	}	
}