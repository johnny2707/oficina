<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model 
{
    protected $db;

    protected $table = 'tb_users';
    protected $useSoftDeletes = true;

    public function __construct() 
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function createUser($userData)
    {
        $this->db->table('tb_users')->insert($userData);
    }

    public function updateUser($userID, $userData)
    {
        $this->db->table('tb_users')->update($userData, ['user_id' => $userID]);
    }

    public function getUserDataByEmail($userEmail)
    {
        $query = $this->db->table('tb_users')
                          ->select('*')
                          ->join('tb_groups', 'tb_users.user_group_id = tb_groups.group_id')
                          ->where('tb_users.user_email', $userEmail);
        
        return $query->get()->getResultArray();
    }

    public function getGroups()
    {
        $query = $this->db->table('tb_groups')->select('*');
        
        return $query->get()->getResultArray();
    }
}
