</div>
<?php require_once APPROOT . '/views/inc/modal.php'; ?>
<footer class="footer fixed-bottom bg-dark mt-2 py-2" style="color: white; text-align: center">
    &copy; <?php echo date('Y'); ?> <a style="color: white" href="<?php echo URLROOT; ?>">NIX Education</a>
</footer>
<script src="<?php echo URLROOT; ?>/js/bootstrap.bundle.js"></script>
<script src="<?php echo URLROOT; ?>/js/jquery.js"></script>
<script src="<?php echo URLROOT; ?>/js/jquery.validate.js"></script>
<script src="<?php echo URLROOT; ?>/js/form.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script>$(document).ready(function(){

        var element = $("#wrap"); // global variable
        var getCanvas; // global variable

        $("#field").mousedown(function () {
            html2canvas(element, {
                onrendered: function (canvas) {
                    getCanvas = canvas;
                    var imageData = getCanvas.toDataURL("image/png");
                    // Now browser starts downloading it instead of just showing it
                    //var newData = imageData.replace(/^data:image\/png/, "data:application/octet-stream");
                    //$("#qwe").append(canvas);

                    $("#rofl").attr("value", imageData);
                    // $("#btn-Preview-Image").attr("download", "your_pic_name.png").attr("href", newData);
                }
            });
        });
    });</script>
</body>
</html>