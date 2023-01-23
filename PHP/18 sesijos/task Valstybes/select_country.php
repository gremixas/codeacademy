<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select country</title>
    <script defer src="script.js"></script>
</head>
<body>
<?php
session_start();
$country = $_SESSION['country'] ?? "none";
echo "<h2>Your fav country is $country</h2>";
?>
<a href="remove_country.php?action=remove">Remove</a>
<form action="save_country.php" method="POST" id="countryform">
    <label for="country">Select fav country:</label>
    <select name="country" id="country" form="countryform" size="5">
            <option value="Lithuania">Lithuania</option>
            <option value="Portugal">Portugal</option>
            <option value="Japan">Japan</option>
            <option value="fake">fake</option>
            <option value="fake2">fake2</option>
    </select>
    <button type="submit">Submit</button>
</form>
</body>
</html>
