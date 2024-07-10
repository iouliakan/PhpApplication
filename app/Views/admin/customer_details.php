<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Customer details</title>

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
        <div class="border border-5 ps-5 pe-5 pt-3 pb-3"> 
            <div class="row">
                <div class="col-6">
                    <h5 style="color:white">Customer</h5>
                </div>
                <div class="col-6 text-end">
                    <p style="color:white">Last interaction: <?= $customer->datetime; ?></p>
                </div>
            </div>
            
            <div class="row mt-3">
                <div class="col-md-8">
                    <div class="border p-3">
                        <p style="color:white">Name: <?= $customer->name; ?><br>Last name: <?= $customer->lastname; ?><br>Email: <?= $customer->email; ?></p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-6">
                           <a href="/admin/delete?id=<?= $customer->id; ?>"> <button class="btn btn-danger w-100">DELETE USER</button></a>
                        </div>
                        <div class="col-6">
                            <a href="/admin/editCustom?id=<?= $customer->id; ?>"><button class="btn btn-secondary w-100">EDIT USER</button> </a>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <a href="/admin/UserMessages?id=<?= $customer->id; ?>"><button class="btn btn-primary w-100">Show The User's Messages</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>