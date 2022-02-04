<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
     xmlns="http://www.w3.org/1999/html">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Delete <strong><?php echo h($data['post']->title); ?></strong> ?!
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Are you REALLY sure?!</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">
                    <a class="id" style="text-decoration: none; color: white"
                       href="<?php echo URLROOT . '/posts/delete/';
                        if (isset($data['post']->id)) {
                                echo $data['post']->id;
                        } else {
                                echo $post->postId;
                        }; ?>">Delete Post</a>
                </button>
            </div>
        </div>
    </div>
</div>