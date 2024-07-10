<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>All Message history</title>
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
                <button class="btn btn-outline-light btn-lg" type="button" data-bs-toggle="modal" data-bs-target="#newMessageModal">All Message History</button>
                </li>
            </ul>
        </div>
    </div>
</nav>







        <div class="container mt-5">
        <h2 style="color:white">Messages</h2>
        <div class="list-group">
        <?php $count = 1; ?>  
        <?php foreach ($allMessages as $message): ?>
       
            <a href="/admin/showMessage?id=<?= $message['message_id'] ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <span>Message: <?= $count++; ?> </span>
                <span>Submitted:<?= $message['created_at'] ?> </span>
              
            </a>
            <?php endforeach; ?>  
        </div>
    </div>
</body>
</html>