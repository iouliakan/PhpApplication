<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset Form</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color: #789580">
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    Lost your password ? 

                </div>
                <div class="card-body">
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
                    <form action="<?= site_url('admin/lostpassword') ?>" method="post">
                    <?= csrf_field(); ?>
                        <p class="text-muted">Enter here your email and we will send you a link to generate your password again.</p>
                        <div class="form-group">
                            <label for="email">EMAIL</label>
                            <input type="text" 
                           class="form-control"
                           value="<?= set_value('email'); ?>"
                           name="email"
                           
                           placeholder="Email Here">
                           <span class="text-danger text-sm">
                            <?= isset($validation) ? display_form_errors($validation,'email') : '' ?>
                           </span>
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-3">Remind Me</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
