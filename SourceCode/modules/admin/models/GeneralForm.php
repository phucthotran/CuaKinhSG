<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;

/**
 * GeneralForm is the model behind the general form.
 */
class GeneralForm extends Model
{
	public $maintenanceEnable;
	public $maintenanceMessage;
	public $websiteName;
	public $websiteTitle;
	public $corporationName;
	public $corporationAddress;
	public $corporationEmail;
	public $corporationPhone;

	/**
	 * @return array the validation rules.
	 */
	public function rules()
	{
		return [
			//web's name, title and corp's name, address and email is required
			[['websiteName', 'websiteTitle', 'corporationName', 'corporationAddress', 'corporationEmail', 'corporationPhone'], 'required'],
			[['maintenanceEnable', 'maintenanceMessage'], 'safe'],
		];
	}
	
	/**
	 * @return array customized attribute labels
	 */
	public function attributeLabels()
	{
		return [
			'maintenanceEnable' => 'Đóng Cửa Bảo Trì',
			'maintenanceMessage' => 'Nội Dung Thông Báo',
			'websiteName' => 'Tên Website',
			'websiteTitle' => 'Tiêu Đề Website',
			'corporationName' => 'Tên Doanh Nghiệp/Công Ty',
			'corporationAddress' => 'Địa Chỉ',
			'corporationEmail' => 'Email',
			'corporationPhone' => 'SĐT',
		];
	}
}