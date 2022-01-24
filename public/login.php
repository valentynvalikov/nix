<?php require_once '../app/config/config.php'; ?>
<?php require_once APPROOT . '/views/inc/header.php'; ?>

<div class="container">

<h3>Please, Login!</h3>
<form id="login" action="login.php" method="post">
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
        <div class="form-group offset-2 pt-3">
            <input type="submit" class="btn btn-primary" name="submit" value="Login" />
        </div>
    </fieldset>
</form>

</div>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>
