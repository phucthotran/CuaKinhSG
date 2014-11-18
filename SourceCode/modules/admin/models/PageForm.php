<?php

namespace app\modules\admin\models;

use yii\base\Model;
use app\models\Page;

/**
 * PageForm is the model behind the page edit/new form.
 */
class PageForm extends Model
{
	public $title;
	public $url;
	public $keywords;
	public $publish;
	public $content;
	
	/**
	 * @return array the validation rules.
	 */
	public function rules()	{
		return [
			//title, url, keywords, content is required
			[['title', 'url', 'keywords', 'content'], 'required'],			
			[['title', 'keywords'], 'string', 'length' => [4, 100]],
			['url', 'string', 'length' => [4, 45]],
			['url', 'unique', 'targetClass' => Page::className(), 'targetAttribute' => 'url',],
			[['publish'], 'safe'],
			['publish', 'boolean'],
			['publish', 'default', 'value' => 1],
		];
	}
	
	/**
	 * @return array customized attribute labels
	 */
	public function attributeLabels() {
		return [
			'title' => 'Tiêu Đề',
			'url' => 'URL (Đường dẫn đến trang)',
			'keywords' => 'Từ Khóa SEO',
			'publish' => 'Công Khai',
			'content' => 'Nội Dung',
		];
	}
}