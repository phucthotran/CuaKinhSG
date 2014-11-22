<?php
namespace app\components\Sidebar;

use yii\base\Widget;
use yii\helpers\Html;

class SidebarWidget extends Widget {

	const MODE_IMPORTANT = 1;
	const MODE_NORMAL = 0;

	public $title;
	public $priorityMode;
	
	public function init() {
		parent::init();
		
		ob_start();
	}

	public function run() {
		$content = ob_get_clean();
		
		return $this->render( 'sidebar',
				array( 'title' => $this->title,
						'body' => $content,
						'priorityMode' => $this->priorityMode
				) );
	}
}