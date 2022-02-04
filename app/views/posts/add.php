<?php require_once APPROOT . '/views/inc/header.php'; ?>
    <div class="col-md-8 mx-auto">
        <div class="card card-body bg-light my-2">
            <h2 class="text-center"><strong>Feel free to say something!</strong></h2>
            <form action="<?php echo URLROOT; ?>/posts/add" method="post">
                <div class="form-group pb-3">
                    <label for="title"><strong>Enter title: <sup>*</sup></strong></label>
                    <input type="text" name="title" class="form-control form-control-lg"
                           value="<?php echo $data['title']; ?>">
                    <span class="text-white bg-danger"><?php echo $data['title_err']; ?></span>
                </div>
                <div class="form-group pb-3">
                    <label for="description"><strong>Enter post content: <sup>*</sup></strong></label>
                    <textarea name="description" class="form-control form-control-lg"><?php
                        echo $data['description']; ?></textarea>
                    <span class="text-white bg-danger"><?php echo $data['description_err']; ?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Create a post" class="btn btn-success col-12">
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php require_once APPROOT . '/views/inc/footer.php'; ?>