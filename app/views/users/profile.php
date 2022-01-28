<?php require_once APPROOT . '/views/inc/header.php'; ?>

<div class="container">
    <h1><?php echo $data['title']; ?></h1>
    <h3>Hello, Creator! You can edit your profile on this page!</h3>
    <?php echo $_SESSION['user_email']; ?>
</div>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>