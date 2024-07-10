<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Delete User</title>
</head>
<body style="background-color: #114232">


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="border p-5 border-white">
                    <div class="text-center mb-4">
                        <p style="color:white">Are you sure?</p>
                    </div>
                    <div class="d-flex justify-content-center">
                       <form action="<?= site_url('/admin/confirmDelete') ?>"  method="post">
                       <input type="hidden" name="customer_id" value="<?= session()->get('pending_delete_id') ?>">
                       <button class="btn btn-danger me-2">Yes, Delete</button>
                       </form>
                       <a href="<?= site_url('/admin/customer_details?id=' . session()->get('pending_delete_id')); ?>" class="btn btn-success">Cancel</a>

                    </div>
                    
                </div>
            </div>
        </div>
        
    </div>
   
</body>
</html>