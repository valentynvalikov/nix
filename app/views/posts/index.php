<?php require_once APPROOT . '/views/inc/header.php'; ?>
    <div class="col-lg-8 mx-auto mb-3">
        <span class="text-center"><?php flash('success'); ?></span>
        <?php foreach ($data['pagePosts'] as $post) : ?>
            <div class="card card-body bg-light my-2">
                <h2 class="text-center">
                    <strong>
                        <a class="text-black-50" href="<?php echo URLROOT . '/posts/show/' .
                            h($post->postId); ?>"><?php echo h($post->title); ?>
                        </a>
                    </strong>
                </h2>
                <p class="text-end fst-italic">
                        Written by <?php echo h($post->username) . ' at ' . h($post->postCreated); ?>
                </p>
                <p class="cutted-text" style="white-space: pre"><?php echo s($post->description); ?></p>
                <div class="row">
                    <div class="col-5 me-auto">
                        <a href="<?php echo URLROOT . '/posts/show/' . h($post->postId); ?>"
                           class="btn btn-outline-primary col-12"><<< View Full Post</a>
                    </div>
                    <?php if ($_SESSION['user_id'] == $post->user_id) : ?>
                    <div class="col-5 ms-auto">
                        <a href="<?php echo URLROOT . '/posts/edit/' . h($post->postId); ?>"
                           class="btn btn-outline-warning col-12">Edit or Delete Post >>></a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
        <?php echo $data['pagination']; ?>
    </div>
<?php require_once APPROOT . '/views/inc/footer.php'; ?>
