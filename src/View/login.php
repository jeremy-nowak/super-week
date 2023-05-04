<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
</head>

<body>
    <?php
    if (isset($error)) {
        echo "<h2> $error </h2>";
    }
    ?>

    <form method="post" action="">

        <label for="mail">Mail:</label>
        <input name="email" type="email" placeholder="Email">

        <label for="pass">Password:</label>
        <input name="pass" type="password" placeholder="Password">

        <button type="submit">Validate</button>

    </form>

</body>

</html>