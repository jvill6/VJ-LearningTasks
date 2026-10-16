<?php
// debug_pages.php

// This file provides links to all pages for debugging purposes.

$pages = [
    'Dashboard' => 'Dashboard.php',
    'Environment' => 'environment.php',
    'Footer' => 'footer.php',
    'Index' => 'index.php',
    'Manage Plants' => 'ManagePlants.php',
    'Navigational' => 'navigational.php',
    'Plant Registration' => 'plant_registration.php',
    'Plant Profile' => 'plantprofile.php',
    'Register' => 'register.php',
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Debug Pages</title>
    <link rel="stylesheet" href="styling.css">
</head>
<body>
    <h1>Debug Pages</h1>
    <ul>
        <?php foreach ($pages as $name => $file): ?>
            <li><a href="<?php echo $file; ?>"><?php echo $name; ?></a></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>