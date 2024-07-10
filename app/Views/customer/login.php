<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Login Page</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



</head>

<body class="p-5 m-0 border-0  m-0 border-0" style="background-color: #74917e">
   

    
 <!-- Navbar -->
<nav class="navbar navbar-expand  fixed-top " style="background-color: white">
    <div class="container-fluid">
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <button class="btn btn-dark btn-lg" type="button" data-bs-toggle="modal" data-bs-target="#newMessageModal">Customer</button>
                </li>
                <li class="nav-item mx-4 mt-2">
                   <a class="navbar-brand" href="<?= site_url('admin/login')?>">Admin</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

        <div class="container mt-5 me-1 ms-5 " >
    <div class="row justify-content-center align-items-center" >
        <div class="col-md-6 offset-md-3 ">
            <div class="card text-bg-light p-3">
                <div class="card-header text-center text-bg-light p-3">
                    CUSTOMER LOGIN
                </div>
                <div class="card-body" style="background-color: #FFFFFF">
    <div class="container ">
        <div class="row mt-3 ">
            <div class="col-md-4 offset-4" style="color: #000000">
                <h4>
                   Login into your account
                </h4>
                <hr>
                
                <?php 
                    if(!empty(session()->getFlashData('success'))){
                        ?>
                        <div class="alert alert-success">
                           <?=
                           session()->getFlashData('success')
                            ?>
                         
                        </div>


                        <?php
                    }else if(!empty(session()->getFlashData('fail'))){
                        ?>
                        <div class="alert alert-danger">
                           <?=
                           session()->getFlashData('fail')
                            ?>
                         
                        </div>
                        <?php
                    }
                
                
                
                
                ?>

                <form action="<?= base_url('customer/loginUser')?>"
                    method="post"

                class="form mb-3">
                    <div class="form-group mb-3">

                    <?= csrf_field(); ?>
                        
                    
                    <label for="">E-mail</label>
                    <input type="text" 
                           class="form-label"
                           value="<?= set_value('email'); ?>"
                           name="email"
                           
                           placeholder="Email Here">
                           <span class="text-danger text-sm">
                            <?= isset($validation) ? display_form_errors($validation,'email') : '' ?>
                           </span>
                    </div>

                    <div class="form-group mb-3">
                        
                    
                        <label for="">Password</label>
                        <input type="password" 
                               class="form-label"
                               value="<?= set_value('password'); ?>"
                               name="password"
            
                               placeholder="Password Here">
                               <span class="text-danger text-sm">
                            <?= isset($validation) ? display_form_errors($validation,'password') : '' ?>
                           </span>
                        </div>

                        <div class="form-group mb-3 ">
                        <div class="d-flex justify-content-end">
                    
                       
                            <input type="submit" 
                               class="btn btn-dark"
                               value="login">
                        </div> 
                        </div>
                </form>
                <br>
               <a href="<?= site_url('customer/register');?>" class="link-primary link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">
                      New Account 
               </a>
               <br>
               <a href="<?= site_url('customer/lostpassword');?>"  class="link-danger link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">
                      Lost my Password
               </a>
            </div>
        </div>
                
    </div>
                
</body>
</html>