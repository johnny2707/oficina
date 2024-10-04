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

    public function createClient($clientData, $contactInfo)
    {
        $this->db->table('tb_clients')->insert($clientData);
        $this->db->table('tb_clients_contacts')->insert($contactInfo);
    }

    public function updateClient($clientData)
    {
        $this->db->table('tb_clients')->update($clientData);
    }

    public function getAllClients()
    {
        $query = $this->db->table('tb_clients')
                          ->select('*');
        
        return $query->get()->getResultArray();
    }

    public function getClientData($clientId)
    {
        $clientQuery = $this->db->table('tb_clients')
                                ->select('*')
                                ->where('id', $clientId)
                                ->get()
                                ->getResultArray();

        $contactsQuery = $this->db->table('tb_clients_contacts')
                                  ->select('id, description, phone_number, email_address')
                                  ->where('client_id', $clientId)
                                  ->get()
                                  ->getResultArray();

        $vehiclesQuery = $this->db->table('tb_clients_vehicles')
                                  ->select('id, description, vin, license_plate, model, year')
                                  ->where('client_id', $clientId)
                                  ->get()
                                  ->getResultArray();

        $clientData = [
            'client' => $clientQuery,
            'contacts' => $contactsQuery,
            'vehicles' => $vehiclesQuery
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