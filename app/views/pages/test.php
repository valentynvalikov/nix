<?php require_once APPROOT . '/views/inc/header.php'; ?>
<form action="<?php echo URLROOT; ?>/pages/about" method="post">
    <div class="form-group">
        <label for="value1">Значение 1</label>
        <input class="form-control" type="text" name="value1" id="value1">
    </div>
    <div class="form-group">
        <label for="value1">Значение 2</label>
        <select class="form-control" name="value2" id="value2">
            <option></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
    </div>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" name="value3" id="Check1">
        <label class="custom-control-label" for="Check1">Значение 3</label>
    </div>
    <div class="custom-control custom-radio">
        <input type="radio" id="Radio1" name="customRadio" name="value4" class="custom-control-input">
        <label class="custom-control-label" for="Radio1">Значение 4</label>
    </div>
    <div class="form-group">
        <label for="value5">Значение 5</label>
        <textarea class="form-control" rows="3" name="value5" id="value5"></textarea>
    </div>
    <div class="form-group">
        <label for="range">Диапазон</label>
        <input class="custom-range" type="range" min="1000" max="10000" name="value6" id="range">
    </div>
    <button type="submit" class="btn btn-primary">Отправить</button>
</form>
<?php print_r($data); ?>
<?php require APPROOT . '/views/inc/footer.php';