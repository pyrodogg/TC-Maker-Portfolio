<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Main extends Controller_Template_Full{

    public function action_index()
    {
       $this->response->body(View::factory("home"));
    }

    public function action_view()
    {
        $this->template->content = View::factory("home");
    }
}
?>
