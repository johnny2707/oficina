<?php namespace App\Controllers;

use App\Models\ClientsModel;
use App\Models\UsersModel;

class Clients extends BaseController
{
    protected $session;
    protected $clientsModel;
    protected $res;
    protected $data;
    protected $usersModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->clientsModel = new ClientsModel;
        $this->usersModel = new UsersModel;

        $this->res = [
            'error' => FALSE,
            'popUpMessages' => [],
            'staticMessages' => []
        ];

        $this->data = [
            'customJS' => '<script src="'. base_url('assets/js/custom/clients.js?' . $_ENV['VERSION'] ).'"></script>'
        ];
    }

    public function index()
    {
        $this->data['title'] = 'user creation';
        $this->data['allRoles'] = $this->usersModel->getRoles();

        return view('html/clients/clientCreation', $this->data);
    }

    public function createNewClient()
    {
        helper('uuid');

        $clientInfo = $this->request->getPost('clientInfo');
        $contactNum = $this->request->getPost('contactNum');
        $carNum = $this->request->getPost('carNum');

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

        // $clientData = [
        //     'id' => generateUUID(),
        //     'nif' => ,
        //     'name' => ,
        // ];
    }
}