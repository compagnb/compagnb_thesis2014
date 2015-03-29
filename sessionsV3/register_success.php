<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!--
   Barbara Compagnoni
   sessions: a pocket therapist for anxiety
   Adv Web & Thesis
   Spring 2015
-->

<!DOCTYPE html>
<html lang="en" class="bgdbody">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="sessions: a pocket therapist for anxiety">
    <meta name="author" content="barbara compagnoni">
    <link rel="icon" href="images/favicon.ico">

   <title>sessions: registration complete</title>


   <!-- Custom styles for this template -->
   <link href="css/cover.css" rel="stylesheet">

   <!-- Secure Login Scripts -->
   <script type="text/JavaScript" src="js/sha512.js"></script>
   <script type="text/JavaScript" src="js/forms.js"></script>
</head>


<body>
   <div class="site-wrapper">
        <div class="site-wrapper-inner">
            <div class="cover-container">

                <div class="masthead clearfix">
                    <div class="inner">
                        <a class="masthead-brand" href="index.html"><img src="images/logo.png" alt="sessions logo" /></a>
                        <nav>
                            <ul class="nav masthead-nav">
                                <li class="active"><a href="setup.html">set up</a></li>
                                <li class="active"><a href="journal.html">journal</a></li>
                                <li class="active"><a href="register.php">sign up</a></li>
                            </ul>
                        </nav>
                    </div>
                </div><!--nav container -->

                <div class="login-container">
                    <?php
                    if (isset($_GET['error'])) {
                        echo '<p class="error">Error Logging In!</p>';
                    }
                    ?>
                    <form class="form-signin" action="includes/process_login.php" method="post" name="login_form">
                        <h1>you have successfully registered!</h1>
                        <p>login below for your first session</p>
                        <span></span>
                        <a class="fb-connect" href="#"></a>
                        <p class="fb-txt">use facebook connect to securely login. it's one less password to remember and we'll never automatically post to your wall.</p>
                        <div class="ortxt">
                            <span> or </span>
                        </div>
                        <input type="text"
                            name="email"
                            id="inputUsername"
                            class="form-control"
                            placeholder="email"
                            required autofocus/>
                        <input type="password"
                            name="password"
                            id="password"
                            class="form-control"
                            placeholder="password"
                            required/>
                        <div class="checkbox">
                            <label>
                            <input type="checkbox" value="remember-me"> remember me
                            </label>
                        </div>
                        <input class="btn-login"
                            type="button"
                            value="Login"
                            onclick="formhash(this.form, this.form.password);" />
                        <div class="reminder-links">
                            <p>don't have an account?
                            <br>
                            get started <a class="pinklinks" href="register.php">here</a></p>
                            <p>forgot your password?
                            <br>
                            recover it <a class="pinklinks" href="pwdrecover.html">here</a></p>
                        </div>
                    </form>

                    <?php
                    if (login_check($mysqli) == true) {
                        echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';

                    echo '<p class="reminder-links">Do you want to change user? <a class="pinklinks" href="includes/logout.php">Log out</a>.</p>';
                    } else {
                        echo '<p class="reminder-links">Currently logged ' . $logged . '.</p>';
                    }
                    ?>
                    </div>
                </div> <!-- /container -->

            <div class="login-mastfoot">
                <div class="inner">
                    <p class="copyright">&copy; 2015 barbara compagnoni. All rights reserved.
                    <br>
                    design: <a href="#">barbara compagnoni </a></p>
                </div>
            </div> <!-- footer -->
        </div>
    </div>
</body>
</html>

