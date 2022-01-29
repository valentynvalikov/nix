<?php require_once APPROOT . '/views/inc/header.php'; ?>

<div class="container">
    <div class="col-md-8 mx-auto">
        <div class="card card-body bg-light my-2">
            <div class="text-center">
                <?php flash('success'); ?>
                <h2 class="mb-3">Hello, <?php echo $_SESSION['user_name']; ?>! You can edit your profile on this page!</h2>
            </div>
            <form action="<?php echo URLROOT; ?>/users/profile" method="post">
                <div class="form-group pb-3">
                    <label for="username"><strong>Username: <sup>*</sup></strong></label>
                    <input type="text" name="username" class="form-control form-control-lg"
                           value="<?php if (isset($_POST['username'])) {
                                      echo $_POST['username'];
                                  } else {
                                      echo $_SESSION['user_name'];
                                  } ?>">
                    <span class="text-white bg-danger"><?php echo $data['username_err']; ?></span>
                </div>
                <div class="form-group pb-3">
                    <label for="email"><strong>Email: <sup>*</sup></strong></label>
                    <input type="email" name="email" class="form-control form-control-lg"
                           value="<?php if (isset($_POST['email'])) {
                                      echo $_POST['email'];
                                  } else {
                                      echo $_SESSION['user_email'];
                                  } ?>">
                    <span class="text-white bg-danger"><?php echo $data['email_err']; ?></span>
                </div>
                <div class="form-group pb-3">
                    <label for="password"><strong>New Password: <sup>*</sup></strong></label>
                    <input type="password" name="password" class="form-control form-control-lg"
                           value="<?php echo $data['password']; ?>">
                    <span class="text-white bg-danger"><?php echo $data['password_err']; ?></span>
                </div>
                <div class="form-group pb-3">
                    <label for="confirm_password"><strong>Confirm New Password: <sup>*</sup></strong></label>
                    <input type="password" name="confirm_password" class="form-control form-control-lg"
                           value="<?php echo $data['confirm_password']; ?>">
                    <span class="text-white bg-danger"><?php echo $data['confirm_password_err']; ?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Edit profile" class="btn btn-success col-12">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>