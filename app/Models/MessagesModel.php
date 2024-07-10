<?php

namespace App\Models;

use CodeIgniter\Model;

class MessagesModel extends Model
{
    protected $table            = 'messages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['customer_id', 'message'];

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


    public function readAllMessages() {
        $session = session();
        $db = \Config\Database::connect(); 
        $customer_id = $session->get('loggedInUser'); 

        $builder = $db->table('messages');
        $query = $builder->select('id,message,created_at')
              ->where( 'customer_id',$customer_id )
              ->orderBy('created_at', 'ASC') //Sorting by the last message
              ->get();
      
        $result= $query->getResult(); 
        return $result; 
    }
    

    public function messageDetails($id){
        $session = session();
        $db = \Config\Database::connect(); 
        $customer_id = $session->get('loggedInUser'); 
        $builder = $db->table('messages');
        
        $query = $builder->select('message,created_at')
        ->where('id', $id)
        ->get();
        $message = $query->getRow();
        return $message; 

    }

    
    //For admin 
    public function getUserMessages($customer_id) {

        $db = \Config\Database::connect(); 
        $builder = $db->table('messages');
        $query = $builder->select('messages.id, messages.message, messages.created_at, customers.name, customers.LastName, customers.email')
                 ->join('customers', 'customers.id = messages.customer_id')
                 ->where('messages.customer_id', $customer_id)
                 ->get();
        $messages = $query->getResultArray();
        return $messages;

    }

    //get messages of a specific id 
    public function getMessageDetails($message_id) {
        $db = \Config\Database::connect(); 
        $builder = $db->table('messages');
        $query = $builder->select('messages.id, messages.message, messages.created_at, customers.name, customers.LastName, customers.email')
                 ->join('customers', 'customers.id = messages.customer_id')
                 ->where('messages.id', $message_id) 
                 ->get();
        return $query->getRowArray(); 
    }

    // Messages of all customers  for allMessageHistory page
 
    public function getAllMessages() {
        $db = \Config\Database::connect();
        $builder = $db->table('messages');
        $query = $builder->select('messages.id AS message_id, messages.message, messages.created_at, customers.name, customers.LastName, customers.email')
        ->join('customers', 'customers.id = messages.customer_id')
        ->orderBy('messages.created_at', 'DESC')
        ->get(); 
    
        return $query->getResultArray();
       }


       public function showMessageDetails($messageId) {
        $db = \Config\Database::connect();
        $builder = $db->table('messages');
        $query= $builder->select('messages.*, customers.id AS customerId, customers.name, customers.LastName, customers.email')
             ->join('customers', 'customers.id = messages.customer_id')
             ->where('messages.id', $messageId)
            ->get();

        return $query->getResultArray();

}
}
