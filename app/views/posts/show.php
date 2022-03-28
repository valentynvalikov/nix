<?php require_once APPROOT . '/views/inc/header.php'; ?>
    <div class="col-md-8 mx-auto">
        <span class="text-center"><?php flash('success'); ?></span>
        <div class="card card-body bg-light my-2">
            <h2 class="text-center"><strong><?php echo h($data['post']->title); ?></strong></h2>
            <p class="text-end fst-italic">
                Written by <?php echo h($data['user']->username) . ' at ' . h($data['post']->created_at); ?>
            </p>
            <p style="white-space: pre"><?php echo s($data['post']->description); ?></p>
            <?php if ($_SESSION['user_id'] == $data['post']->user_id) : ?>
            <div class="row">
                <div class="col-lg-4 col-6 me-auto">
                    <a href="<?php echo URLROOT . '/posts/edit/' . h($data['post']->id); ?>"
                       class="btn btn-success col-12">Edit Post</a>
                </div>
                <div class="col-lg-3 col-6 ms-auto">
                    <a data-bs-toggle="modal" data-bs-target="#exampleModal"
                       class="btn btn-danger col-12">Delete</a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
<?php require_once APPROOT . '/views/inc/footer.php'; ?>