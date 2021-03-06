<?php

namespace app\modules\admin\models;

use yii\base\Model;

/**
 * GeneralForm is the model behind the general form.
 */
class GeneralForm extends Model
{
	public $maintenanceEnable = false;
	public $maintenanceMessage;
	public $breadcrumbEnable = true;
	public $websiteName;
	public $websiteTitle;
	public $corporationName;
	public $corporationAddress;
	public $corporationEmail;
	public $corporationPhone;

	/**
	 * @return array the validation rules.
	 */
	public function rules()	{
		return [
			//web's name, title and corp's name, address and email is required
			[['websiteName', 'websiteTitle', 'corporationName', 'corporationAddress', 'corporationEmail', 'corporationPhone'], 'required'],
			['websiteName', 'string', 'length' => [4, 45]],
			['websiteTitle', 'string', 'length' => [4, 100]],
			['corporationName', 'string', 'length' => [4, 45]],
			['corporationAddress', 'string', 'length' => [4, 100]],
			['corporationPhone', 'string', 'min' => 9],
			[['maintenanceEnable', 'maintenanceMessage', 'breadcrumbEnable'], 'safe'],
			['maintenanceEnable', 'boolean'],
			['maintenanceMessage', 'string', 'length' => [15, 200]],
			// email has to be a valid email address
			['corporationEmail', 'email'],
			['corporationEmail', 'string', 'length' => [6, 45]],
		];
	}
	
	/**
	 * @return array customized attribute labels
	 */
	public function attributeLabels() {
		return [
			'maintenanceEnable' => 'Đóng Cửa Bảo Trì',
			'maintenanceMessage' => 'Nội Dung Thông Báo',
			'breadcrumbEnable' => 'Kích Hoạt Box Định Hướng',
			'websiteName' => 'Tên Website',
			'websiteTitle' => 'Tiêu Đề Website',
			'corporationName' => 'Tên Doanh Nghiệp/Công Ty',
			'corporationAddress' => 'Địa Chỉ',
			'corporationEmail' => 'Email',
			'corporationPhone' => 'SĐT',
		];
	}
}