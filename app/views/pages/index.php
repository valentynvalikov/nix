<?php require_once APPROOT . '/views/inc/header.php'; ?>

<div>
    <h1><?php echo $data['title']; ?></h1>
    <h1>Posts</h1>
    <table class="table table-hover table-sm">
        <tr class="table-primary">
            <th>Title</th>
            <th>Description</th>
            <th>Author</th>
            <th>Created at</th>
        </tr>
        <?php foreach ($data['posts'] as $post) : ?>
            <tr class="table-light">
                <td><h5><?php echo htmlspecialchars($post->title); ?></h5></td>
                <td><?php echo htmlspecialchars($post->description); ?></td>
                <td><?php echo htmlspecialchars($post->author); ?></td>
                <td><?php echo htmlspecialchars(date('H:i:s d-m-Y', $post->created_at)); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>
