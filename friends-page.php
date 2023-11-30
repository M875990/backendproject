<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friends Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
            background-color: rgb(183, 233, 183);
        }

        header {
            background-color: grey;
            color: #fff;
            padding: 9px;
            text-align: right;
            margin-top: -20px;
            margin-bottom: 20px;
            margin-left: -20px; ;
            margin-right: -20px ;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            display: block;
        }

        header a {
            padding: 20px;
        }

        .Friend {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .Friend > div {
            flex: 1;
            margin-left: 100px;
            margin-right: 100px; 
        }

        .user-card {
            background-color: #f8f9fa;
            padding: 5px;
            margin-bottom: 10px;
            border-radius: 5px;
            display: flex;
            justify-content:center;
            align-items: center;
        }

        .user-card button {
            margin-left: 20px;
        }

        .btn-yes {
            background-color: lightgreen;
        }

        .btn-no {
            background-color: lightgrey;
        }

        .btn-add-friend {
            background-color: blue;
            color: white;
        }
        .Friend label {
            text-align: center;
            display: block;
            font-size: large;
        }
        
        #username {
             background-color: lightgray; 
             color: black;
             margin-left: 20px;
        }

        #logout {
            background-color: lightgray; 
             color: black;
             margin-left: 30px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<header>
    <a href="profile.php"><button type="button" id="username" class="btn btn-secondary">Username</button></a>

    <!-- Logout Button -->
    <a href="index.php"><button type="button" id="logout" class="btn btn-secondary" onclick="logout()">Logout</button></a>

</header>
<body>

   

<div class="Friend">
    <div> 
        <label>Friend Requests</label>
    <div id="friend-requests">
       
        <!-- <h2>Friend Requests</h2> -->
    </div>
</div>

    <div>
        <label>Friends</label>
    <div id="friends-list">
        <!-- <h2>Friends</h2> -->
    </div>
</div>
    <div>
    <label>All Users</label>
    <div id="all-users">
        <!-- <h2>All Users</h2> -->
    </div>
</div>
</div>
<script>
    let friendRequestsData = [
        { id: 1, username: 'User1' },
        { id: 2, username: 'User2' },
    ];

    const friendsListData = [
        { id: 3, username: 'Friend1' },
        { id: 4, username: 'Friend2' },
    ];

    const allUsersData = [
        { id: 5, username: 'User3' },
        { id: 6, username: 'User4' },
    ];

    function renderFriendRequests() {
        const friendRequestsContainer = $('#friend-requests');
        friendRequestsContainer.empty();

        friendRequestsData.forEach(user => {
            const card = createUserCard(user);
            card.append(createButton('Yes', () => handleFriendRequest(user.id, true), 'btn-yes'));
            card.append(createButton('No', () => handleFriendRequest(user.id, false), 'btn-no'));
            friendRequestsContainer.append(card);
        });
    }

    function renderFriendsList() {
        const friendsListContainer = $('#friends-list');
        friendsListContainer.empty();

        friendsListData.forEach(user => {
            const card = createUserCard(user);
            friendsListContainer.append(card);
        });
    }

    function renderAllUsers() {
        const allUsersContainer = $('#all-users');
        allUsersContainer.empty();

        allUsersData.slice(0, 20).forEach(user => {
            const card = createUserCard(user);
            card.append(createButton('Add Friend', () => sendFriendRequest(user.id), 'btn-add-friend'));
            allUsersContainer.append(card);
        });
    }

    function createUserCard(user) {
        const card = $('<div class="user-card"></div>');
        card.append(`<span>${user.username}</span>`);
        return card;
    }

    function createButton(text, onClick, buttonClass) {
        const button = $(`<button class="btn ${buttonClass}">${text}</button>`);
        button.click(onClick);
        return button;
    }

    function handleFriendRequest(userId, accept) {
        if (accept) {
            console.log(`Accepted friend request from user ${userId}`);
        } else {
            console.log(`Rejected friend request from user ${userId}`);
        }

        friendRequestsData = friendRequestsData.filter(user => user.id !== userId);
        renderFriendRequests();
    }

    function sendFriendRequest(userId) {
        console.log(`Sent friend request to user ${userId}`);

    }

    function logout() {
        
        localStorage.removeItem('userToken'); 
        window.location.href = 'index.php';
    }

    renderFriendRequests();
    renderFriendsList();
    renderAllUsers();
</script>

</body>
</html>
