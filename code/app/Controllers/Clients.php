<?php namespace App\Controllers;

use App\Models\ClientsModel;
use App\Models\UsersModel;
use PhpParser\Node\Expr\FuncCall;

class Clients extends BaseController
{
    protected $session;
    protected $clientsModel;
    protected $res;
    protected $data;
    protected $usersModel;
    protected $seeder;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->clientsModel = new ClientsModel;
        $this->usersModel = new UsersModel;

        $this->seeder = \Config\Database::seeder();

        $this->res = [
            'error' => FALSE,
            'popUpMessages' => [],
            'staticMessages' => []
        ];

        $this->data = [
            'menu' => 'COSTUMERS',
            'submenu' => 'INDEX',
            'clientData' => array(),
            'customCSS' => '',
            'customJS' => '<script src="'. base_url('assets/js/custom/clients.js?' . $_ENV['VERSION'] ).'"></script>'
        ];
    }

    public function index()
    {
        
    }

    public function createClientLoadPage()
    {
        $this->data['title'] = 'client creation';
        // $this->data['allRoles'] = $this->usersModel->getRoles();

        return view('html/clients/clientCreation', $this->data);
    }

    public function createNewClient()
    {
        $clientInfo = $this->request->getPost('clientInfo');

        $validationRules = [
            'nif' => [
                'label' => 'nif',
                'rules' => 'required|max_length[9]'
            ],
            'name' => [
                'label' => 'name',
                'rules' => 'required|max_length[255]'
            ],

        ];

        $this->res['popUpMessages'][] = 'sucesso!';

        return $this->response->setJSON($this->res);
    }

    public function updateClientLoadPage()
    {
        $this->data['title'] = 'client update';

        return view('html/clients/clientUpdate', $this->data);
    }

    public function updateClient()
    {
        $clientInfo = $this->request->getPost('clientInfo');

        $this->res['popUpMessages'][] = 'sucesso!';

        return $this->response->setJSON($this->res);
    }

    public function listAllClientsLoadPage()
    {
        $this->data['title'] = 'client list';

        $this->data['clientData'] = $this->clientsModel->getAllClients();

        return view('html/clients/clientsList', $this->data);
    }

    public function Seeder()
    {
        $this->seeder->call('ClientSeeder');
    }
}