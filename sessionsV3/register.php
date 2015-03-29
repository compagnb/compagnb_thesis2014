<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
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

    <title>sessions: register</title>

    <!-- Secure Login Scripts -->
    <script type="text/JavaScript" src="js/sha512.js"></script>
    <script type="text/JavaScript" src="js/forms.js"></script>

    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">
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
                            <li class="active, hidden"><a href="setup.html">set up</a></li>
                            <li class="active, hidden"><a href="journal.html">journal</a></li>
                            <li class="active, hidden"><a href="register.php">sign up</a></li>
                        </ul>
                        </nav>
                    </div>
                </div> <!-- nav end -->
            <!-- Registration form to be output if the POST variables are not set or if the registration script caused an error. -->
            <div class="register-container">
            <h1 class="regheading">personal details</h1>
            <span></span>
            <a class="fb-register" href="#"></a>
            <p class="fb-regtxt">Enter your details below or sign up with Facebook:</p>
                <div class="ortxt">
                    <span> or </span>
                </div>
            <?php
                if (!empty($error_msg)) {
                        echo $error_msg;
                }
            ?>

            <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>"
                method="post"
                name="registration_form">

                <p class="form-p">* username
                <br>
                <em>may contain only digits, upper and lower case letters and underscores</em>
                <br>
                <input type='text'
                name='username'
                id='username' /></p>
                <br>

                <p class="form-p">* email
                <br>
                <em>emails must have a valid email format</em>
                <br><input type="text" name="email" id="email" /></p>
                <br>

                <p class="form-p">* confirm email
                <br>
                <input type="text" name="confirmemail" id="confirmemail" /></p>
                <br>

                <p class="form-p">* password
                <br>
                <em>must be 6 characters and include an uppercase, lowercase and number</em>
                <br><input type="password"
                name="password"
                id="password"/></p>
                <br>

                <p class="form-p">* confirm password
                <br>
                <input type="password"
                name="confirmpwd"
                id="confirmpwd" /></p>
                <br>

                <p class="form-p" for="points">current anxiety level
                <br>
                <div class="anxietyslider">
                    <label class="calm">calm</label>
                    <input id="slider1" name="anxrange" type="range" min="1" max="10" step="1" />
                    <label class="anxious">anxious</label>
                </div>

                <p class="form-p">activity band
                <br>
                <select class="form-control activitytrack" name="activity-tracker">
                    <option value="peak">Basis Peak</option>
                    <option value="b1">Basis b1</option>
                    <option value="fitbit">fitbit</option>
                    <option value="iwatch">iWatch</option>
                    <option value="gear-fit">Gear Fit</option>
                    <option value="other">other</option>
                </select></p>

                <div class="signupcont">
                    <input class="btn-login" type="button"
                    value="sign up & continue"
                    onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd);" />
                    <p class="signup-txt"> by clicking ‘sign up & continue’ you agree to sessions
                    <a class="pinklinks" href"#"> terms & conditions</a></p>
                </div>
            </form>
            <p class="signup-txt">return to the <a class="pinklinks" href="login.php">login page</a>.</p>
            </div>
        </div>
    </div>
</body>
</html>
