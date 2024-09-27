<?php namespace App\Models;

use CodeIgniter\Model;
use Config\Services;

class Mechanics extends Model
{
    protected $db;

    protected $table = 'tb_clients';
    protected $useSoftDeletes = true;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }
}