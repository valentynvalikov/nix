<?php require_once APPROOT . '/views/inc/header.php'; ?>
<?php if (!Users::isLoggedIn()) {
    redirect('users/login');
}
?>
<div class="container">
    <div class="col-md-8 mx-auto">
        <div class="card card-body bg-light my-2">
            <div class="text-center">
                <span class="text-center"><?php flash('success'); ?></span>
                <h2 class="mb-3">Hello, <?php echo $_SESSION['user_name']; ?>! You can edit your profile on this page!</h2>
            </div>
            <form action="<?php echo URLROOT; ?>/users/profile" enctype="multipart/form-data" method="post">
                <div class="d-lg-flex flex-row">
                    <div class="col-4 mx-auto me-lg-2 mt-2">
                    <img class="rounded-3" width="100%" src="
                        <?php if (empty($_SESSION['user_avatar'])) {
                            echo URLROOT . '/public/img/placeholder.png';
                        } else {
                            echo URLROOT . '/public/img/' . $_SESSION['user_avatar'];
                        }
                        ?>">
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group pb-3">
                            <label for="username"><strong>Username:</strong></label>
                            <input type="text" name="username" class="form-control form-control-lg"
                                   value="<?php if (isset($_POST['username'])) {
                                              echo $data['username'];
                                          } else {
                                              echo $_SESSION['user_name'];
                                          } ?>">
                            <span class="text-white bg-danger"><?php echo $data['username_err']; ?></span>
                        </div>
                        <div class="form-group pb-3">
                            <label for="email"><strong>Email:</strong></label>
                            <input type="email" name="email" class="form-control form-control-lg"
                                   value="<?php if (isset($_POST['email'])) {
                                              echo $data['email'];
                                          } else {
                                              echo $_SESSION['user_email'];
                                          } ?>">
                            <span class="text-white bg-danger"><?php echo $data['email_err']; ?></span>
                        </div>
                        <div class="form-group pb-3">
                            <label for="password"><strong>New Password:</strong></label>
                            <input type="password" name="password" class="form-control form-control-lg"
                                   value="<?php if (isset($_POST['password'])) {
                                              echo $_POST['password'];
                                          } ?>">
                            <span class="text-white bg-danger"><?php echo $data['password_err']; ?></span>
                        </div>
                        <div class="form-group pb-3">
                            <label for="confirm_password"><strong>Confirm New Password:</strong></label>
                            <input type="password" name="confirm_password" class="form-control form-control-lg"
                                   value="<?php echo $data['confirm_password']; ?>">
                            <span class="text-white bg-danger"><?php echo $data['confirm_password_err']; ?></span>
                        </div>
                        <div class="form-group pb-3">
                            <label for="avatar"><strong>Choose profile picture:</strong></label><br>
                            <input class="my-2" type="file" name="avatar"><br>
                            <span class="text-white bg-danger"><?php echo $data['avatar_err']; ?></span>
                        </div>
                        <div class="form-group pb-3">
                            <input type="submit" value="Edit profile" class="btn btn-success col-12">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>