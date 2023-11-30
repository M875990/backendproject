<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Additional head content as in your original code -->
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
            margin-left: -20px;
            margin-right: -20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        #profile-container {
            max-width: 600px;
            margin: 0 auto;
        }

        #friends-updates, #status-update-form {
            margin-bottom: 20px;
        }

        #friends {
            background-color: lightgray;
            color: black;
            margin-left: 1200px;
        }

        #logout {
            background-color: lightgray;
            color: black;
            margin-left: 10px;
        }

        h1 {
            text-align: left;
            font-size: 22px;
            margin-left: 10px;
        }

        .btn-primary {
            text-align: center;
            background-color: rgb(24, 204, 24);
        }

        /* Mobile responsiveness */
        @media (max-width: 767px) {
            #friends, #logout {
                margin-left: 0;
            }

            #friends, #logout, h1 {
                margin-top: 10px;
            }
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>


<header>
    <h1>User Name</h1>
    <a href="friends-page.php" id="friends" class="btn btn-secondary">Friends</a>
    <a href="index.php"><button type="button" id="logout" class="btn btn-secondary" onclick="logout()">Logout</button></a>
</header>

<div id="profile-container">

    <!-- Friends Updates Section -->
    
    <div id="friends-updates">
        <h2>Updates</h2><br><br>
        <label>Update from <?php echo $id; ?></label><br>
        <input type="text" value="<?php echo $updatetext; ?>" readonly><br><br>
    </div>


    <!-- Status Update Form -->
    <div id="status-update-form">
        <h2>Post a New Update</h2><br>
        <form id="update-form">
            <div class="form-group">
                <textarea class="form-control" id="update-text" rows="3" maxlength="200"></textarea>
            </div>
            <button type="button" class="btn btn-primary" onclick="postUpdate()">Post</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
   
        function displayFriendsUpdates() {
        const updatesList = $('#updates-list');
        updatesList.empty();

        const sortedUpdates = friendsUpdates.sort((a, b) => b.timestamp - a.timestamp);

        const updatesToDisplay = sortedUpdates.slice(0, 20);

        updatesToDisplay.forEach(update => {
            updatesList.append(`<li><strong>${update.friend}:</strong> ${update.update}</li>`);
        });
    }
    

    function postUpdate() {
        const updateText = $('#update-text').val().trim();

        if (updateText !== 'update-text') {
            // Send data to the server using AJAX
            $.ajax({
                type: 'POST',
                url: 'processfile.php',
                data: { updatetext: updateText },
                success: function(response) {
                    friendsUpdates = response; // Update the global variable
                    displayFriendsUpdates();
                    $('#update-text').val('');
                },
                error: function(error) {
                    console.error('Error posting update:', error);
                }
            });
        }
    }

   function logout() {
        // Add logic to remove user session and redirect to logout
        window.location.href = 'index.php';
    }

    displayFriendsUpdates();
</script>

</body>
</html>
