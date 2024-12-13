<?php namespace App\Controllers;

use App\Models\VehiclesModel;

class Vehicles extends BaseController
{
    protected $res;
    protected $data;
    protected $vehiclesModel;

    public function __construct()
    {
        $this->vehiclesModel = new VehiclesModel;

        $this->res = [
            'error' => FALSE,
            'popUpMessages' => [],
            'staticMessages' => []
        ];

        $this->data = [
            'menu' => 'CLIENTES',
            'submenu' => 'INDEX',
            'clientData' => array(),
            'customCSS' => '',
            'customJS' => '<script src="'. base_url('assets/js/custom/clientes.js?' . $_ENV['VERSION'] ).'"></script>'
        ];
    }

    public function getVehicleByLicensePlate()
    {
        $licensePlate = $this->request->getPost("licensePlate");

        return $this->response->setJSON($this->vehiclesModel->getVehicleByLicensePlate($licensePlate));
    }

    public function getAllVehicles()
    {
        return $this->response->setJSON($this->vehiclesModel->getAllVehicles());
    }
}