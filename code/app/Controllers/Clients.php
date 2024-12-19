<?php namespace App\Controllers;

use App\Models\ClientsModel;
use App\Models\UsersModel;
use App\Models\VehiclesModel;
use DateTime;
use PhpParser\Node\Expr\FuncCall;
use Symfony\Component\Console\Descriptor\Descriptor;
use CodeIgniter\I18n\Time;
use SebastianBergmann\CodeUnit\FunctionUnit;

class Clients extends BaseController
{
    protected $session;
    protected $clientsModel;
    protected $res;
    protected $data;
    protected $usersModel;
    protected $seeder;
    protected $email;
    protected $db;
    protected $vehiclesModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->clientsModel = new ClientsModel;
        $this->usersModel = new UsersModel;
        $this->vehiclesModel = new VehiclesModel;

        $this->seeder = \Config\Database::seeder();

        $this->email = \Config\Services::email();

        helper('uuid');

        $this->res = [
            'error' => FALSE,
            'popUpMessages' => [],
            'staticMessages' => []
        ];

        $this->data = [
            'menu' => 'CLIENTES',
            'submenu' => '',
            'clientData' => array(),
            'customCSS' => '',
            'customJS' => '<script src="'. base_url('assets/js/custom/clientes.js?' . $_ENV['VERSION'] ).'"></script>'
        ];
    }

    public function create()
    {
        $this->data['title'] = 'registar cliente';

        return view('html/clientes/criar', $this->data);
    }

    public function createClient()
    {
        $clientData = $this->request->getPost("clientData");

        return $this->response->setJSON($clientData);
    }
    //     $formData = [
    //         'nif' => $this->request->getPost('nif'),
    //         'name' => $this->request->getPost('name'),
    //         'description' => $this->request->getPost('description'),
    //         'phoneNumber' => $this->request->getPost('phoneNumber'),
    //         'emailAddress' => $this->request->getPost('emailAddress')
    //     ];

    //     $validationRules = [
    //         'nif' => [
    //             'label' => 'nif',
    //             'rules' => 'required|max_length[9]'
    //         ],
    //         'name' => [
    //             'label' => 'name',
    //             'rules' => 'required|max_length[255]'
    //         ],
    //         'description' => [
    //             'label' => 'description',
    //             'rules' => 'required|max_length[255]'
    //         ],
    //         'phoneNumber' => [
    //             'label' => 'phone number',
    //             'rules' => 'required|max_length[9]'
    //         ],
    //         'emailAddress' => [
    //             'label' => 'email address',
    //             'rules' => 'required|max_length[255]|valid_email'
    //         ]
    //     ];

    //     if(! $this->validate($validationRules))
    //     {
    //         $this->res['error'] = TRUE;
    //         $this->res['popUpMessages'][] = $this->validator->getErrors();
    //     }
    //     else
    //     {
    //         $client_id = generateUUID();
    //         $creation_date = new Time('now');

    //         $clientInfo = [
    //             'id' => $client_id,
    //             'nif' => $formData['nif'],
    //             'name' => $formData['name'],
    //             'creation_date' => $creation_date
    //         ];

    //         $contactInfo = [
    //             'client_id' => $client_id,
    //             'description' => $formData['description'],
    //             'phone_number' => $formData['phoneNumber'],
    //             'email_address' => $formData['emailAddress'],
    //             'default' => 1
    //         ];

    //         $this->clientsModel->createClient($clientInfo, $contactInfo);

    //         $this->accountCreation($formData['emailAddress']);

    //         $this->res['popUpMessages'][] = 'sucesso!';
    //     }

    //     return $this->response->setJSON($this->res);
    // }
}