<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'customers';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name','lastname','email','password','reset_token', 'token_expiration'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function save_token($id, $token) {
        $data = [
            'reset_token' => $token,
            'token_expiration' => date('Y-m-d H:i:s', strtotime('+1 hour')) //The link to restore password is active for one hour
        ];
        return $this->update($id, $data);
}

     public function readAllCustomers() {
     $db = \Config\Database::connect(); 
     $query = $db->query('select id,name,lastname,email,created_at,datetime from customers');
     $result = $query->getResult(); 
     if (count($result) > 0)
    {        return $result; 
    }
   else{
       return false; 
    }
     }

    public function customerDetails($id) {
        $db = \Config\Database::connect(); 
        $builder = $db->table('customers');
        $query = $builder->select('id, name, lastname, email, created_at, datetime')
               ->where('id', $id)
               ->get();
        $customer = $query->getRow();
        return $customer; 
        
  
    }

  

   


  

     


}
