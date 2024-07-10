<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit User</title>
</head>
<body style="background-color: #114232">



<nav class="navbar navbar-expand ">
    <div class="container-fluid">
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link"  aria-current="page" href="/admin/dashboard" style="color: white">My Profile</a>
                </li>
                <li class="nav-item">
                <a class="nav-link"  aria-current="page" href="/admin/customers" style="color: white">Customers</a>
                </li>
                <li class="nav-item">
                <a class="nav-link"  aria-current="page" href="/admin/allMessageHistory" style="color: white">All Message History</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-between mb-3">
            
               <?php 
                    if(!empty(session()->getFlashData('success'))){
                        ?>
                        <div  class="alert alert-success ">
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
                  </div>
                    </div>
                    </div>
                    



<div class="container">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3"> 
            <div class="d-flex justify-content-between mb-3">
                </div>
                <div class="text-center mb-4">
                    <h4 style="color: white">Edit Customer</h4>
                </div>
                <!-- Flash messages -->
                
                <form action="<?= site_url('/admin/updateCustom') ?>"  method="post">
                       <input type="hidden" name="customer_id" value="<?= session()->get('customer_id') ?>">

                    <?= csrf_field(); ?>
                    
                   
                    <div class="mb-3">
                        <label for="name" class="form-label" style="color: white">Name</label>
                        <input type="text" class="form-control" name="name" value="<?= set_value('name'); ?>" placeholder="Name Here">
                        <div class="text-danger"><?= isset($validation) ? display_form_errors($validation,'name') : '' ?></div>
                    </div>

                    
                    <div class="mb-3">
                        <label for="lastname" class="form-label"  style="color: white">Last Name</label>
                        <input type="text" class="form-control" name="lastname" value="<?= set_value('lastname'); ?>" placeholder="Last Name Here">
                        <div class="text-danger"><?= isset($validation) ? display_form_errors($validation,'lastname') : '' ?></div>
                    </div>

                    
                    <div class="mb-3">
                        <label for="email" class="form-label"  style="color: white">E-mail</label>
                        <input type="email" class="form-control" name="email" value="<?= set_value('email'); ?>" placeholder="Email Here">
                        <div class="text-danger"><?= isset($validation) ? display_form_errors($validation,'email') : '' ?></div>
                    </div>

                    
                    <div class="mb-3">
                        <label for="password" class="form-label"  style="color: white">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password Here">
                        <div class="text-danger"><?= isset($validation) ? display_form_errors($validation,'password') : '' ?></div>
                    </div>

                    
                    <div class="mb-3">
                        <label for="passwordConf" class="form-label"  style="color: white">Retype Password</label>
                        <input type="password" class="form-control" name="passwordConf" placeholder="Confirm Password Here">
                        <div class="text-danger"><?= isset($validation) ? display_form_errors($validation,'passwordConf') : '' ?></div>
                    </div>
                 

                    
                    <div class="text-end">
                        <input type="submit" class="btn btn-dark" value="Update">
                  
                    </div>
                </form>
            </div>
        </div>
        
    </div>
    
</body>
</html>