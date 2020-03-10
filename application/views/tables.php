<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    ini dari halaman table
    <?php $i = 1; if($get) : ?>
    <table>
        <?php  foreach($get as $key) : ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $key['user_name']; ?></td>
                <td><?= $key['user_age']; ?></td>
                <td>
                    <?php if($key['user_gender'] == 0){
                        echo 'Female';
                    } else {
                        echo 'Male';
                    } ?>
                </td>
                <td><?= $key['user_religion']; ?></td>
            </tr>
        <?php endforeach ; ?>
    </table>
    <?php endif; ?>
</body>
</html>