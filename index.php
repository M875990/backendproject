<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Connection Module</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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

    <!-- Login Form -->
    <div id="login-form" class="auth-form">
        <form>
            <h1>Login</h1>
            <div class="form-group">
                <label for="login-username">Username:</label>
                <input type="text" class="form-control" placeholder="username" name="login-username" required>
            </div>
            <div class="form-group">
                <label for="login-password">Password:</label>
                <input type="password" class="form-control" placeholder="password" name="login-password" required>
            </div>
            <button type="button" class="btn signup-btn" onclick="handleSignup()">Register</button>
            <button type="button" class="btn login-btn" onclick="handleLogin()">Login</button>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        function isEmpty(str) {
    return !str.trim();
}

function handleLogin() {
    var username = $("input[name='login-username']").val();
    var password = $("input[name='login-password']").val();

    if (isEmpty(username) || isEmpty(password)) {
        alert("Please enter both username and password.");
        return;
    }

    $.ajax({
        url: "api.php",  
        type: "POST",
        data: { loginUsername: username, loginPassword: password },
        success: function(response) {
            if (response === "success") {
                window.location.href = "userprofile.php";
            } else {
                alert("Login failed. Please check your credentials.");
            }
        }
    });
}

        function handleSignup() {
            window.location.href = "register.php";

        }

        
    </script>
</body>
</html>
