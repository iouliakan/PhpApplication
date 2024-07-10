<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Message history</title>

</head>
<body>
<div class="container mt-3">
        <div class="d-flex justify-content-between">
           <a href="/admin/dashboard"><button class="btn btn-outline-primary">My Profile</button> </a>
            <a href="/admin/customers"><button class="btn btn-outline-primary">Customers</button> </a>
            <a href="/admin/allMessageHistory"> <button class="btn btn-outline-primary">All Message History</button> </a>
        </div>
    </div>
    <div class="container mt-5 mb-5"> 
    <div class="border border-5 p-2"> 
        <div class="border-bottom pb-2 "> 
            <div class="row">
                <div class="col-6">
                
                    <h5>Message: <?= $messageDetails['id'] ?></h5>
                   
                </div>
                <div class="col-6 text-end">
                    <p>Last interaction: <?= $messageDetails['created_at'] ?>  </p>
                </div>
            </div>
        </div>  

        
        <div class="container mt-5 mb-5">
    <div class="row mt-3">
        <div class="col-md-4">
            <h6>USER</h6> 
            <div class="border p-1">
                <p>Name:<?= $messageDetails['name'] ?> <br>Last name: <?= $messageDetails['LastName'] ?><br>Email:<?= $messageDetails['email'] ?> </p> 
            </div>
        </div>

        <div class="col-md-8">
            <h6>Message:</h6> 
            <div class="border pt-2 pb-5 pl-5 pr-5 form-control ">
            <?= $messageDetails['message'] ?>
           
        </div>
            
        </div>
        
    </div>
    
</div>
    

</body>
</html>