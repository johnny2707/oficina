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
        $this->db->table('tb_users')->update($userData, ['id' => $userID]);
    }

    public function getUserDataByEmail($userEmail)
    {
        $query = $this->db->table('tb_users')
                          ->select('*')
                          ->join('tb_users_roles', 'tb_users_roles.id = tb_users.role_id')
                          ->where('tb_users.email', $userEmail);
        
        return $query->get()->getResultArray();
    }

    public function getRoles()
    {
        $query = $this->db->table('tb_users_roles')
                          ->select('*');
        
        return $query->get()->getResultArray();
    }


    // public function getAllUsers()
    // {
    //     $query = $this->db->table('tb_users')->select('*');
        
    //     return $query->get()->getResultArray();
    // }

    #-------------------------------------------------------------------------#

    // public function getUserDataByUsername($username) 
    // {
    //     $query = $this->db->table('users')
    //                 ->select('
    //                     users.*,
    //                     users_roles.name as roleName,
    //                     users_roles.permissions as permissions
    //                 ')
    //                 ->join('users_roles', 'users_roles.id = users.roleID')
    //                 ->where('users.username', $username);

    //     return $query->get()->getResultArray();
    // }

    // public function getAllRoles() 
    // {
    //     $query = $this->db->table('users_roles')
    //                 ->select('*')
    //                 ->where('display', TRUE);

    //     return $query->get()->getResultArray();
    // }

    // public function getAllUsers() 
    // {
    //     $query = $this->db->table('users')
    //                 ->select('
    //                     users.*,
    //                     users_roles.name as roleName
    //                 ')
    //                 ->join('users_roles', 'users_roles.id = users.roleID');

    //     return $query->get();
    // }

    // public function getUserByUsername($username) 
    // {
    //     $query = $this->db->table('users')
    //                 ->select('*')
    //                 ->where('username', $username);

    //     return $query->get();
    // }

    // public function getUserByEmail($email) 
    // {
    //     $query = $this->db->table('users')
    //                 ->select('*')
    //                 ->where('email', $email);

    //     return $query->get();
    // }

    // public function getUserByID($id) 
    // {
    //     $query = $this->db->table('users')
    //                 ->select('*')
    //                 ->where('id', $id);

    //     return $query->get();
    // }

    // public function createNewUser($data) 
    // {
    //     $this->db->table('users')->insert($data);
    // }
    
    // public function updateUser($id, $data) 
    // {
    //     $this->db->table('users')->update($data, [
    //         "id" => $id,
    //     ]);
    // }
    
}