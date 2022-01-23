<?php require_once 'inc/header.php'; ?>
<?php require_once 'posts.php'; ?>
<div class="container">

<div>
    <h1>Hello, NIX Education! This is Buggy!</h1>
    <h1>Posts</h1>
    <table class="table table-hover table-sm">
        <tr class="table-primary">
            <th>Title</th>
            <th>Description</th>
            <th>Author</th>
            <th>Created at</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($posts as $post) : ?>
            <tr class="table-light">
                <td><h5><?php echo htmlspecialchars($post['title']); ?></h5></td>
                <td><?php echo htmlspecialchars($post['description']); ?></td>
                <td><?php echo htmlspecialchars($post['author']); ?></td>
                <td><?php echo htmlspecialchars(date('H:i:s d-m-Y', $post['created_at'])); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

</div>

<?php require_once 'inc/footer.php'; ?>