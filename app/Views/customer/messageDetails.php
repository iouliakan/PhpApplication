<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Message Details</title>
</head>
<body style="background-color: #1B4242">


<div class="container mt-3">
       
<nav class="navbar" style="background-color: #1B4242">
  <div class="container-fluid">
    <div class="d-flex justify-content-center mb-3 w-100">
      <div>
        <a href="/customer/dashboard"><button class="btn btn-outline-light mx-2" >My Profile</button></a>
        <a href="/customer/newmessage"><button class="btn btn-outline-light mx-2" >Submit New Message</button></a>
        <a href="/customer/messagehistory"><button class="btn btn-outline-light mx-2" >Message History</button></a>
      </div>

</nav>


    <div class="container mt-5 mb-5"> 
        <div class="border border-5 ps-5 pe-5 pt-3 pb-3"> 
            <div class="row">
                <div class="col-6">
                
                    <h5 style="color:white">Message: <?=($message->message); ?></h5>
                </div>
                <div class="col-6 text-end">
                    <p style="color:white">Submitted:<?= $message->created_at; ?> </p>
                </div>
            </div>

            
                
               
            </div>
        </div>
    </div>
</body>
</html>