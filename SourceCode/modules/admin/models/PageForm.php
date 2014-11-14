<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;

/**
 * PageForm is the model behind the page edit/new form.
 */
class PageForm extends Model
{
	public $title;
	public $url;
	public $keywords;
	public $publish = true;
	public $content;
	
	/**
	 * @return array the validation rules.
	 */
	public function rules()
	{
		return [
			//title, url, keywords, content is required
			[['title', 'url', 'keywords', 'content'], 'required'],
		];
	}
	
	/**
	 * @return array customized attribute labels
	 */
	public function attributeLabels()
	{
		return [
			'title' => 'Tiêu Đề',
			'url' => 'URL (Đường dẫn đến trang)',
			'keywords' => 'Từ Khóa SEO',
			'publish' => 'Công Khai',
			'content' => 'Nội Dung',
		];
	}
}