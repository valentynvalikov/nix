<?php require_once APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card card-body bg-light mt-2">
            <div class="text-center">
                <?php flash('success'); ?>
                <h2><strong>Hello, Creator!!! <br> Feel free to login!</strong></h2>
            </div>
            <form action="<?php echo URLROOT; ?>/users/login" method="post">
                <div class="form-group pb-3">
                    <label for="username"><strong>Username: <sup>*</sup></strong></label>
                    <input type="text" name="username" class="form-control form-control-lg"
                           value="<?php echo $data['username']; ?>">
                    <span class="text-white bg-danger"><?php echo $data['username_err']; ?></span>
                </div>
                <div class="form-group pb-3">
                    <label for="password"><strong>Password: <sup>*</sup></strong></label>
                    <input type="password" name="password" class="form-control form-control-lg"
                           value="<?php echo $data['password']; ?>">
                    <span class="text-white bg-danger"><?php echo $data['password_err']; ?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input id="field" type="submit" value="Login" class="btn btn-success col-12">
                    </div>
                    <input id="rofl" type="hidden" name="image">
                    <div class="col">
                        <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-outline-primary col-12">
                            No account? Register!
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once APPROOT . '/views/inc/footer.php'; ?>