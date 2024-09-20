<?php namespace App\Controllers;

use App\Models\ClientsModel;

class Clients extends BaseController
{
    protected $session;
    protected $clientsModel;
    protected $res;
    protected $data;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->clientsModel = new ClientsModel;

        $this->res = [
            'error' => FALSE,
            'popUpMessages' => [],
            'staticMessages' => []
        ];

        $this->data = [
            'customJS' => ''
        ];
    }

    public function index()
    {

    }

    public function createNewClient()
    {
        helper('uuid');

        $clientName = $this->request->getPost('name');
        $clientNif = $this->request->getPost('nif');

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

        $clientData = [
            'id' => generateUUID(),
            'nif' => $clientNif,
            'name' => $clientName,
        ];
    }
}