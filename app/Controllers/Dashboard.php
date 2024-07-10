<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel; 
use App\Libraries\Hash;



//All functions related to the customer dashboard are located here

class Dashboard extends BaseController
{


     //Enabling features 
     public function __construct()
     {
         helper(['url','form']); 
     }
     public function index()
     {
         $userModel = new UserModel(); 
         $loggedInUserId = session()->get('loggedInUser');
         $userInfo = $userModel->find( $loggedInUserId);
        
        $data=[
            'title' => 'Dashboard', 
            'userInfo' => $userInfo, 
            
            
         ]; 
            return view('customer/dashboard', $data); 
     }

     //Responsible for messageDetails page
     public function messageDetails() {

        return view('customer/messageDetails');
     }
      
  
     public function updateUser()
     {
         $validated = $this->validate([
             'name' => [
                 'rules' => 'required', 
                 'errors' => [
                     'required' => 'Your name is required', 
                 ], 
             ],
             'lastname' => [
                 'rules' => 'required', 
                 'errors' => [
                     'required' => 'Your last name is required', 
                 ], 
             ],
             'email' => [
                 'rules' => 'required|valid_email', 
                 'errors' => [
                     'required' => 'Your email is required',
                     'valid_email' => 'Enter a correct email address.' 
                 ], 
             ], 
             'password' => [
                 'rules' => 'required|min_length[5]|max_length[20]', 
                 'errors' => [
                     'required' => 'Your password is required',
                     'min_length' => 'Password must be at least 5 characters long', 
                     'max_length' => 'Password cannot be longer than 20 characters' 
                 ], 
             ], 
             'passwordConf' => [
                 'rules' => 'required|matches[password]', 
                 'errors' => [
                     'required' => 'Password confirmation is required',
                     'matches' => 'Confirm password must match the password'
                 ], 
             ],
         ]); 
         
         if(!$validated) {
            return view('customer/dashboard',['validation' => $this->validator]); 
         }
         else {
             $userModel = new UserModel();
     
             $session = session();
             $id = session()->get('loggedInUser');  
             $password = $this->request->getPost('password'); 
             $session->set('passwordId', $password);

             $data = [
                 'name' => $this->request->getPost('name'), 
                 'lastname' => $this->request->getPost('lastname'), 
                 'email' => $this->request->getPost('email'), 
                 'password' => Hash::encrypt($this->request->getPost('password')), 
             ];
     
             //update data
             $update = $userModel->update($id, $data);
             
             if($update) {
                 session()->setFlashdata('success', 'User details are updated successfully.');
                 return redirect()->to('/dashboard'); 
             } else {
                 session()->setFlashdata('fail', 'Something went wrong');
                 return redirect()->back();
             }
         }
     }

     public function sendMessage() {
        $session = session(); 
        $messageModel = new \App\Models\MessagesModel();
    
        $customer_id = $session->get('loggedInUser'); 
        $message = $this->request->getVar('message'); 
    
        // customer does not exists
        if(!$customer_id) {
            
            return redirect()->to('/customer/login')->with('fail', 'You must be logged in to send a message.');
        }
    
        if($message) {
            $data = [
                'customer_id' => $customer_id,
                'message' => $message,
            ];
    
            $messageModel->insert($data);
            
            return redirect()->back()->with('success', 'Message sent successfully.');
        } else {
            
            return redirect()->back()->with('fail', 'You cannot send an empty message.');
        }
    }
    
    public function showMessages() {
        $session = session(); 
        $messageModel = new \App\Models\MessagesModel();
        $data['message'] = $messageModel->readAllMessages(); //from MessagesModel


        return view('customer/messagehistory', $data);

    }

    public function openMessage() {
        $session = session(); 
        $id = $this->request->getGet('id');
        $messageModel = new \App\Models\MessagesModel();
        $customer_id = $session->get('loggedInUser');
    
        $message =  $messageModel->messageDetails($id); 
    
        if (!$message) {
            return redirect()->back()->with('fail', 'Message not found');
        }
    
        return view('customer/messageDetails',['message' => $message]);
    }


    





    
     
}
