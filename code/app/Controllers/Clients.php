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
    protected $email;
    protected $db;
    protected $vehiclesModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->clientsModel = new ClientsModel;
        $this->usersModel = new UsersModel;
        $this->vehiclesModel = new VehiclesModel;

        $this->email = \Config\Services::email();

        helper('uuid');
        helper('tokenGenerator');

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
        $clientData = $this->request->getPost("client");
        $vehicleData = $this->request->getPost("vehicle");

        $formData = [
            'client_code' => $clientData['clientCode'],
            'client_name' => $clientData['clientName'],
            'client_nif' => $clientData['clientNif'],
            'client_address' => $clientData['clientAddress'],
            'client_city' => $clientData['clientCode'],
            'client_post_code' => $clientData['clientPostCode'],
            'client_country' => $clientData['clientCountry'],
            'client_county' => $clientData['clientCounty'],
            'client_language' => $clientData['clientLanguage'],
            'client_email' => $clientData['clientEmail'],
            'client_phone_number' => $clientData['clientPhoneNumber'],
            'client_observations' => $clientData['clientObservations'],
            'user_group_id' => $clientData['clientGroup'],
            'vehicle_license_plate' => $vehicleData['vehicleLicensePlate'],
            'vehicle_brand' => $vehicleData['vehicleBrand'],
            'vehicle_model' => $vehicleData['vehicleModel'],
            'vehicle_year' => $vehicleData['vehicleYear'],
            'vehicle_chassi' => $vehicleData['vehicleChassi'],
            'vehicle_observations' => $vehicleData['vehicleObservations']
        ];

        $validationRules = [
            'client_code' => [
                'label' => 'Código Cliente',
                'rules' => 'required'
            ],
            'client_name' => [
                'label' => 'Nome',
                'rules' => 'required|max_length[255]'
            ],
            'client_nif' => [
                'label' => 'Nif',
                'rules' => 'required|'
            ],
            'client_address' => [
                'label' => 'Morada',
                'rules' => 'required|'
            ],
            'client_city' => [
                'label' => 'Cidade',
                'rules' => 'required|'
            ],
            'client_post_code' => [
                'label' => 'Código Postal',
                'rules' => 'required|'
            ],
            'client_country' => [
                'label' => 'País',
                'rules' => 'required|'
            ],
            'client_county' => [
                'label' => 'Distrito',
                'rules' => 'required|'
            ],
            'client_language' => [
                'label' => 'Idioma',
                'rules' => 'required|'
            ],
            'client_email' => [
                'label' => 'Email',
                'rules' => 'required|'
            ],
            'client_phone_number' => [
                'label' => 'Telemóvel',
                'rules' => 'required|'
            ],
            'client_observations' => [
                'label' => 'Observações (Cliente)',
                'rules' => ''
            ],
            'user_group_id' => [
                'label' => 'Grupo',
                'rules' => ''
            ],
            'vehicle_license_plate' => [
                'label' => 'Matrícula',
                'rules' => 'required|'
            ],
            'vehicle_brand' => [
                'label' => 'Marca',
                'rules' => 'required|'
            ],
            'vehicle_model' => [
                'label' => 'Modelo',
                'rules' => 'required|'
            ],
            'vehicle_year' => [
                'label' => 'Ano',
                'rules' => 'required|'
            ],
            'vehicle_chassi' => [
                'label' => 'Chassi',
                'rules' => 'required|'
            ],
            'vehicle_observations' => [
                'label' => 'Observações (Veículo)',
                'rules' => 'required|'
            ]
        ];

        if(!$this->validate($validationRules))
        {
            $this->res['error'] = true;
            $this->res['popUpMessages'][] = $this->validator->getErrors();
        }
        else
        {
            $creation_date = new Time('now');
            $USER_TOKEN = generateToken('c');

            $client = [
                'client_code'              => $formData['client_code'],
                'client_name'              => $formData['client_name'],
                'client_nif'               => $formData['client_nif'],
                'client_address'           => $formData['client_address'],
                'client_city'              => $formData['client_city'],
                'client_post_code'         => $formData['client_post_code'],
                'client_country'           => $formData['client_country'],
                'client_county'            => $formData['client_county'],
                'client_language'          => $formData['client_language'],
                'client_observations'      => $formData['client_observations'],
                'client_creation_date'     => $creation_date
            ];

            $contact = [
                'client_code'              => $formData['client_code'],
                'client_email'             => $formData['client_email'],
                'client_phone_number'      => $formData['client_phone_number']
            ];

            $vehicle = [];
        }

        // return $this->response->setJSON();
    }

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