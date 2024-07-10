<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body style="background-color: #e4ece1">



    <div class="container">
        <div class="row mt-3">
            <div class="col-md-4 offset-4">
                <h4>
                   Registry Page
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

                 <form action="<?= base_url('customer/registerUser')?>" 
                    method="post"

                class="form mb-3">
                <?= csrf_field(); ?>
                  
                <div class="form-group mb-3">                    
                    <label for="">Name</label>
                    <input type="text" 
                           class="form-control"
                           name="name"
                           value="<?= set_value('name'); ?>"
                           placeholder="Name Here">
                           <span class="text-danger text-sm">
                            <?= isset($validation) ? display_form_errors($validation,'name') : '' ?>
                           </span>
                    </div>

                    <div class="form-group mb-3">                    
                    <label for="">Last Name</label>
                    <input type="text" 
                           class="form-control"
                           name="lastname"
                           value="<?= set_value('lastname'); ?>"
                           placeholder="Last Name here">
                           <span class="text-danger text-sm">
                            <?= isset($validation) ? display_form_errors($validation,'lastname') : '' ?>
                           </span>
                    </div>
                
     
                
                <div class="form-group mb-3">                    
                    <label for="">E-mail</label>
                    <input type="text" 
                           class="form-control"
                           name="email"
                           value="<?= set_value('email'); ?>"
                           placeholder="Email Here">
                           <span class="text-danger text-sm">
                            <?= isset($validation) ? display_form_errors($validation,'email') : '' ?>
                           </span>
                    </div>

                    <div class="form-group mb-3">
                        
                    
                        <label for="">Password</label>
                        <input type="password" 
                               class="form-control"
                               name="password"
                               value="<?= set_value('password'); ?>"
                               placeholder="Password here">
                               <span class="text-danger text-sm">
                            <?= isset($validation) ? display_form_errors($validation,'password') : '' ?>
                           </span>
                        </div>

                        <div class="form-group mb-3">
                        
                        <div class="form-group mb-3">
                        
                    
                        <label for="">Retype Password</label>
                        <input type="password" 
                               class="form-control"
                               name="passwordConf"
                               value="<?= set_value('passwordConf'); ?>"
                               placeholder="Confirm password here">
                               <span class="text-danger text-sm">
                            <?= isset($validation) ? display_form_errors($validation,'passwordConf') : '' ?>
                           </span>
                        </div>
                       
                        <input type="submit" 
                               class="btn btn-dark"
                               value="Registry">
                              
                        </div>
                </form>
                <br>
                <a href="<?= site_url('customer/login');?>" class="link-primary link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">
                      I already have an account, login
               </a>

            </div>
        </div>
    </div>
</body>
</html>