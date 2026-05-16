<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Travel Wish List</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h1>🌍 Travel Wish List</h1>
<p class="subtitle">Add places you want to visit and why you want to go there.</p>

<form action="save.php" method="post" onsubmit="return validateForm();">

<label for="name">Destination</label>
<input type="text" id="name" name="name" placeholder="Enter destination">

<label for="note">Reason to Visit</label>
<input type="text" id="note" name="note" placeholder="Why do you want to visit?">

<button type="submit">Add Destination</button>
</form>

<h2>My Travel List</h2>

<div class="list-box">
<?php
$file = "data.json";

if (file_exists($file)) {
$data = file_get_contents($file);
$destinations = json_decode($data, true);

if (!empty($destinations)) {

foreach ($destinations as $item) {

$safeName = htmlspecialchars($item["name"]);
$safeNote = htmlspecialchars($item["note"]);

echo "<li><strong>$safeName</strong>: $safeNote</li>";
}

echo "</ul>";

} else {

echo "<p>No destinations added yet.</p>";
}

} else {

echo "<p>No destinations added yet.</p>";
}
?>
</div>
</div>

<script src="script.js"></script>
</body>
</html>
