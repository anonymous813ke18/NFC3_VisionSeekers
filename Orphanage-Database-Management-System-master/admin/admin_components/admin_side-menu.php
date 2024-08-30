<!-- <div class="four wide column" id="example1">
    <div class="ui secondary vertical pointing menu">
        <a class="item <?php echo ($_SERVER['PHP_SELF'] == "/orphan/admin/index.php" ? "active" : "");?>" href="index.php">Dashboard</a>
        <a class="item <?php echo ($_SERVER['PHP_SELF'] == "/orphan/admin/children.php" ? "active" : "");?>" href="./children.php">Persons</a>
        <a class="item <?php echo ($_SERVER['PHP_SELF'] == "/orphan/admin/old.php" ? "active" : "");?>" href="./old.php">NGO</a>
        <a class="item <?php echo ($_SERVER['PHP_SELF'] == "/orphan/admin/sponsorer.php" ? "active" : "");?>" href="./sponsorer.php">Sponsorers</a>
        <a class="item <?php echo ($_SERVER['PHP_SELF'] == "/orphan/admin/donators.php" ? "active" : "");?>" href="donators.php">Donators</a>
        <a class="item <?php echo ($_SERVER['PHP_SELF'] == "/orphan/admin/gift-sent.php" ? "active" : "");?>" href="gift-sent.php">Gift Sent</a>
        <a class="item <?php echo ($_SERVER['PHP_SELF'] == "/orphan/admin/programs.php" ? "active" : "");?>" href="./programs.php">Programs</a>
        <a class="item <?php echo ($_SERVER['PHP_SELF'] == "/orphan/admin/feedback.php" ? "active" : "");?>" href="feedback.php">Feedback</a>
    </div>
</div> -->

<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glassmorphism Sidebar | CodingNepal</title>
    <!-- Linking Google font link for icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        /* Importing Google font - Poppins */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body {
    height: 100vh;
    width: 100%;
    background-image: url("images/hero-bg.jpg");
    background-position: center;
    background-size: cover;
}

.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 110px;
    height: 100%;
    display: flex;
    align-items: center;
    flex-direction: column;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(17px);
    --webkit-backdrop-filter: blur(17px);
    border-right: 1px solid rgba(255, 255, 255, 0.7);
    transition: width 0.3s ease;
}

.sidebar:hover {
    width: 260px;
}

.sidebar .logo {
    color: #000;
    display: flex;
    align-items: center;
    padding: 25px 10px 15px;
}

.logo img {
    width: 43px;
    border-radius: 50%;
}

.logo h2 {
    font-size: 1.15rem;
    font-weight: 600;
    margin-left: 15px;
    display: none;
}

.sidebar:hover .logo h2 {
    display: block;
}

.sidebar .links {
    list-style: none;
    margin-top: 20px;
    overflow-y: auto;
    scrollbar-width: none;
    height: calc(100% - 140px);
}

.sidebar .links::-webkit-scrollbar {
    display: none;
}

.links li {
    display: flex;
    border-radius: 4px;
    align-items: center;
}

.links li:hover {
    cursor: pointer;
    background: #fff;
}

.links h4 {
    color: #222;
    font-weight: 500;
    display: none;
    margin-bottom: 10px;
}

.sidebar:hover .links h4 {
    display: block;
}

.links hr {
    margin: 10px 8px;
    border: 1px solid #4c4c4c;
}

.sidebar:hover .links hr {
    border-color: transparent;
}

.links li span {
    padding: 12px 10px;
}

.links li a {
    padding: 10px;
    color: #000;
    display: none;
    font-weight: 500;
    white-space: nowrap;
    text-decoration: none;
}

.sidebar:hover .links li a {
    display: block;
}

.links .logout-link {
    margin-top: 20px;
}
        </style>
  </head>
  <body>
    <aside class="sidebar">
      <div class="logo">
        <img src="images/logo.jpg" alt="logo">
        <h2>VisionSeekers</h2>
      </div>
      <ul class="links">
        <h4>Main Menu</h4>
        <li>
                <span class="material-symbols-outlined">dashboard</span>
                <a href="../index.php">Home</a>
            </li>
        <li>
          <span class="material-symbols-outlined">dashboard</span>
          <a class="item <?php echo ($_SERVER['PHP_SELF'] == "/orphan/admin/index.php" ? "active" : "");?>" href="index.php">Dashboard</a>
        </li>
        <li>
          <span class="material-symbols-outlined">show_chart</span>
          <a <?php echo ($_SERVER['PHP_SELF'] == "/orphan/admin/children.php" ? "active" : "");?> href="./children.php">People</a>
        </li>
        <li>
          <span class="material-symbols-outlined">show_chart</span>
          <a <?php echo ($_SERVER['PHP_SELF'] == "/orphan/admin/old.php" ? "active" : "");?> href="./old.php">NGO</a>
        </li>
        <li>
          <span class="material-symbols-outlined">flag</span>
          <a class="item <?php echo ($_SERVER['PHP_SELF'] == "/orphan/admin/sponsorer.php" ? "active" : "");?>" href="./sponsorer.php">Sponsors</a>
        </li>
        <li>
          <span class="material-symbols-outlined">person</span>
          <a class="item <?php echo ($_SERVER['PHP_SELF'] == "/orphan/admin/donators.php" ? "active" : "");?>" href="donators.php">Donators</a>
        </li>
        <li>
          <span class="material-symbols-outlined">group</span>
          <a class="item <?php echo ($_SERVER['PHP_SELF'] == "/orphan/admin/gift-sent.php" ? "active" : "");?>" href="gift-sent.php">Gift Sent</a>
        </li>
        <li>
          <span class="material-symbols-outlined">ambient_screen</span>
          <a class="item <?php echo ($_SERVER['PHP_SELF'] == "/orphan/admin/programs.php" ? "active" : "");?>" href="./programs.php">Programs</a>
        </li>
        <li>
          <span class="material-symbols-outlined">pacemaker</span>
          <a class="item <?php echo ($_SERVER['PHP_SELF'] == "/orphan/admin/feedback.php" ? "active" : "");?>" href="feedback.php">TFeedback</a>
        </li>

        <?php
            if (empty($_SESSION['user_id'])) {
            ?>
               
                <li>
                    <span class="material-symbols-outlined">monitoring</span>
                    <a href="login.php" class="item <?php echo ($_SERVER['PHP_SELF'] == "/orphan/login.php" ? "active" : ""); ?>">Login</a>
                </li>
            <?php
            } else {
            ?>
                
               
                <li>
                    <span class="material-symbols-outlined">monitoring</span>
                    <a href="../logout.php" class="item">Logout</a>
                </li>
            <?php
            }
            ?>
      </ul>
    </aside>
    
  </body>
</html>

