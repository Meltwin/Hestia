<!DOCTYPE html>
<head>
    <title><?=$_PAGE->get_title()?></title>
    <meta charset="UTF-8"/>
    <?php $_PAGE->construct_header();?>
</head>
<body>
    <?php
    $_PAGE->construct_page();
    ?>
</body>