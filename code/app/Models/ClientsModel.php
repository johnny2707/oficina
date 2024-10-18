<?php namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;
use DateTime;

class ClientsModel extends Model
{
    protected $db;

    protected $table = 'tb_clients';
    protected $useSoftDeletes = true;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    //CREATION
    public function createClient($clientData, $contactInfo)
    {
        $this->db->table('tb_clients')->insert($clientData);
        $this->db->table('tb_clients_contacts')->insert($contactInfo);
    }

    //ADD CAR OR CONTACT
    public function insertContact($contactInfo)
    {
        $this->db->table('tb_clients_contacts')->insert($contactInfo);
    }

    public function insertCar($carInfo)
    {
        $this->db->table('tb_clients_vehicles')->insert($carInfo);
    }

    //UPDATE
    public function updateClientInfo($clientData)
    {
        $id = $clientData['id'];
        unset($clientData['id']);

        $this->db->table('tb_clients')->set($clientData)->where('id', $id)->update();
    }

    public function updateContactInfo($contactData)
    {
        $id = $contactData['id'];
        unset($contactData['id']);

        $client_id = $contactData['client_id'];
        unset($contactData['client_id']);

        $this->db->table('tb_clients_contacts')->set($contactData)->where('id', $id)->where('client_id', $client_id)->update();

        if($this->db->affectedRows() > 0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function updateCarInfo($carData)
    {
        $id = $carData['id'];
        unset($carData['id']);

        $client_id = $carData['client_id'];
        unset($carData['client_id']);

        $this->db->table('tb_clients_vehicles')->set($carData)->where('id', $id)->where('client_id', $client_id)->update();

        if($this->db->affectedRows() > 0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    //GET INFO
    public function getAllClients()
    {
        $query = $this->db->table('tb_clients')
                          ->select('*');
        
        return $query->get()->getResultArray();
    }

    public function getClientData($clientId)
    {
        $clientInfo = $this->db->table('tb_clients')
                                ->select('*')
                                ->where('id', $clientId)
                                ->get()
                                ->getResultArray();

        $contactsInfo = $this->db->table('tb_clients_contacts')
                                  ->select('id, description, phone_number, email_address')
                                  ->where('client_id', $clientId)
                                  ->get()
                                  ->getResultArray();

        $vehiclesInfo = $this->db->table('tb_clients_vehicles')
                                  ->select('id, description, vin, license_plate, model, year')
                                  ->where('client_id', $clientId)
                                  ->get()
                                  ->getResultArray();

        $clientData = [
            'client' => $clientInfo,
            'contacts' => $contactsInfo,
            'vehicles' => $vehiclesInfo
        ];

        return $clientData;
    }

    public function getAllClientsName()
    {
        $query = $this->db->table('tb_clients')
                          ->select('id, name');
        
        return $query->get()->getResultArray();
    }

    public function getClientFromSearch($input)
    {
        $query = $this->db->table('tb_clients')
                          ->select('*')
                          ->like('name', $input, 'both');
    
        return $query->get()->getResultArray();
    }

    //DELETE
    public function deleteClient($client_id)
    {
        $deletionDate = new Time('now');

        $this->db->query('UPDATE tb_clients SET deleted_at = ? WHERE id = ?', [$deletionDate, $client_id]);
        $this->db->query('UPDATE tb_clients_contacts SET deleted_at = ? WHERE client_id = ?', [$deletionDate, $client_id]);
        
        $clientHasCar = $this->db->table('tb_clients_vehicles')->select('*')->where('client_id', $client_id)->get();

        if($clientHasCar != '')
        {
            $this->db->query('UPDATE tb_clients_vehicles SET deleted_at = ? WHERE client_id = ?', [$deletionDate, $client_id]);
        }
    }
}