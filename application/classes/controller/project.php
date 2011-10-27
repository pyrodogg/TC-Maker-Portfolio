<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Project extends Controller_Template_Full {

    public function action_index()
    {
        $this->request->action("action_view");
    }

    public function action_view()
    {
        $this->_actionTest();
    }

    public function action_add()
    {
        $this->_actionTest();
    }

    public function action_edit()
    {
        $this->_actionTest();
    }

    public function action_archive()
    {
        $this->_actionTest();
    }

    public function action_generate()
    {
        $this->_actionTest();
    }

    private function _actionTest(){
        $id = $this->request->param('id');
        $this->template->content = "Controller: " . $this->request->controller() . "<br />" .
                "Action: " . $this->request->action() . "<br />" .
                "ID: " . $id;
    }
}

?>
