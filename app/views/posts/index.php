<?php require_once APPROOT . '/views/inc/header.php'; ?>
    <div class="col-md-8 mx-auto mb-3">
        <span class="text-center"><?php flash('success'); ?></span>
        <?php foreach ($data['posts'] as $post) : ?>
            <div class="card card-body bg-light my-2">
                <h2 class="text-center"><strong>
                        <a class="text-black-50" href="<?php echo URLROOT . '/posts/show/' . h($post->postId) . '">' . h($post->title); ?></a></strong></h2>
                <p class="text-end fst-italic">
                        Written by <?php echo h($post->username) . ' at ' . h($post->postCreated); ?>
                </p>
                <p><?php echo h($post->description); ?></p>
                <?php if ($_SESSION['user_id'] == $post->user_id) : ?>
                    <div class="row">
                        <div class="col-6 ms-auto">
                            <a href="<?php echo URLROOT . '/posts/edit/' . h($post->postId); ?>"
                               class="btn btn-info col-12">Edit or Delete Post >>></a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
        <?php require_once APPROOT . '/views/inc/pagination.php'; ?>
    </div>
<?php require_once APPROOT . '/views/inc/footer.php'; ?>
