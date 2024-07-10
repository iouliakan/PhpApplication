<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Message Page</title>
</head>
<body style="background-color: #1B4242">             
    <nav class="navbar navbar-expand ">
    <div class="container-fluid">
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" style="color: white" aria-current="page" href="/customer/dashboard">My Profile</a>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-light btn-lg" type="button" data-bs-toggle="modal" data-bs-target="#newMessageModal">Submit New Message</button>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white" href="/customer/messagehistory">Message History</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container ">
        <div class="row  mt-3 ">
            <div class="col-md-4 offset-md-4">
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
               
               </div>
                </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-12 mt-5">
                <form action="<?= base_url('dashboard/sendMessage') ?>" method="post">
                   <div class="mb-3" style="margin-bottom: 2rem !important;">
                      <label for="message" class="form-label" style="color: white">Message</label>
                      <textarea class="form-control" id="message" name="message" rows="6"></textarea>
                  </div>
                  <div class="text-end">
                     <button type="submit" class="btn btn-light btn-lg">Send</button>
                  </div>
                </form>
            </div>
        </div>
    </div>

   
</body>
</html>
