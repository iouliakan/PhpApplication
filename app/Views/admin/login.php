<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login Page</title>
</head>
<body class="p-5 m-0 border-0  m-0 border-0" 
    style="background-image: url('/assets/nancy-hughes-SQeNe3Xas4w-unsplash.jpg'); 
    background-position: center;">


       
 <!-- Navbar -->
 <nav class="navbar navbar-expand  fixed-top " style="background-color: white">
    <div class="container-fluid">
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item ">
            <button class="btn btn-dark btn-lg" type="button" data-bs-toggle="modal" data-bs-target="#newMessageModal">Admin</button>
                </li>
                <li class="nav-item mx-4 mt-2">
                <a class="navbar-brand" href="<?= site_url('customer/login')?>">Customer</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

        <div class="container mt-5 ">
          <div class="row">
            <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header text-center">
                    ADMIN LOGIN
                </div>
                <div class="card-body">


    <div class="container">
        <div class="row mt-3 ">
            <div class="col-md-4 offset-4">
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

                <form action="<?= base_url('admin/loginAdmin')?>"
                    method="post"

                class="form mb-3">
                    <div class="form-group mb-3">

                    <?= csrf_field(); ?>
                        
                    
                    <label for="">E-mail</label>
                    <input type="text" 
                           class="form-control"
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
                               class="form-control"
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
               <a href="<?= site_url('admin/lostpassword');?>">
                      Lost my Password
               </a>
            </div>
        </div>
                
    </div>
</body>
</html>