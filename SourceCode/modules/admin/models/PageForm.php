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
	public $sidebarSupport = true;
	public $publish = true;
	public $content;
	
	/**
	 * @return array the validation rules.
	 */
	public function rules()	{
		return [
			//title, url, keywords, content is required
			[['title', 'url', 'keywords', 'content'], 'required'],			
			[['title'], 'string', 'length' => [4, 70]],
			[['keywords'], 'string', 'length' => [4, 100]],
			['url', 'string', 'length' => [4, 45]],
			['url', 'unique', 'targetClass' => Page::className(), 'targetAttribute' => 'url',],
			[['publish', 'sidebarSupport'], 'safe'],
			[['publish', 'sidebarSupport'], 'boolean'],
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
			'sidebarSupport' => 'Hỗ Trợ Sidebar',
			'publish' => 'Công Khai',
			'content' => 'Nội Dung',
		];
	}
}