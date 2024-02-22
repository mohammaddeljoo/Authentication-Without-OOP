<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M.Deljoo auth</title>
</head>
<body>
    <?= "from index";?>
    <a href="<?= site_url('?action=logout') ?>">LOOOOG  OOOUUUTTT !!!!!</a>
    <ul>
    <?php foreach($userData as $key => $value) : ?>
       
        <li><?= "$key: $value" ?></li>

        <?php endforeach; ?>
    </ul>
   
</body>
</html>