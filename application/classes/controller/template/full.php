<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Template_Full extends Controller_Template_Common {

	public function before(){
		
		$this->template = 'template/default-full';
		parent::before();
		
		if($this->auto_render){
			
			$styles = array(
				//'http://www.pyrodogg.com/css/template-full.css' => 'screen,print',
			);
			
			 $scripts = array(
			 );
			
			$this->template->styles = array_merge($this->template->styles, $styles);
			$this->template->scripts = array_merge($this->template->scripts,$scripts);
		}
	}
	
	public function after(){
		if($this->auto_render){
				
		}
		parent::after();
	}
}
?>
