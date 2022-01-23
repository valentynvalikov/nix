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
<?php error_reporting(E_ERROR | E_PARSE | E_NOTICE); ?>
<div class="mult-table">
<?php
for ($i = 1; $i <= 10; $i++) :
    echo "<div class=\"mult-table-col\"> \n";
    for ($k = 1; $k <= 10; $k++) :
        $j = $i * $k;
        $g = (string) $j;
        switch ($i) :
            case 1:
                echo "<span style=\"color: red\">$i</span>";
                break;
            case 2:
                echo "<span style=\"color: green\">$i</span>";
                break;
            case 3:
                echo "<span style=\"color: yellow\">$i</span>";
                break;
            case 4:
                echo "<span style=\"color: blue\">$i</span>";
                break;
            case 5:
                echo "<span style=\"color: orange\">$i</span>";
                break;
            case 6:
                echo "<span style=\"color: fuchsia\">$i</span>";
                break;
            case 7:
                echo "<span style=\"color: silver\">$i</span>";
                break;
            case 8:
                echo "<span style=\"color: grey\">$i</span>";
                break;
            case 9:
                echo "<span style=\"color: aqua\">$i</span>";
                break;
            default:
                echo "<span>$i</span>";
        endswitch;
           echo " * ";
        switch ($k) :
            case 1:
                echo "<span style=\"color: red\">$k</span>";
                break;
            case 2:
                echo "<span style=\"color: green\">$k</span>";
                break;
            case 3:
                echo "<span style=\"color: yellow\">$k</span>";
                break;
            case 4:
                echo "<span style=\"color: blue\">$k</span>";
                break;
            case 5:
                echo "<span style=\"color: orange\">$k</span>";
                break;
            case 6:
                echo "<span style=\"color: fuchsia\">$k</span>";
                break;
            case 7:
                echo "<span style=\"color: silver\">$k</span>";
                break;
            case 8:
                echo "<span style=\"color: grey\">$k</span>";
                break;
            case 9:
                echo "<span style=\"color: aqua\">$k</span>";
                break;
            default:
                echo "<span>$k</span>";
        endswitch;
           echo " = ";
        switch ($g[0]) :
            case 1:
                echo "<span style=\"color: red\">$g[0]</span>";
                break;
            case 2:
                echo "<span style=\"color: green\">$g[0]</span>";
                break;
            case 3:
                echo "<span style=\"color: yellow\">$g[0]</span>";
                break;
            case 4:
                echo "<span style=\"color: blue\">$g[0]</span>";
                break;
            case 5:
                echo "<span style=\"color: orange\">$g[0]</span>";
                break;
            case 6:
                echo "<span style=\"color: fuchsia\">$g[0]</span>";
                break;
            case 7:
                echo "<span style=\"color: silver\">$g[0]</span>";
                break;
            case 8:
                echo "<span style=\"color: grey\">$g[0]</span>";
                break;
            case 9:
                echo "<span style=\"color: aqua\">$g[0]</span>";
                break;
            default:
                echo "<span>$g[0]</span>";
        endswitch;
        switch ($g[1]) :
            case 0:
                echo "<span style=\"color: maroon\">$g[1]</span>";
                break;
            case 1:
                echo "<span style=\"color: red\">$g[1]</span>";
                break;
            case 2:
                echo "<span style=\"color: green\">$g[1]</span>";
                break;
            case 3:
                echo "<span style=\"color: yellow\">$g[1]</span>";
                break;
            case 4:
                echo "<span style=\"color: blue\">$g[1]</span>";
                break;
            case 5:
                echo "<span style=\"color: orange\">$g[1]</span>";
                break;
            case 6:
                echo "<span style=\"color: fuchsia\">$g[1]</span>";
                break;
            case 7:
                echo "<span style=\"color: silver\">$g[1]</span>";
                break;
            case 8:
                echo "<span style=\"color: grey\">$g[1]</span>";
                break;
            case 9:
                echo "<span style=\"color: aqua\">$g[1]</span>";
                break;
            default:
                echo "<span>$g[1]</span>";
        endswitch;
        switch ($g[2]) :
            default:
                echo "<span style=\"color: orange\">$g[2]</span>";
        endswitch;
           echo "<br>\n";
    endfor;
    echo "</div> \n";
endfor;
?>
</div>
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