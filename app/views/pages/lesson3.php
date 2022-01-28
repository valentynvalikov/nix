<?php require_once APPROOT . '/views/inc/header.php'; ?>

<?php
if (isset($_POST['text'])) {
    $text = $_POST['text'];
} else {
    $text = "";
}
$text = iconv('windows-1251', 'utf-8', strrev(iconv('utf-8', 'windows-1251', $text)));

if (!empty($text)) {
    echo "<h2 class=\"px-3\">You have typed: $text - in reverse!</h2>";
}
?>
<form id="text" action="<?php echo URLROOT . '/pages/lesson/3'; ?>" method="post">
     <fieldset class="form-group">
          <div class="form-group row">
              <div class="col-9">
                    <input class="form-control my-3 p-3" type="text" name="text" placeholder="Type your text here" />
              </div>
              <div class="col-1">
                    <button class="btn btn-secondary text-nowrap my-3 p-3" type="submit">Send text</button>
              </div>
          </div>
      </fieldset>
</form>

<?php require APPROOT . '/views/inc/footer.php'; ?>