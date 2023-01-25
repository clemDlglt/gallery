<?php
$root = getcwd();

$scan = get_folder_content($root);

foreach($scan as $folder) {
    $images[$folder] = get_folder_content($folder);
}

function get_folder_content($path) {
    $hidden_files = ['.git', 'index.php'];

    $scan = array_diff(scandir($path), array('.', '..'));
    $scan = array_diff($scan, $hidden_files);

    return $scan;
}

var_dump($images);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>

    <style>
        body {
            font-family: sans-serif;
        }

        .list {
            list-style-type: none;
        }

        .list-item {
            display: flex;
            align-items: end;
            gap: .5rem;
            text-decoration: none;
            font-weight: 500;
            color: black;
        }
    </style>
</head>

<body>
    <ul class="list">
        <?php foreach($scan as $entry) { 
            var_dump(json_encode($images[$entry], JSON_FORCE_OBJECT));
            ?>
            <li class="list-item" data-images="<?php echo json_encode($images[$entry]) ?>">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" style="width: 24px; height: 24px">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                </svg>
                <?php echo $entry ?>
            </li>
        <?php } ?>
    </ul>

    <div>

    </div>

    <script >
        const listItems = document.querySelectorAll('.list-item');
        listItems.forEach((item) => {
            item.addEventListener('click', () => {
                console.log(item.dataset.images);
            });
        });
    </script>
</body>
</html>