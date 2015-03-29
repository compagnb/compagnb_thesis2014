<!--
   Barbara Compagnoni
   sessions: a pocket therapist for anxiety
   Adv Web & Thesis
   Spring 2015
-->

<?php
$error = filter_input(INPUT_GET, 'err', $filter = FILTER_SANITIZE_STRING);

if (! $error) {
    $error = 'Oops! An unknown error happened.';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="sessions: a pocket therapist for anxiety">
    <meta name="author" content="barbara compagnoni">
    <link rel="icon" href="images/favicon.ico">

    <title>sessions: login error</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootsrtap.min.css" rel="stylesheet">

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
        <h1>There was a problem</h1>
        <p class="error"><?php echo $error; ?></p>
</body>
</html>

