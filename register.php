
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Add your custom styles if needed -->
    <style>
        body {
            padding: 20px;
            background-color: rgb(183, 233, 183);
        }
        header {
            background-color: grey;
            color: #fff;
            padding: 10px;
            text-align: center;
            margin-top: -20px;
            margin-bottom: 20px;
            margin-left: -20px; ;
            margin-right: -20px ;
        }
        h1 {
            text-align: center;
            font-size: larger;
        }
        .auth-form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        button {
            border: 15px;
            color: white;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 2px 48px;
            cursor: pointer;
        }
        .login-btn {
            background-color: #007bff;
        }
        .signup-btn {
            background-color: #28a745;
        }
        #user-list {
            max-width: 600px;
            margin: 0 auto;
        }
        #users {
            list-style: none;
            padding: 0;
        }
        #users li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Social Connection Module</h1>
    </header>
    
    <!-- Register Form -->
    <div id="signup-form" class="auth-form">
        <form>
            <h1>Register</h1>
            <div class="form-group">
                <label for="signup-email">Email:</label>
                <input type="email" class="form-control" placeholder="email" name="signupEmail" required>
            </div>
            <div class="form-group">
                <label for="signup-username">Username:</label>
                <input type="text" class="form-control" placeholder="username" name="signupUsername" required>
            </div>
            <div class="form-group">
                <label for="signup-password">Password:</label>
                <input type="password" class="form-control" placeholder="password" name="signupPassword" required>
            </div>
            <button type="button" class="btn login-btn" onclick="handleSignup()">Register</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        function handleSignup() {
            var signupEmail = $("#signup-form input[name='signupEmail']").val();
            var signupUsername = $("#signup-form input[name='signupUsername']").val();
            var signupPassword = $("#signup-form input[name='signupPassword']").val();

            if (!signupEmail || !signupUsername || !signupPassword) {
                alert("Please enter all fields.");
                return;
            }

            $.ajax({
                url: "api.php", 
                type: "POST",
                data: { signupEmail: signupEmail, signupUsername: signupUsername, signupPassword: signupPassword },
                success: function(response) {
                    if (response === "success") {
                        alert("Registration successful! Redirecting to login page.");
                        window.location.href = "index.php";
                    } else if (response === "exists") {
                        alert("User already exists. Please login.");
                    } else {
                        alert("Registration failed. Please try again.");
                    }
                }
            });
        }
    </script>
</body>
</html>
