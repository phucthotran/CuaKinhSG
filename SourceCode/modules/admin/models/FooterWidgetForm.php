<?php

namespace app\modules\admin\models;

use yii\base\Model;

class FooterWidgetForm extends Model
{
	public $enable;
	public $widget1Title;
	public $widget1Text;
	public $widget2Title;
	public $widget2Text;
	
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['enable', 'widget1Title', 'widget1Text', 'widget2Title', 'widget2Text'], 'required'],
		];
	}
	
	/**
	 * @inheritdoc
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