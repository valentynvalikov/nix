<?php require_once APPROOT . '/views/inc/header.php'; ?>
    <div class="col-md-8 mx-auto">
        <div class="card card-body bg-light my-2">
            <h2 class="text-center"><strong>You can edit your post.</strong></h2>
            <form action="<?php echo URLROOT . '/posts/edit/';
            if (!empty($data['id'])) {
                echo $data['id'];
            } else {
                echo $data['post']->id;
            }
            ?>" method="post">
                <div class="form-group pb-3">
                    <label for="title"><strong>Enter title: <sup>*</sup></strong></label>
                    <input type="text" name="title" class="form-control form-control-lg"
                           value="<?php if (isset($data['title'])) {
                                        echo $data['title'];
                                  } else {
                                        echo $data['post']->title;
                                  } ?>">
                    <span class="text-white bg-danger"><?php echo $data['title_err']; ?></span>
                </div>
                <div class="form-group pb-3">
                    <label for="description"><strong>Enter post content: <sup>*</sup></strong></label>
                    <textarea name="description" class="form-control form-control-lg" rows="7"><?php
                    if (isset($data['description'])) {
                        echo $data['description'];
                    } else {
                        echo $data['post']->description;
                    } ?></textarea>
                    <span class="text-white bg-danger"><?php echo $data['description_err']; ?></span>
                </div>
                <?php if ($_SESSION['user_id'] == $data['post']->user_id) : ?>
                    <div class="row">
                        <div class="col-lg-4 col-6 me-auto">
                            <input type="submit" value="Submit changes" class="btn btn-success col-12">
                        </div>
                        <div class="col-lg-3 col-6 ms-auto">
                            <a data-bs-toggle="modal" data-bs-target="#exampleModal"
                               class="btn btn-danger col-12">Delete</a>
                        </div>
                    </div>
                <?php endif; ?>
            </form>
        </div>
    </div>
<?php require_once APPROOT . '/views/inc/footer.php'; ?>