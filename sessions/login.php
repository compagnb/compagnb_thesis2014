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

<!DOCTYPE HTML>
<!--
   Barbara Compagnoni
   sessions: a pocket therapist for anxiety
   Adv Web & Thesis
   Spring 2015

   with use of code snippets from html5up.net
-->
<html>
   <head>
      <title>sessions : a pocket therapist for anxiety</title>
      <meta charset="utf-8">
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <meta name="description" content="" />
      <meta name="keywords" content="" />
      <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
      <script src="js/jquery.min.js"></script>
      <script src="js/jquery.scrolly.min.js"></script>
      <script src="js/jquery.dropotron.min.js"></script>
      <script src="js/jquery.scrollex.min.js"></script>
      <script src="js/skel.min.js"></script>
      <script src="js/skel-layers.min.js"></script>
      <script src="js/init.js"></script>
      <script type="text/JavaScript" src="js/sha512.js"></script> 
      <script type="text/JavaScript" src="js/forms.js"></script> 
      <noscript>
       <link rel="stylesheet" href="css/skel.css" />
         <link rel="stylesheet" href="css/style.css" />
         <link rel="stylesheet" href="css/style-xlarge.css" />
      </noscript>
      <!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
      <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
   </head>
   <body class="login">
         <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 

      <!-- Header -->
         <header id="header">
            <h1 id="logo"><a href="index.html"><img src="images/logo.png" alt="sessions logo" /></a></h1>
            <nav id="nav">
               <ul>
                  <li><a href="#">help</a></li>
                  <li><a href="#">get started</a>
                  <li><a href="#">set up</a></li>
                  <li><a href="#">sign up</a></li>
               </ul>
            </nav>
         </header>

      <!-- Banner -->
         <section id="login-banner">
            <div class="content">
               <div id="fblogin">
                  <a href="#"><img src="images/fbconnect.png" alt="fbconnect image" /></a>
                  <p>use facebook connect to securely login. It's one less password to remember and we'll never automatically post to your wall.</p>
               </div>
               <div id="orsection">
                  <img src="images/horizontalrule.png" alt="horizontal rule image"/>
                  <p>or</p>
                  <img src="images/horizontalrule.png" alt="horizontal rule image"/>
               </div>
               <div id="loginform">
                  <form action="includes/process_login.php" method="post" name="login_form">                      
                     Email: <input type="text" name="email" />
                     Password: <input type="password" name="password" id="password"/>
                     <input type="button" value="Login" onclick="formhash(this.form, this.form.password);" /> 
                  </form>   
               </div>
         </section>

      <!-- Footer -->
         <footer id="footer">
            <ul class="icons">
               <li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
               <li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
               <li><a href="#" class="icon alt fa-linkedin"><span class="label">LinkedIn</span></a></li>
               <li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
               <li><a href="#" class="icon alt fa-github"><span class="label">GitHub</span></a></li>
               <li><a href="#" class="icon alt fa-envelope"><span class="label">Email</span></a></li>
            </ul>
            <ul class="copyright">
               <li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
            </ul>
         </footer>

         <?php
        if (login_check($mysqli) == true) {
                        echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';
 
            echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
        } else {
                        echo '<p>Currently logged ' . $logged . '.</p>';
                        echo "<p>If you don't have a login, please <a href='register.php'>register</a></p>";
                }
?>      

   </body>
</html>