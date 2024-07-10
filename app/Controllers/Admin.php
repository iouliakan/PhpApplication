<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AdminModel; 
use App\Libraries\Hash;
use App\Models\UserModel; 

class Admin extends BaseController
{
    
    
    //Enabling features 
    public function __construct()
    {
        helper(['url','form']); 
    }
    
    
    
    //Responsible for login page view 
     public function login()
    {
        return view('admin/login'); 
    }

   

    //Responsible for Admin dashboard

    public function dashboard()
    {
        return view('admin/dashboard'); 
    }

    //Responsible for admins customers
    public function customers()
    {
        return view('admin/customers'); 
    }

     //Responsible for admins customers details
     public function customer_details()
     {
         return view('admin/customer_details'); 
     }

     
     //Responsible for message history of customers
     public function messagehistory()
     {
         return view('admin/messagehistory'); 
     }

     //Delete user view page
     public function deleteCustomer()
     {
         return view('admin/deleteCustomer'); 
     }

     //Edit user view page
     public function editCustomer()
     {
         return view('admin/editCustomer'); 
     }

     
    

    public function loginAdmin() {

        $validated = $this->validate([
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
                        'min_length' => 'Password must be 5 characters long', 
                        'max_length' => 'Password cannot be longer than 20 characters ' 
                    ], 
                    ], 

                ]); 

                
                if(!$validated) {
                    return view('admin/login',['validation' => $this->validator]); 
                 }
                 else {

                    $email = $this->request->getPost('email'); 
                    $password = $this->request->getPost('password');


                    $adminModel = new AdminModel(); 

                    $adminInfo = $adminModel->where('email',$email)->first();

                    if ($adminInfo !== null) {
                        $checkPassword = password_verify($password, $adminInfo['password']);
                    
                        if (!$checkPassword) {
                            //password is wrong
                            session()->setFlashdata('fail', 'Incorrect password provided');
                            return redirect()->to('admin/login');
                        } else {
                            //Process admin info
                               $adminId = $adminInfo['id']; 

                            session()->set('loggedInAdmin', $adminId); 
                            return redirect()->to('admin/dashboard'); 
                        }
                    }   else {
                        // admin does not exist
                        session()->setFlashdata('fail', 'No admin found with that email address');
                        return redirect()->to('admin/login');


                        
                    }
                                
                }

                 }


                
                
            public function updateAdmin() {
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
                        return view('admin/dashboard',['validation' => $this->validator]); 
                     }
                     else {
                         $adminModel = new AdminModel();
                     
                         $password = $this->request->getPost('password');
                         $session = session();
                         $session->set('adminPassword', $password); //for reset password


                         $id = session()->get('loggedInAdmin');  
                         $data = [
                             'name' => $this->request->getPost('name'), 
                             'lastname' => $this->request->getPost('lastname'), 
                             'email' => $this->request->getPost('email'), 
                             'password' => Hash::encrypt($this->request->getPost('password')), 
                         ];
                 
                         //update data
                         $update = $adminModel->update($id, $data);
                         
                         if($update) {
                             session()->setFlashdata('success', 'Admin details are updated successfully.');
                             return redirect()->to('admin/dashboard'); 
                         } else {
                             session()->setFlashdata('fail', 'Something went wrong');
                             return redirect()->back();
                         }
                     }
                 }
                

                 public function showCustomers() {
                    $userModel = new \App\Models\UserModel();
                    $data['customers'] = $userModel->readAllCustomers();
                    return view('admin/customers', $data);
                }

                 //For customer details
                public function CustomerDetails() {
                    $id = $this->request->getGet('id');
                    $userModel = new \App\Models\UserModel();
                    $data['customer'] = $userModel->customerDetails($id); //from UserModel
                    return view('admin/customer_details', $data);
                }


            //edit view of a particular customer
             public function editCustom($id = null) {

                $id = $this->request->getGet('id');

               if($id != null) {
                session()->set('customer_id',$id);
                return redirect()->to(site_url('admin/editCustomer'));
               }
             
               
              return redirect()->to(site_url('admin/customers'));
            }

            //update the data of a particular customer
            public function updateCustom() {
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
                    return view('admin/editCustomer',['validation' => $this->validator]); 
                } else {
                    $id = $this->request->getPost('customer_id');
                    
                    $data = [
                        'name' => $this->request->getVar('name'), 
                        'lastname' => $this->request->getVar('lastname'), 
                        'email' => $this->request->getVar('email'), 
                        'password' => Hash::encrypt($this->request->getVar('password')), 
                    ];
            
                  //  $userModel = null; 
                    if($id !== null) {
                        $userModel = new \App\Models\UserModel();
                        $userModel->where('id', $id)->update($id,$data); 
                    }
                }
                
                
                if($userModel) {
                    session()->setFlashdata('success', 'Customer details are updated successfully.');
                    return redirect()->to('admin/editCustomer'); 
                } else {
                    session()->setFlashdata('fail', 'Something went wrong');
                    return redirect()->back();
                }
                session()->remove('customer_id');
            }
            
                 
             


                 //Admin can delete a customer from database 
                public function delete($id=null) {

                      $id = $this->request->getGet('id');
                    
                    if ($id !== null) {
                        session()->set('pending_delete_id', $id);

                        //Confirm page
                        return redirect()->to(site_url('admin/deleteCustomer'));

                    }
                    
                    
                     return redirect()->to(site_url('admin/customers')); 

                }
                 
                public function confirmDelete() {
                    $id = $this->request->getPost('customer_id'); 

                    if($id !== null) {
                    $messageModel = new \App\Models\MessagesModel();
                    $messageModel->where('customer_id', $id)->delete();
                    
                    $userModel = new \App\Models\UserModel();
                    $userModel->where('id', $id)->delete();

                    session()->remove('pending_delete_id');

                    }
                    return redirect()->to(site_url('admin/customers'));
                }
                       
                //for message history view page
                public function UserMessages() {
    
                    
                    $customer_id = $this->request->getGet('id');
                    $messageModel = new \App\Models\MessagesModel();
                    $data['messages'] = $messageModel->getUserMessages($customer_id); //from MessagesModel
                    return view('admin/messagehistory',$data); 


                }
                //for  the messageDetails view page
                public function messageDetails()
                {
                    $message_id = $this->request->getGet('id'); //id of a specific message(not the customer_id); 
                    $messageModel = new \App\Models\MessagesModel();
                    $data['messageDetails'] = $messageModel->getMessageDetails($message_id); //from MessagesModel
                    return view('admin/messageDetails',$data);
                }


                //For the messages of all customers
                public function viewAllMessages($customerId = null) {
                    $messageModel = new \App\Models\MessagesModel();
                    $data['allMessages'] = $messageModel->getAllMessages($customerId);
                    return view('admin/allMessageHistory', $data);
                    
                }

                //show the message of a specific client in showMessage view page 

                public function showMessage($messageId) {
                    $message_id = $this->request->getGet('id');
                    $messageModel = new \App\Models\MessagesModel();
                    $data['messageDetails'] = $messageModel->showMessageDetails($messageId); 
                    return view('admin/showMessage', $data); 
                    
                }


               

                //lost password for Admin. Admin can restore his password only after the update. 
                //I have used sessions  to perform password restoration. Bad practice for security reasons!
                public function lostpassword() {
                    $session = session();
                    $data = [];
                
                    
                    if ($this->request->getMethod() == 'post') {
                        
                       
                        $rules = [
                            'email' => [
                                'label' => 'Email',
                                'rules' => 'required|valid_email',
                                'errors' => [
                                    'required' => 'Your email is required',
                                    'valid_email' => 'Enter a correct email address.'
                                ]
                            ],
                        ];
                
                        if ($this->validate($rules)) {
                            $adminModel = new AdminModel(); 
                            $email = $this->request->getVar('email');
                
                            // find user from email 
                            $admin = $adminModel->where('email', $email)->first();
                
                            // Check if admin was found
                            if ($admin) {
                                $token = bin2hex(random_bytes(50));
                                // Save the token using the user's ID
                                $adminModel->save_token($admin['id'], $token);
                
                                   
                                   $adminPassword = $session->get('adminPassword'); //from  updateAdmin method
                
                                $emailService = \Config\Services::email();
                                $emailService->setFrom('testprojectt178@gmail.com', 'Php Application');
                                $emailService->setTo($email);
                                $emailService->setSubject('Password Reset Request');
                                $emailService->setMessage('Your  password  is: ' .$adminPassword);
                
                              
                
                                 if ($emailService->send()) {
                                    $session->setFlashData('success', 'Please check your email to reset your password.');
                                } else {
                                    $session->setFlashData('fail', 'There was a problem sending the email.');
                                }
                            } else {
                                $session->setFlashData('fail', 'No user found with that email address.');
                            }
                        } else {
                            $data['validation'] = $this->validator;
                        }
                    }
                    return view('admin/lostpassword', $data);
                       }
                


               




                }
                    
                   
 
    

