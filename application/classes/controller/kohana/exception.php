<?php defined('SYSPATH') or die('No direct script access.');

class Kohana_Exception extends Kohana_Kohana_Exception {

	public static function handler(Exception $e){
		//Throw errors when in development mode
		try{
		if (Kohana::$environment === Kohana::DEVELOPMENT){
			parent::handler($e);
		} else {
			Kohana::$log->add(Log::ERROR, Kohana_Exception::text($e)); 
 
            $attributes = array( 
                'action'    => 500, 
                'origuri'   => rawurlencode(Arr::get($_SERVER, 'REQUEST_URI')), 
                'message'   => rawurlencode($e->getMessage()) 
            ); 
 
            if ($e instanceof Http_Exception) 
            { 
                $attributes['action'] = $e->getCode(); 
            } 
		
            // Error sub request 
            //echo Request::factory(Route::url('error', $attributes)) 
			//print Route::get('error')->uri($attributes);
			echo Request::factory(Route::get('error')->uri($attributes))
                ->execute() 
                ->send_headers() 
                ->body(); 
        } 
		} catch(Exception $k) {
			print_r($k);
			var_dump($k->getTrace());
		}
	}
}

?>