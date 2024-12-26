<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #317AF0;
        }

        .login-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .login-form-container {
            padding: 30px;
        }

        .login-btn-custom {
            background-color: #007bff;
            color: #ffffff;
        }

        .login-btn-custom:hover {
            background-color: #0056b3;
        }

        .form-text-muted {
            color: #6c757d;
        }
    </style>
    <title>Admin Login</title>
</head>
<body>

<div class="container">
    <div class="row justify-content-center"> <!-- Added 'justify-content-center' class to center the column -->
        <div class="col-md-6"> <!-- Adjusted the column width to medium (col-md-6) for better responsiveness -->
            <div class="col p-5 login-container">
               <div class="w-100 text-center"> <img src="images/logo.png" alt=""></div>
                <!-- <h2 class="text-center mb-4">Admin Login</h2> -->
                <form method="POST" action="functions/authcode.php" class="login-form-container">
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter email" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                            placeholder="Password" required>
                    </div>

                    <div class="fluid text-center">
                        <button  type="submit" name="loginbtn" class="btn w-100 btn-primary login-btn-custom">Log In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

</body>
</html>
