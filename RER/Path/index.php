<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pipes Hub - Welcome</title>
    <link rel="stylesheet" href="style(index).css"> <!-- Link to external CSS file -->
</head>
<body>
    <!-- Header with site name and buttons on the right -->
    <header>
        <div class="site-name">
            <h2>Pipes Hub</h2>
        </div>
        <div class="header-buttons">
            <div class="search-bar">
                <input type="text" class="search-input" placeholder="Search...">
                <button class="search-button">Search</button>
            </div>
            <a href="#" id="loginBtn" class="header-btn">Login</a>
            <a href="#" id="registerBtn" class="header-btn">Register</a>
            <button id="themeToggle" class="header-btn">Light/Dark Mode</button>
        </div>
    </header>

    <!-- Register Modal -->
    <div id="registerModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeRegister">&times;</span>
            <h2>Register</h2>
            <form action="Registration(User).php" method="POST">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required>
                
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required>
                
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                
                <label for="phone_num">Phone Number:</label>
                <input type="text" id="phone_num" name="phone_num" required>
                
                <input type="submit" value="Register">
            </form>
        </div>
    </div>

    <!-- Login Modal -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeLogin">&times;</span>
            <h2>Login</h2>
            <form action="Login(User).php" method="POST">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                
                <input type="submit" value="Login">
            </form>
        </div>
    </div>

    <!-- Image Grid -->
    <div class="image-grid-container">
        <div class="image-grid">
            <div class="grid-item">
                <img src="photo/Elbow.png" alt="Elbow">
                <p>Elbow</p>
            </div>
            <div class="grid-item">
                <img src="photo/Expansion_Sleeve.png" alt="Expansion Sleeve">
                <p>Expansion Sleeve</p>
            </div>
            <div class="grid-item">
                <img src="photo/Pipe.png" alt="Pipe">
                <p>Pipe</p>
            </div>
            <div class="grid-item">
                <img src="photo/Tee.png" alt="Tee">
                <p>Tee</p>
            </div>
        </div>
    </div>

    <script>
        // Get modal elements
        var registerModal = document.getElementById("registerModal");
        var loginModal = document.getElementById("loginModal");

        // Get button elements
        var registerBtn = document.getElementById("registerBtn");
        var loginBtn = document.getElementById("loginBtn");

        // Get close elements
        var closeRegister = document.getElementById("closeRegister");
        var closeLogin = document.getElementById("closeLogin");

        // Get theme toggle button
        var themeToggle = document.getElementById("themeToggle");

        // Open Register Modal
        registerBtn.onclick = function() {
            registerModal.style.display = "flex";
        }

        // Open Login Modal
        loginBtn.onclick = function() {
            loginModal.style.display = "flex";
        }

        // Close Register Modal
        closeRegister.onclick = function() {
            registerModal.style.display = "none";
        }

        // Close Login Modal
        closeLogin.onclick = function() {
            loginModal.style.display = "none";
        }

        // Close Modals if the user clicks anywhere outside the modal
        window.onclick = function(event) {
            if (event.target == registerModal) {
                registerModal.style.display = "none";
            }
            if (event.target == loginModal) {
                loginModal.style.display = "none";
            }
        }

        // Toggle theme
        themeToggle.onclick = function() {
            document.body.classList.toggle("dark-mode");
        }
    </script>
</body>
</html>
