<?php require_once APPROOT . '/views/inc/header.php'; ?>

<div>
    <span class="text-center"><?php flash('success'); ?></span>
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
                <td><h5><?php echo h($post->title); ?></h5></td>
                <td><?php echo h($post->description); ?></td>
                <td><?php echo h($post->author); ?></td>
                <td><?php echo h(date('H:i:s d-m-Y', $post->created_at)); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>
