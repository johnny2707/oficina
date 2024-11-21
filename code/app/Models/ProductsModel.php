<?php namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{
    protected $db;

    protected $table = 'tb_servicos';
    protected $useSoftDeletes = true;

    public function __construct() 
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function getProductByCode($produtoCodigo)
    {
        $query = $this->db->table('tb_servicos')->select('*')->where('servico_codigo', $produtoCodigo);
    
        return $query->get()->getResultArray();
    }

    public function getAllProducts()
    {
        $query = $this->db->table('tb_servicos')->select('*');

        return $query->get()->getResult();
    }
}