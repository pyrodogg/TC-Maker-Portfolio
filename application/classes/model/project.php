<?php defined('SYSPATH') or die('No direct script access.');

class Model_Project extends Automodeler_ORM{

    protected $_table_name = 'project';

    protected $_data = array(
        'id' => '',
        'slug' => '',
    );
}
?>
