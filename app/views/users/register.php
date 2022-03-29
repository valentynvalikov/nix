<?php require_once APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card card-body bg-light my-2">
            <div class="text-center">
                <h2><strong>Hello, new Creator!!! <br> Feel free to register your account!</strong></h2>
                <div class="alert alert-danger">
                    <strong>!!! Please, use STRONG Password, that contains both UPPERCASE and lowercase letters,
                        digits and even some $pecial $ymbols. Don't use dates of birth, wedding, historical events
                        and names !!!</strong>
                </div>
            </div>
            <form action="<?php echo URLROOT; ?>/users/register" method="post">
                <div class="form-group pb-3">
                    <label for="username"><strong>Username: <sup>*</sup></strong></label>
                    <input type="text" name="username" class="form-control form-control-lg"
                           value="<?php echo $data['username']; ?>">
                    <span class="text-white bg-danger"><?php echo $data['username_err']; ?></span>
                </div>
                <div class="form-group pb-3">
                    <label for="email"><strong>Email: <sup>*</sup></strong></label>
                    <input type="email" name="email" class="form-control form-control-lg"
                           value="<?php echo $data['email']; ?>">
                    <span class="text-white bg-danger"><?php echo $data['email_err']; ?></span>
                </div>
                <div class="form-group pb-3">
                    <label for="password"><strong>Password: <sup>*</sup></strong></label>
                    <input type="password" name="password" class="form-control form-control-lg"
                           value="<?php echo $data['password']; ?>">
                    <span class="text-white bg-danger"><?php echo $data['password_err']; ?></span>
                </div>
                <div class="form-group pb-3">
                    <label for="confirm_password"><strong>Confirm Password: <sup>*</sup></strong></label>
                    <input type="password" name="confirm_password" class="form-control form-control-lg"
                           value="<?php echo $data['confirm_password']; ?>">
                    <span class="text-white bg-danger"><?php echo $data['confirm_password_err']; ?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Register" class="btn btn-success col-12">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-outline-primary col-12">
                            Have account? Login!
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once APPROOT . '/views/inc/footer.php'; ?>