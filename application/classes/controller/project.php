<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Project extends Controller_Template_Full {

    public function action_index()
    {
        $this->request->action("action_view");
    }

    public function action_view()
    {

    }

    public function action_add()
    {

    }

    public function action_edit($id)
    {
        $this->template->content = "action edit - id: " . $id;
    }

    public function action_archive()
    {

    }

    public function action_generate()
    {
        
    }
}

?>
