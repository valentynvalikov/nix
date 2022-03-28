<nav class="navbar bg-dark navbar-dark navbar-expand-md">
    <div class="container">
        <a class="navbar-brand my-3" href="<?php echo URLROOT; ?>/"><?php echo SITENAME; ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#toggleNav" aria-controls="toggleNav" aria-expanded="false" aria-label="Toggle nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="toggleNav">
            <div class="navbar-nav ms-lg-5 ms-md-5">
                <a class="nav-item nav-link" href="<?php echo URLROOT; ?>/">Home</a>
            </div>
            <div class="navbar-nav">
                <div class="dropdown">
                    <a class="nav-item nav-link dropdown-toggle" data-bs-toggle="dropdown"
                       id="beginnerDropdown" aria-haspopup="true" aria-expanded="false" href="#">Beginner</a>
                    <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="beginnerDropdown">
                        <a class="dropdown-item" href="<?php echo URLROOT; ?>/pages/lesson/1">Lesson 1</a>
                        <a class="dropdown-item" href="<?php echo URLROOT; ?>/pages/lesson/2">Lesson 2</a>
                        <a class="dropdown-item" href="<?php echo URLROOT; ?>/pages/lesson/3">Lesson 3</a>
                    </div>
                </div>
                <div class="navbar-nav">
                    <a class="nav-item nav-link text-nowrap" href="/rest_api" target="_blank">REST API</a>
                    <a class="nav-item nav-link text-nowrap" href="/" target="_blank">DnaRna</a>
                </div>
                <a class="nav-item nav-link dropdown-divider"></a>
            </div>
            <div class="navbar-nav ms-auto my-auto">
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <a class="btn btn-outline-secondary nav-item nav-link my-auto text-nowrap"
                       href="<?php echo URLROOT; ?>/posts/add">Create a Post</a>
                    <a class="nav-item nav-link my-auto text-nowrap" href="<?php echo URLROOT; ?>/users/profile">
                        <img class="rounded" src="<?php if (!empty($_SESSION['user_avatar'])) {
                                                            echo URLROOT . '/public/img/' . $_SESSION['user_avatar'];
                                                  }; ?>" height="50px">
                        Hi, <?php echo $_SESSION['user_name']; ?>!</a>
                    <a style="margin-top: 11px" class="nav-item nav-link"
                       href="<?php echo URLROOT; ?>/users/logout">Logout</a>
                <?php else : ?>
                    <a class="nav-item nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
                    <a class="nav-item nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>