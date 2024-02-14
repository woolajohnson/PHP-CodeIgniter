<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CI Feedback Form</title>
        <link rel="stylesheet" href="<?= base_url('assets/css/form.css') ?>">
    </head>
    <body>
        <form action="/main/result" method="post">
            <h1>Feedback Form</h1>
            <label for="name">Your Name (optional):</label>
            <input type="text" id="name" name="name">

            <label for="course_title">Course Title:</label>  
            <select name="course_title" id="course_title">
                <option value="PHP Track">PHP Track</option>
                <option value="Web Fundamentals">Web Fundamentals</option>
            </select>

            <label for="score">Given Score (1-10):</label>
            <select name="score" id="score">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>

            <label for="reason">Reason:</label>
            <textarea name="reason" id="reason" cols="30" rows="10"></textarea>
            <input type="submit" name="submit" value="Submit" id="submit">
        </form>
    </body>
</html>