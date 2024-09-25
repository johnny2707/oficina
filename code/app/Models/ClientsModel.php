<?php namespace App\Models;

use CodeIgniter\Model;

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

    public function createClient($clientData)
    {
        $this->db->table('tb_clients')->insert($clientData);
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
        $query = $this->db->table('tb_clients')
                          ->select('*')
                          ->join('tb_clients_contacts', 'tb_client.id = tb_clients_contacts.client_id')
                          ->join('tb_clients_vehicles', 'tb_cients.id = tb_clients_vehicles.client_id')
                          ->where('tb_clients.id', $clientId);
        
        return $query->get()->getResultArray();
    }
}