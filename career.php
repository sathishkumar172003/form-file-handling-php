<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Career Form </title>
</head>
<body>

    <form action="./career-handling.php" method="POST" enctype="multipart/form-data">

        <labell> Enter email </label>
        <input type="email" name="user_email" />

        <label> Resume </label>
        <input type="file" name="user_resume" /> 

        <button type="submit" > Apply </button>


    </form>
    
</body>
</html>