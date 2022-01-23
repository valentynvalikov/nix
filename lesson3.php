<!doctype html>
<html lang="en">
<head>
    <title>NIX Education</title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="css/bootstrap.css" />
    <link rel="stylesheet" media="all" href="css/main.css" />
</head>
<body>
<header class="pb-2">
    <nav class="navbar bg-dark navbar-dark navbar-expand-md">
        <div class="container">
            <a class="navbar-brand my-3" href="index.php">NIX Education</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#toggleNav" aria-controls="toggleNav" aria-expanded="false" aria-label="Toggle nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="toggleNav">
                <div class="navbar-nav ms-lg-5 ms-md-5">
                    <div class="dropdown">
                        <a class="nav-item nav-link dropdown-toggle" data-bs-toggle="dropdown"
                           id="beginnerDropdown" aria-haspopup="true" aria-expanded="false" href="#">Beginner</a>
                        <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="beginnerDropdown">
                            <a class="dropdown-item" href="lesson1.php">Lesson 1</a>
                            <a class="dropdown-item" href="lesson2.php">Lesson 2</a>
                            <a class="dropdown-item" href="lesson3.php">Lesson 3</a>
                        </div>
                    </div>
                    <a class="nav-item nav-link dropdown-divider"></a>
                </div>
                <div class="navbar-nav ms-auto">
                    <a class="nav-item nav-link" href="profile.php">Hi!</a>
                    <a class="nav-item nav-link" href="login.php">Login</a>
                    <a class="nav-item nav-link" href="register.php">Register</a>
                </div>
            </div>
        </div>
    </nav>
</header>
<div class="container">
<?php
if (isset($_POST['text'])) {
    $text = $_POST['text'];
} else {
    $text = "";
}
$text = iconv('windows-1251', 'utf-8', strrev(iconv('utf-8', 'windows-1251', $text)));

if (!empty($text)) {
    echo "<h2 class=\"px-3\">You have typed: $text - in reverse!</h2>";
}
?>
<form id="text" action="lesson3.php" method="post">
     <fieldset class="form-group">
          <div class="form-group row">
              <div class="col-9">
                    <input class="form-control my-3 p-3" type="text" name="text" placeholder="Type your text here" />
              </div>
              <div class="col-1">
                    <button class="btn btn-secondary text-nowrap my-3 p-3" type="submit">Send text</button>
              </div>
          </div>
      </fieldset>
</form>

</div>
<footer class="bg-dark mt-3 py-2" style="color: white; text-align: center">
    &copy; <?php echo date('Y'); ?> <h6><a style="color: white" href="index.php">NIX Education</a></h6>
</footer>
<script src="js/bootstrap.bundle.js"></script>
<script src="js/jquery.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/form.js"></script>
</body>
</html>