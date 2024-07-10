<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Libraries\Hash;
use App\Models\UserModel; 
use Config\Services;
use App\Models\MessagesModel; 



class Customer extends BaseController
{

    //Enabling features 
    public function __construct()
    {
        helper(['url','form']); 
    }

    //Responsible for register page view 
    public function register()
    {
        return view('customer/register'); 
    }

    //Responsible for login page view 
    public function login()
    {
        return view('customer/login'); 
    }


    //Responsible for email confirmation after the registry

    public function registryConfirm() {
        return view('customer/registrypage'); 
    }

    //Responsible for submit new Message view

    public function newmessage() {
        return view('customer/newMessage'); 
    }

    //Return dashboard
    public function dashboard() {
        return view('customer/dashboard'); 
    }

    //Responsible for messageHistory page view 
    public function messagehistory() {
        return view('customer/messageHistory'); 
    }    


   //Save new user to database 

   public function registerUser()
   {
         

        $validated = $this->validate([
            'name' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'Your  name is required', 
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
                            'min_length' => 'Password must be 5 characters long', 
                            'max_length' => 'Password cannot be longer than 20 characters ' 
                        ], 
                        ], 
                        'passwordConf' => [
                            'rules' => 'required|min_length[5]|max_length[20]|matches[password]', 
                            'errors' => [
                                'required' => 'Password confirmation is required',
                                'min_length' => 'Password must be 5 characters long', 
                                'max_length' => 'Password cannot be longer than 20 characters ', 
                                'matches' => 'Confirm password must match the password'
                            ], 
                        ], 


                    ]); 

         if(!$validated) {
            return view('customer/register',['validation' => $this->validator]); 
         }

         //Save the user 

         $name = $this->request->getPost('name'); 
         $lastname = $this->request->getPost('lastname');  
         $email = $this->request->getPost('email'); 
         $password = $this->request->getPost('password'); 
         $passwordConf = $this->request->getPost('passwordConf');  

         $session = session();
         $session->set('passwordId', $password); //For reset Password

         $data = [
            'name' => $name,
            'lastname'=> $lastname, 
            'email' => $email, 
            'password' =>Hash::encrypt($password)
            
         ]; 

         //Storing data
        $userModel =   new \App\Models\UserModel(); 
        $query = $userModel->insert($data); 

        if(!$query)
        {
            return redirect()->back()->with('fail','Saving user failed'); 

        }
        else 
        {

            //set up email 

           $emailService = \Config\Services::email();

           $emailService->setFrom('testprojectt178@gmail.com', 'Activate the account');
           $emailService->setTo($email);
           
           $message = 	"
           <html>
           <head>
               <title>Verification Code</title>
           </head>
           <body>
               <h2>Thank you for Registering.</h2>
               <p>Your Account:</p>
               <p>Email: ".$email."</p>
               <p>Password: ".$password."</p>
               <p>Register successfully</p>
			  
               
           </body>
           </html>
           ";
 
           
          $emailService->setSubject('Activate the account| PhpApplication.com');
          $emailService->setMessage($message);
         
         
         
        //sending email 

           if ($emailService->send()) {
            return redirect()->to('customer/registryConfirm')->with('success','Register successfully');
        } else {
            
            $data = $emailService->printDebugger(['headers', 'subject', 'body']);
            log_message('error', 'Failed to send email: ' . $data);
            return redirect()->to('customer/registryConfirm')->with('success', 'Register successfully but email sending failed.');
         


        }
            





   }
}
    
   //User Login method 
   public function loginUser()
   {

    //Validating user input 
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
                    return view('customer/login',['validation' => $this->validator]); 
                 }
                 else {
                    //Checking User details in databse 

                    $email = $this->request->getPost('email'); 
                    $password = $this->request->getPost('password'); 


                    $userModel = new UserModel(); 

                    //get the data
                    $userInfo = $userModel->where('email',$email)->first(); 

                    
                  

                    if ($userInfo !== null) {
                        $checkPassword = Hash::check($password, $userInfo['password']);
                    
                        if (!$checkPassword) {
                            //password is wrong
                            session()->setFlashdata('fail', 'Incorrect password provided');
                            return redirect()->to('customer/login');
                        } else {
                            //Process user info
                               $userId = $userInfo['id']; 

                            session()->set('loggedInUser', $userId); 
                            return redirect()->to('/dashboard'); 
                        }
                    }   else {
                        // user does not exist
                        session()->setFlashdata('fail', 'No user found with that email address');
                        return redirect()->to('customer/login');


                        
                    }
                                
                }

   }

 
public function lostpassword() {
    
    $data = [];

    $session = session();
    
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
            $userModel = new UserModel(); 
            $email = $this->request->getVar('email');

            // find user from email 
            $user = $userModel->where('email', $email)->first();

            // Check if the user was found
            if ($user) {
                $token = bin2hex(random_bytes(50));
                // Save the token using the user's ID
                $userModel->save_token($user['id'], $token);

                $session = session();
                $passwordId = $session->get('passwordId'); //from registerUser or updateUser method

                $emailService = \Config\Services::email();
                $emailService->setFrom('testprojectt178@gmail.com', 'PhpApplication');
                $emailService->setTo($email);
                $emailService->setSubject('Password Reset Request');
                $emailService->setMessage('Your  password is: ' . $passwordId. ' login Page: <a href="'.base_url().'/customer/login/'.$token.'">Login Page</a>. Make sure to change your password after logging in.');

              

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
    return view('customer/lostpassword', $data);
       }












 }