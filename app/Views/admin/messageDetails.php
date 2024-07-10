<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Message history</title>

</head>
<body style="background-color: #114232">
<!-- Navbar -->
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







    <div class="container mt-5 mb-5"> 
    <div class="border border-5 p-2"> 
        <div class="border-bottom pb-2 "> 
            <div class="row">
                <div class="col-6">
                
                    <h5 style="color: white">Message: <?= $messageDetails['id'] ?></h5>
                   
                </div>
                <div class="col-6 text-end">
                    <p style="color: white">Last interaction: <?= $messageDetails['created_at'] ?>  </p>
                </div>
            </div>
        </div>  

        
        <div class="container mt-5 mb-5">
    <div class="row mt-3">
        <div class="col-md-4">
            <h6 style="color: white">USER</h6> 
            <div class="border p-1">
                <p style="color: white">Name:<?= $messageDetails['name'] ?> <br>Last name: <?= $messageDetails['LastName'] ?><br>Email:<?= $messageDetails['email'] ?> </p> 
            </div>
        </div>

        <div class="col-md-8">
            <h6 style="color: white">Message:</h6> 
            <div class="border pt-2 pb-5 pl-5 pr-5 form-control ">
            <?= $messageDetails['message'] ?>
           
        </div>
            
        </div>
        
    </div>
    
</div>
    

</body>
</html>