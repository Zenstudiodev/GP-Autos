<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 1/06/2017
 * Time: 3:53 PM
 */
class Base_Controller extends CI_Controller
{
    public $templates;
    public function __construct()
    {
        parent::__construct();
        $this->templates = new League\Plates\Engine(APPPATH."/views");
    }


}