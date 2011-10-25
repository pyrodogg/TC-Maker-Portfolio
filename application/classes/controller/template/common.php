<?php defined('SYSPATH') or die('No direct script access.');

//include Kohana::find_file('vendor','markdown', 'php');

class Controller_Template_Common extends Controller_Template {

	public $template = '';
	
	public function before(){
		parent::before();
		
		if($this->auto_render){
			$this->template->title = '';
			$this->template->description = '';
			$this->template->content = '';
			$this->template->header = '';
			$this->template->footer = '';
			//$this->template->header = View::factory('static/header');
			//$this->template->footer = View::factory('static/footer');
			
			$this->template->styles = array(
				//'http://www.pyrodogg.com/css/960.css'=>'screen,print',
				//'http://www.pyrodogg.com/css/style.css'=>'screen,print',
				//'http://www.pyrodogg.com/css/nav.css' => 'screen,print',
				//'http://www.pyrodogg.com/css/template-sidebar.css' => 'screen,print',
			);
			
			$this->template->scripts = array(
				//'http://www.pyrodogg.com/js/libs/modernizr-2.0.4.js',
				//'https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js',
				//'http://www.pyrodogg.com/js/main.js',
			);
			
			//$this->template->styles = array_merge($this->template->styles, $styles);
			//$this->template->scripts = array_merge($this->template->scripts,$scripts);
			
			$menuConfig = Kohana::$config->load('menu.default');
			$this->template->topNav = Menu::factory($menuConfig)->render();
		}
	}
	
	public function after(){
		if($this->auto_render){
		}
		
		parent::after();
	}
}
?>