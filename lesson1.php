<?php require_once 'inc/header.php'; ?>

<div class="container">
<div class="mult-table">
<?php
for ($i = 1; $i <= 10; $i++) :
    echo "<div class=\"mult-table-col\"> \n";
    for ($k = 1; $k <= 10; $k++) :
        $j = $i * $k;
        echo "$i * $k = $j \n";
        echo "<br> \n";
    endfor;
    echo "</div> \n";
endfor;
?>
</div>
</div>

<?php require_once 'inc/footer.php'; ?>