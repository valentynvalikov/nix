<?php require_once '../app/config/config.php'; ?>
<?php require_once APPROOT . '/views/inc/header.php'; ?>

<div class="container">

<h3>Hello, new Creator!!! Feel free to register your account!</h3>
<h5 class="bg-warning">
    <strong>!!! You must use STRONG Password, that contains both UPPERCASE and lowercase letters,
    digits and even some $pecial $ymbols. Don't use dates of birth, wedding, historical events and names !!!</strong>
</h5>
<form id="reg" action="register.php" method="post">
    <fieldset class="form-group">
        <div class="form-group row">
            <label class="col-form-label col-2" for="username">Username</label>
            <div class="col-8">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" />
            </div>
        </div>
        <div class="form-group row pt-2">
            <label class="col-form-label col-2" for="password">Password</label>
            <div class="col-8">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
            </div>
        </div>
        <div class="form-group row pt-2">
            <label class="col-form-label col-2" for="confirm_password">Confirm Password</label>
            <div class="col-8">
                <input type="password" class="form-control" id="confirm_password"
                name="confirm_password" placeholder="Confirm Password" />
            </div>
        </div>
        <div class="form-group offset-2 pt-3">
            <input type="submit" class="btn btn-primary" name="submit" value="Register" />
        </div>
    </fieldset>
</form>

</div>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>