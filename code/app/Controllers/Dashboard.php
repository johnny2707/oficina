<?php namespace App\Controllers;

class Dashboard extends BaseController
{
    protected $session;
    protected $data;

    public function __construct() {
        $this->session = \Config\Services::session();

        $this->data = [
            'menu'          => 'DASHBOARD',
            // 'subMenu'       => '',
            // 'customCSS'     => '',
            'customJS'      => '
                <script src="'.base_url('assets/js/custom/dashboard.js?' . $_ENV['VERSION'] ).'"></script>
            '
        ];
    }

    public function index() {
        return view('html/users/create');

        // $this->data['title'] = "Dashboard";

        // return view('html/dashboard/index', $this->data);
    }

    public function pda() {
        $this->data['title'] = "Dashboard";

        return view('html/dashboard/pda/index', $this->data);
    }
}
