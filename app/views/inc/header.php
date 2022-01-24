<!doctype html>
<html lang="en">
<head>
    <title><?php echo SITENAME; ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo URLROOT; ?>/css/bootstrap.css" />
    <link rel="stylesheet" media="all" href="<?php echo URLROOT; ?>/css/style.css" />
</head>
<body>
<header class="pb-2">
    <nav class="navbar bg-dark navbar-dark navbar-expand-md">
        <div class="container">
            <a class="navbar-brand my-3" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
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
                            <a class="dropdown-item" href="<?php echo URLROOT; ?>/beginner/lesson1.php">Lesson 1</a>
                            <a class="dropdown-item" href="<?php echo URLROOT; ?>/beginner/lesson2.php">Lesson 2</a>
                            <a class="dropdown-item" href="<?php echo URLROOT; ?>/beginner/lesson3.php">Lesson 3</a>
                        </div>
                    </div>
                    <a class="nav-item nav-link dropdown-divider"></a>
                </div>
                <div class="navbar-nav ms-auto">
                    <a class="nav-item nav-link" href="<?php echo URLROOT; ?>/profile.php">Hi!</a>
                    <a class="nav-item nav-link" href="<?php echo URLROOT; ?>/login.php">Login</a>
                    <a class="nav-item nav-link" href="<?php echo URLROOT; ?>/register.php">Register</a>
                </div>
            </div>
        </div>
    </nav>
</header>

<div class="container">