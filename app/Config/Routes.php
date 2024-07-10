<?php

use CodeIgniter\Router\RouteCollection;


/**
 * @var RouteCollection $routes
 */


        //For all the routes except taking data from database
        //Auto-routing
        $routes->setAutoRoute(true);

        //localhost page 
        $routes->get('/', 'Customer::login');



       
       //CRUD Route definitios 
        $routes->get('admin/customers', 'Admin::showCustomers');
        $routes->get('admin/customer_details', 'Admin::customerDetails');
        $routes->get('admin/delete/(:num)', 'Admin::delete/$1');
        $routes->post('admin/confirmDelete', 'Admin::confirmDelete');
        $routes->get('admin/editCustom/(:num)','Admin::editCustom/$1'); 
        $routes->post('admin/updateCustom','Admin::updateCustom'); 

        $routes->get('customer/messagehistory','Dashboard::showMessages'); 

        $routes->get('dashboard/messageDetails', 'Dashboard::openMessage');

        $routes->get('admin/UserMessages','Admin::UserMessages');
        $routes->get('admin/messagehistory','Admin::messageDetails'); 
        $routes->get('admin/allMessageHistory','Admin::viewAllMessages'); 
        $routes->get('admin/showMessage','Admin::messageDetails'); 
      

        
       
       






    
    
