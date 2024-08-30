<?php

include './components/header.php';

// Clear the error message
$error_msg = "";

// If the user isn't logged in, try to log them in
if (!isset($_SESSION['user_id'])) {
    if (isset($_POST['submit'])) {

        // Grab the user-entered log-in data
        $user_username = mysqli_real_escape_string($conn, trim($_POST['username']));
        $user_password = mysqli_real_escape_string($conn, trim($_POST['password']));

        if (!empty($user_username) && !empty($user_password)) {
            // Look up the username and password in the database
            $query = "SELECT user_id,role, username FROM member WHERE username = '$user_username' AND password = SHA('$user_password')";
            $data = mysqli_query($conn, $query);

            if (mysqli_num_rows($data) == 1) {
                // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
                $row = mysqli_fetch_array($data);
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['role'] = $row['role'];
                setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
                setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
                setcookie('role', $row['role'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
                $admin_page = './admin/index.php';
                header('Location: ' . $admin_page);
                exit(); // Add exit after header to prevent further script execution
            } else {
                // The username/password are incorrect so set an error message
                $error_msg = '<div class="ui warning message">Invalid Username and Password</div>';
            }
        } else {
            // The username/password weren't entered so set an error message
            $error_msg = '<div class="ui warning message">Enter Username and Password</div>';
        }
    }
}

// Start HTML output after header logic
?>

<style>
     @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
html, body {
  display: grid;
  height: 100%;
  width: 100%;
  place-items: center;
  background: #70a0db;
}

::selection{
  background: #1a75ff;
  color: #fff;
}
/* .wrapper{
  overflow: hidden;
  max-width: 390px;
  background: rgba(255, 255, 255, 0.8);
  padding: 30px;
  border-radius: 15px;
  box-shadow: 0px 15px 20px rgba(0,0,0,0.1);
} */
 .wrapper {
  overflow: hidden;
  max-width: 390px;
  background: rgba(255, 255, 255, 0.2); /* Translucent background */
  padding: 30px;
  border-radius: 15px;
  box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.1);
  backdrop-filter: blur(10px); /* Blur effect for glassmorphism */
  border: 1px solid rgba(255, 255, 255, 0.3); /* Slight border to enhance the glass effect */
}

.wrapper .title-text{
  display: flex;
  width: 200%;
}
.wrapper .title{
  width: 50%;
  font-size: 35px;
  font-weight: 600;
  text-align: center;
  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
.wrapper .slide-controls{
  position: relative;
  display: flex;
  height: 50px;
  width: 100%;
  overflow: hidden;
  margin: 30px 0 10px 0;
  justify-content: space-between;
  border: 1px solid lightgrey;
  border-radius: 15px;
}
.slide-controls .slide{
  height: 100%;
  width: 100%;
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  text-align: center;
  line-height: 48px;
  cursor: pointer;
  z-index: 1;
  transition: all 0.6s ease;
}
.slide-controls label.signup{
  color: #000;
}
.slide-controls .slider-tab{
  position: absolute;
  height: 100%;
  width: 50%;
  left: 0;
  z-index: 0;
  border-radius: 15px;
  background: -webkit-linear-gradient(left,#003366,#004080,#0059b3
, #0073e6);
  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
input[type="radio"]{
  display: none;
}
#signup:checked ~ .slider-tab{
  left: 50%;
}
#signup:checked ~ label.signup{
  color: #fff;
  cursor: default;
  user-select: none;
}
#signup:checked ~ label.login{
  color: #000;
}
#login:checked ~ label.signup{
  color: #000;
}
#login:checked ~ label.login{
  cursor: default;
  user-select: none;
}
.wrapper .form-container{
  width: 100%;
  overflow: hidden;
}
.form-container .form-inner{
  display: flex;
  width: 200%;
}
.form-container .form-inner form{
  width: 50%;
  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
.form-inner form .field{
  height: 50px;
  width: 100%;
  margin-top: 20px;
}
.form-inner form .field input{
  height: 100%;
  width: 100%;
  outline: none;
  padding-left: 15px;
  border-radius: 15px;
  border: 1px solid lightgrey;
  border-bottom-width: 2px;
  font-size: 17px;
  transition: all 0.3s ease;
}
.form-inner form .field input:focus{
  border-color: #1a75ff;
  /* box-shadow: inset 0 0 3px #fb6aae; */
}
.form-inner form .field input::placeholder{
  color: #999;
  transition: all 0.3s ease;
}
form .field input:focus::placeholder{
  color: #1a75ff;
}
.form-inner form .pass-link{
  margin-top: 5px;
}
.form-inner form .signup-link{
  text-align: center;
  margin-top: 30px;
}
.form-inner form .pass-link a,
.form-inner form .signup-link a{
  color: #1a75ff;
  text-decoration: none;
}
.form-inner form .pass-link a:hover,
.form-inner form .signup-link a:hover{
  text-decoration: underline;
}
form .btn{
  height: 50px;
  width: 100%;
  border-radius: 15px;
  position: relative;
  overflow: hidden;
}
form .btn .btn-layer{
  height: 100%;
  width: 300%;
  position: absolute;
  left: -100%;
  background: -webkit-linear-gradient(right,#003366,#004080,#0059b3
, #0073e6);
  border-radius: 15px;
  transition: all 0.4s ease;;
}
form .btn:hover .btn-layer{
  left: 0;
}
form .btn input[type="submit"]{
  height: 100%;
  width: 100%;
  z-index: 1;
  position: relative;
  background: none;
  border: none;
  color: #fff;
  padding-left: 0;
  border-radius: 15px;
  font-size: 20px;
  font-weight: 500;
  cursor: pointer;
}

</style>


<div class="ui container">
    <!-- Top Navigation Bar -->
    <?php include './components/top-menu.php'; ?>

  

    <div class="ui grid">
        <div class="six wide column centered">

            <?php
            // If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
            if (empty($_SESSION['user_id'])) {
                echo '<p class="error">' . $error_msg . '</p>';
            ?>

                <div class="wrapper">
                <div class="title-text">
                        <div class="title login">Login Form</div>
                        <!-- <div class="title signup">Signup Form</div> -->
                    </div>
                    <br>
                    <div class="form-container">
                        <!-- <div class="slide-controls">
                            <input type="radio" name="slide" id="login" checked>
                            <input type="radio" name="slide" id="signup">
                            <label for="login" class="slide login">Login</label>
                            <label for="signup" class="slide signup">Signup</label>
                            <div class="slider-tab"></div>
                        </div> -->
                        <div class="form-inner">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="login">
                                <div class="field">
                                    <input type="text" name="username" id="username" placeholder="Email Address" required>
                                </div>
                                <div class="field">
                                    <input type="password" name="password" id="password" placeholder="Password" required>
                                </div>
                                <div class="pass-link"><a href="#">Forgot password?</a></div>
                                <div class="field btn">
                                    <!-- <div class="btn-layer"></div> -->
                                     
                                   <button class="btn-layer" name="submit" value="login" type="submit">Login</button>
                                </div>
                            </form>
                            <form action="#" class="signup">
                                <div class="field">
                                    <input type="text" placeholder="Email Address" required>
                                </div>
                                <div class="field">
                                    <input type="password" placeholder="Password" required>
                                </div>
                                <div class="field">
                                    <input type="password" placeholder="Confirm password" required>
                                </div>
                                <div class="field btn">
                                    <!-- <div class="btn-layer"></div> -->
                                    
                                    <button class="btn-layer" name="submit" value="login" type="submit">Sign Up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>

            <?php
            } else {
                // Confirm the successful log-in
                echo ('<p class="login">You are logged in as ' . $_SESSION['username'] . '.</p>');
            }
            ?>

        </div>
    </div>

</div>
<script>
    const loginText = document.querySelector(".title-text .login");
      const loginForm = document.querySelector("form.login");
      const loginBtn = document.querySelector("label.login");
      const signupBtn = document.querySelector("label.signup");
      const signupLink = document.querySelector("form .signup-link a");
      signupBtn.onclick = (()=>{
        loginForm.style.marginLeft = "-50%";
        loginText.style.marginLeft = "-50%";
      });
      loginBtn.onclick = (()=>{
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
      });
      signupLink.onclick = (()=>{
        signupBtn.click();
        return false;
      });

</script>

<?php include './components/footer.php'; ?>
