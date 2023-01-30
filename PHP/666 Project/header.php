<header class="flex">
    <div class="logo-area flex">
        <img class="logo" src="./assets/logo.svg" alt="Company logo">
        <h2>Car Rent</h2>
    </div>
    <div class="links-area flex">
        <a href="./index.php">Home</a>
        <a href="#car-list">Car List</a>
        <a href="#footer">Contact Us</a>
        <a href="#footer">About Us</a>
    </div>
    <div class="login-area">
        <div class="login-links flex">
            <?php
            echo basename($_SERVER['SCRIPT_FILENAME'], ".php") != "register_form" ? "<a href='./register_form.php' class='button'>Register</a>" : "";
            echo basename($_SERVER['SCRIPT_FILENAME'], ".php") != "login_form" ? "<a href='./login_form.php' class='button'>Login</a>" : "";
            ?>
        </div>
        <div class="user-menu">
            <img class="user-icon" src="./assets/user-icon.svg" alt="User icon">
            <span class="username"><?php echo $currentUserName ?? "Username" ?></span>
            <div class="user-menu-dropdown flex">
                <?php
                if ($adminLoggedIn) {
                    echo "<a href='./add_car_form.php'>Add Car</a>";
                } else {
                    echo "<a href='./bookings.php'>Bookings</a>";
                }
                ?>
                <!-- <a href="./bookings.php">Bookings</a> -->
                <a href="./profile.php">Profile</a>
                <a href="./logout.php?logout=1">Logout</a>
            </div>
        </div>
        <div class="login-menu">
            <img class="menu-icon" src="./assets/bars.svg" alt="Menu button">
            <div class="menu-links-area flex">
                <a href="./index.php">Home</a>
                <a href="#car-list">Car List</a>
                <a href="#footer">Contact Us</a>
                <a href="#footer">About Us</a>
                <div class="login-links flex">
                    <?php
                    echo basename($_SERVER['SCRIPT_FILENAME'], ".php") != "register_form" ? "<a href='./register_form.php' class='button'>Register</a>" : "";
                    echo basename($_SERVER['SCRIPT_FILENAME'], ".php") != "login_form" ? "<a href='./login_form.php' class='button'>Login</a>" : "";
                    ?>
                </div>
            </div>
        </div>
    </div>
</header>
