<?php
// Initialize the session


session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

require_once($_SERVER['DOCUMENT_ROOT'] . "/autoloader.php");

$json_a = classes\AmoCRM::user_info(0);
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            body {
                font: 14px sans-serif;
            }

            .wrapper {
                width: 360px;
                padding: 20px;
            }
        </style>
    </head>
    <body>


    <table id="maintable" class="table">
        <thead class="bg-primary">
        <tr>
            <th>Имя</th>
            <th>Группа</th>
            <th>email</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 0; $i < $json_a['_total_items']; $i++) {
            ?>
            <tr>
                <td><?php echo $json_a['_embedded']['users'][$i]['name']; ?></td>
                <td><?php echo $json_a['_embedded']['users'][$i]['email']; ?></td>
                <td><?php echo $json_a['_embedded']['users'][$i]['_embedded']['groups'][0]['name']; ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <a href="/logout.php">
        <button class="btn btn-primary">Выйти</button>
    </a>
    </body>
    </html>
<?php
