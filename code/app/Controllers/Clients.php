<?php namespace App\Controllers;

use App\Models\ClientsModel;
use App\Models\UsersModel;
use App\Models\VehiclesModel;
use DateTime;
use PhpParser\Node\Expr\FuncCall;
use Symfony\Component\Console\Descriptor\Descriptor;
use CodeIgniter\I18n\Time;

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
            'menu' => 'COSTUMERS',
            'submenu' => 'INDEX',
            'clientData' => array(),
            'customCSS' => '',
            'customJS' => '<script src="'. base_url('assets/js/custom/clients.js?' . $_ENV['VERSION'] ).'"></script>'
        ];
    }

    //CREATE CLIENT
    public function createClientLoadPage()
    {
        $this->data['title'] = 'client creation';
        // $this->data['allRoles'] = $this->usersModel->getRoles();

        return view('html/clients/clientCreation', $this->data);
    }

    public function createNewClient()
    {
        $formData = [
            'nif' => $this->request->getPost('nif'),
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'phoneNumber' => $this->request->getPost('phoneNumber'),
            'emailAddress' => $this->request->getPost('emailAddress')
        ];

        $validationRules = [
            'nif' => [
                'label' => 'nif',
                'rules' => 'required|max_length[9]'
            ],
            'name' => [
                'label' => 'name',
                'rules' => 'required|max_length[255]'
            ],
            'description' => [
                'label' => 'description',
                'rules' => 'required|max_length[255]'
            ],
            'phoneNumber' => [
                'label' => 'phone number',
                'rules' => 'required|max_length[9]'
            ],
            'emailAddress' => [
                'label' => 'email address',
                'rules' => 'required|max_length[255]|valid_email'
            ]
        ];

        if(! $this->validate($validationRules))
        {
            $this->res['error'] = TRUE;
            $this->res['popUpMessages'][] = $this->validator->getErrors();
        }
        else
        {
            $client_id = generateUUID();
            $creation_date = new Time('now');

            $clientInfo = [
                'id' => $client_id,
                'nif' => $formData['nif'],
                'name' => $formData['name'],
                'creation_date' => $creation_date
            ];

            $contactInfo = [
                'client_id' => $client_id,
                'description' => $formData['description'],
                'phone_number' => $formData['phoneNumber'],
                'email_address' => $formData['emailAddress'],
                'default' => 1
            ];

            $this->clientsModel->createClient($clientInfo, $contactInfo);

            $this->accountCreation($formData['emailAddress']);

            $this->res['popUpMessages'][] = 'sucesso!';
        }

        return $this->response->setJSON($this->res);
    }

    //ATUALIZAR CLIENTE
    public function updateClientLoadPage($client_id)
    {
        $this->data['title'] = 'client update';
        $this->data['clientData'] = $this->clientsModel->getClientData($client_id);

        $this->session->set(['client_id' => $client_id]);

        return view('html/clients/clientUpdate', $this->data);
    }

    public function updateClientInfo()
    {
        $nif = $this->request->getPost('nif');
        $name = $this->request->getPost('name');

        $clientData = [
            'id' => $this->session['client_id'],
            'nif' => $nif,
            'name' => $name
        ];

        $this->clientsModel->updateClientInfo($clientData);

        $this->res['popUpMessages'][] = 'sucesso!';

        return $this->response->setJSON($this->res);
    }

    public function updateContactInfo()
    {
        $id = $this->request->getPost('id');
        $description = $this->request->getPost('description');
        $phoneNumber = $this->request->getPost('phone_number');
        $emailAddress = $this->request->getPost('email_address');

        $clientData = [
            'id' => $id,
            'client_id' => $this->session->get('client_id'),
            'description' => $description,
            'phone_number' => $phoneNumber,
            'email_address' => $emailAddress
        ];

        $result = $this->clientsModel->updateContactInfo($clientData);

        if($result)
        {
            $this->res['popUpMessages'][] = 'error!';
            $this->res['error'] = TRUE;
        }
        else
        {
            $this->res['popUpMessages'][] = 'sucesso!';
        }

        return $this->response->setJSON($this->res);
    }

    public function updateCarInfo()
    {
        $id = $this->request->getPost('id');
        $description = $this->request->getPost('description');
        $vin = $this->request->getPost('vin');
        $licensePlate = $this->request->getPost('license_plate');
        $model = $this->request->getPost('model');
        $year = $this->request->getPost('year');

        $clientData = [
            'id' => $id,
            'client_id' => $this->session->get('client_id'),
            'description' => $description,
            'vin' => $vin,
            'license_plate' => $licensePlate,
            'model' => $model,
            'year' => $year
        ];

        $result = $this->clientsModel->updateCarInfo($clientData);

        if($result)
        {
            $this->res['popUpMessages'][] = 'error!';
            $this->res['error'] = TRUE;
        }
        else
        {
            $this->res['popUpMessages'][] = 'sucesso!';
        }

        return $this->response->setJSON($this->res);
    }

    //ADICIONAR CONTACTOS OU CARROS
    public function addClientInfoPage($client_id)
    {
        $this->data['title'] = 'add info';
        $this->data['clientData'] = $this->clientsModel->getClientData($client_id);
        $this->session->set(['client_id' => $client_id]);

        return view('html/clients/clientAddInfo', $this->data);
    }

    public function addContact()
    {
        $description = $this->request->getPost('description');
        $phoneNumber = $this->request->getPost('phone_number');
        $emailAddress = $this->request->getPost('email_address');

        $clientData = [
            'client_id' => $this->session->get('client_id'),
            'description' => $description,
            'phone_number' => $phoneNumber,
            'email_address' => $emailAddress
        ];

        $result = $this->clientsModel->insertContact($clientData);

        if($result)
        {
            $this->res['popUpMessages'][] = 'error!';
            $this->res['error'] = TRUE;
        }
        else
        {
            $this->res['popUpMessages'][] = 'sucesso!';
        }

        return $this->response->setJSON($this->res);
    }

    public function addCar()
    {
        $description = $this->request->getPost('description');
        $vin = $this->request->getPost('vin');
        $licensePlate = $this->request->getPost('license_plate');
        $model = $this->request->getPost('model');
        $year = $this->request->getPost('year');

        $clientData = [
            'client_id' => $this->session->get('client_id'),
            'description' => $description,
            'vin' => $vin,
            'license_plate' => $licensePlate,
            'model' => $model,
            'year' => $year
        ];

        $result = $this->clientsModel->insertCar($clientData);

        if($result)
        {
            $this->res['popUpMessages'][] = 'error!';
            $this->res['error'] = TRUE;
        }
        else
        {
            $this->res['popUpMessages'][] = 'sucesso!';
        }

        return $this->response->setJSON($this->res);
    }

    //LISTA DE CLIENTES
    public function listAllClientsLoadPage()
    {
        $this->data['title'] = 'client list';

        $this->data['clientData'] = $this->clientsModel->getAllClients();

        return view('html/clients/clientList', $this->data);
    }

    //ENVIAR EMAIL CRIAÇÃO DE CONTA
    private function accountCreation($emailAddress)
    {
        $emailBody = view('html/users/emailTemplate', ['email' => $emailAddress]);

        $this->email->setMailType('html');

        $this->email->setFrom('joao.coutinho.soares.07@gmail.com', 'johnny');
        $this->email->setTo($emailAddress);

        $this->email->setSubject('account creation');
        
        $this->email->setMessage($emailBody);

        $this->email->send();
        
        return;
    }

    //MOSTRAR CLIENTE
    public function showClientLoadPage($client_id)
    {
        $clientData = $this->clientsModel->getClientData($client_id);

        $this->data['title'] = $clientData['client'][0]['name'];
        $this->data['clientData'] = $clientData;

        return view('html/clients/clientInformation', $this->data);
    }

    //ELIMINAR CLIENTE
    public function deleteClient()
    {
        $client_id = $this->request->getPost('id');

        $this->clientsModel->deleteClient($client_id);

        $this->res['popUpMessages'][] = 'eliminado com sucesso!';
        return $this->response->setJSON($this->res);
    }


    //BUSCAR TODOS OS VEÍCULOS
    public function getAllVehicles()
    {
        $vehicleInfo = $this->vehiclesModel->getAllVehicles();

        return $this->response->setJSON($vehicleInfo);
    }

    public function Seeder()
    {
        $this->seeder->call('ClientSeeder');
    }
}