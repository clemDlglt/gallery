<?php
$path = getcwd();
$scan = array_diff(scandir($path), array('.', '..'));
var_dump($scan);
?>

<ul>
    <?php
    foreach($scan as $entry) {
        echo '<li>' . $entry . '</li>';
    }
    ?>
</ul>