<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../interface_utilisateur/asset/css/upload.css" rel="stylesheet">
</head>
<body>
    <form action="process/insert_operator.php" method="post">
    <input type="text" name="name" placeholder="name">
    <input type="text" name="grade" placeholder="rate">
    <input type="text" name="link" placeholder="link">
    <input type="number" name="is_premium" placeholder="premium">
    <input type="submit" name="ajouter"> 
    <a href="admin_operator.php"><button type="button"><span>⇠</span></button></a>
    </form>
</body>
</html>