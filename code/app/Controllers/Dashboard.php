<?php namespace App\Controllers;

class Dashboard extends BaseController
{
    protected $session;
    protected $data;

    public function __construct() {
        $this->session = \Config\Services::session();

        $this->data = [
            'menu'          => 'HOME',
            'subMenu'       => '',
            'customCSS'     => '',
            'customJS'      => '<script src="'.base_url('assets/js/custom/custom.js?' . $_ENV['VERSION'] ).'"></script>'
        ];
    }

    public function index() {
        $this->data['title'] = "Dashboard";

        return view('html/index', $this->data);
    }
}
