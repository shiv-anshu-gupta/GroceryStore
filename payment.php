<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payment Options</title>
    
    <!-- Bootstrap CSS Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Choose Your Payment Method</h2>
        
        <div class="row justify-content-center mt-4">
            <div class="col-md-5">
                <div class="card mb-3">
                    <div class="card-header text-center">
                        Cash Payment
                    </div>
                    <div class="card-body text-center">
                        <p>Please choose cash payment if you want to pay in person.</p>
                        <a href="cash_payment.php" class="btn btn-primary">Proceed to Cash Payment</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card mb-3">
                    <div class="card-header text-center">
                        Online Payment
                    </div>
                    <div class="card-body text-center">
                        <p>Select online payment for quick and easy transactions.</p>
                        <a href="online_payment.php" class="btn btn-success">Proceed to Online Payment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-l01qLZpD27o5F6zWgl4S5F4E97F6cW0X1nt13INc5kT1GzR4Ys4yQ1WvnU8aTj49" crossorigin="anonymous"></script>
</body>
</html>
