<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Exercises</title>
</head>
<body>
    <main>
        <h2>Add New User</h2>
        <form action="/users/create" method="post">
            <label for="first_name">First name</label>
            <input name="first_name" type="text">

            <label for="last_name">Last name</label>
            <input name="last_name" type="text">

            <label for="email">Email </label>
            <input name="email" type="text">
            <input type="submit" name="submit" value="Submit">
        </form>
    </main>
</body>
</html>