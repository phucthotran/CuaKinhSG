<?php
namespace app\models;

use Yii;
use app\models\Setting;

class WebSettings extends Setting
{
	//General settings
	public static $websiteName;
	public static $websiteTitle;
	public static $corporationName;
	public static $corporationAddress;
	public static $corporationEmail;
	public static $corporationPhone;
	public static $maintenanceStatus;
	public static $maintenanceMessage;
	public static $breadcrumbStatus;
	
	//Map settings
	public static $mapLat;
	public static $mapLong;
	
	//Announcement settings
	public static $announcementStatus;
	
	//Footer Widget settings
	public static $widgetStatus;
	public static $widget1Title;
	public static $widget1Body;
	public static $widget2Title;
	public static $widget2Body;
	
	//Navbar settings
	public static $navbarItems;
	
	//Home Page settings
	public static $homepageId;
	
	//Slider settings
	public static $sliderStatus;
	
	public static function fetch() {		
		self::$websiteName = strval( self::findOne( ['name' => 'general_web_name'] )->value );
		self::$websiteTitle = strval( self::findOne( ['name' => 'general_web_title'] )->value );
		self::$corporationName = strval( self::findOne( ['name' => 'general_corp_name'] )->value );
		self::$corporationAddress = strval( self::findOne( ['name' => 'general_corp_address'] )->value );
		self::$corporationEmail = strval( self::findOne( ['name' => 'general_corp_email'] )->value );
		self::$corporationPhone = strval( self::findOne( ['name' => 'general_corp_phone'] )->value );
		self::$maintenanceStatus = intval( self::findOne( ['name' => 'general_maintenance_enable'] )->value ) == 1 ? true : false;
		self::$maintenanceMessage = strval( self::findOne( ['name' => 'general_maintenance_message'] )->value );
		self::$breadcrumbStatus = intval( self::findOne( ['name' => 'general_breadcrumb_enable'] )->value ) == 1 ? true : false;
		
		self::$mapLat = strval( self::findOne( ['name' => 'map_lat'] )->value );
		self::$mapLong = strval( self::findOne( ['name' => 'map_long'] )->value );
		
		self::$announcementStatus = intval( self::findOne( ['name' => 'announcement_enable'] )->value ) == 1 ? true : false;
		
		self::$widgetStatus = intval( self::findOne( ['name' => 'widget_enable'] )->value ) == 1 ? true : false;
		self::$widget1Title = strval( self::findOne( ['name' => 'widget_1_title'] )->value );
		self::$widget1Body = strval( self::findOne( ['name' => 'widget_1_text'] )->value );
		self::$widget2Title = strval( self::findOne( ['name' => 'widget_2_title'] )->value );
		self::$widget2Body = strval( self::findOne( ['name' => 'widget_2_text'] )->value );
		
		self::$navbarItems = strval( self::findOne( ['name' => 'navbar_items'] )->value );
		
		self::$homepageId = intval( self::findOne( ['name' => 'homepage_id'] )->value );
		
		self::$sliderStatus = intval( self::findOne( ['name' => 'slider_enable'] )->value ) == 1 ? true : false;
	}
}