<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <form action="/sites/E-commerce/scripts/post-create-user.php" method="post">
        <input type="text" required name="name" placeholder="Name:">
        <input type="email" required pattern="[a-z0-9\.]+@[a-z0-9\.]+" placeholder="Email:" name="email">
        <input type="password" required name="password">
        
        <button type="submit">Sign up!</button>
    </form>
</body>

</html>