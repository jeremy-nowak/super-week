<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
</head>
<body>
    <table>
        <thead>
            <tr>
            <th>nom de famille</th>
            <th>Prénom</th>
            <th>email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user):?>

            <tr>
            <th><?=$user["last_name"]?></th>
            <th><?=$user["first_name"]?></th>
            <th><?=$user["email"]?></th>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>