<?php

namespace app\modules\admin\models;

use yii\base\Model;

/**
 * SliderForm is the model behind the slider form.
 */
class SliderForm extends Model
{
	public $caption;
	public $imageLink;
	public $link;
	public $publish = true;	

	/**
	 * @return array the validation rules.
	 */
	public function rules() {
		return [
				[['imageLink', 'caption', 'link'], 'required'],
				[['imageLink', 'caption'], 'string', 'length' => [4, 45]],
				['link', 'string', 'length' => [10, 100]],				
				[['publish'], 'safe'],
				['publish', 'boolean'],
		];
	}

	/**
	 * @return array customized attribute labels
	 */
	public function attributeLabels() {
		return [
			'imageLink' => 'Link Ảnh',
			'caption' => 'Tiêu Đề',
			'link' => 'Liên Kết Tới',
			'publish' => 'Công Khai',
		];
	}
}