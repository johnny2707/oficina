<?php namespace App\Models;

use CodeIgniter\Model;

class VehiclesModel extends Model
{
    protected $db;

    protected $table = 'tb_clients_vehicles';
    protected $useSoftDeletes = true;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function getAllVehicles()
    {
        $query = $this->db->table($this->table)->select('*');

        return $query->get()->getResultArray();
    }
}