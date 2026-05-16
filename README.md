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
<?php

$destination = trim($_POST["name"] ?? "");
$reason = trim($_POST["note"] ?? "");

if ($destination === "" || $reason === "") {

header("Location: index.php");
exit();
}

$file = "data.json";

if (file_exists($file)) {

$data = file_get_contents($file);

$destinations = json_decode($data, true);

if (!is_array($destinations)) {

$destinations = [];
}

} else {

$destinations = [];
}

$newDestination = [

"name" => $destination,
"note" => $reason
];

$destinations[] = $newDestination;

file_put_contents($file, json_encode($destinations, JSON_PRETTY_PRINT));

header("Location: index.php");

exit();

?>

body {
font-family: Arial, sans-serif;
background-color: #dff6ff;
margin: 0;
padding: 0;
}

.container {
width: 80%;
max-width: 600px;
margin: 40px auto;
background: white;
padding: 24px;
border-radius: 10px;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.08);
}

h1 {
margin-top: 0;
}

.subtitle {
color: #666;
margin-bottom: 20px;
}

label {
display: block;
margin-top: 12px;
margin-bottom: 6px;
font-weight: bold;
}

input {
width: 100%;
padding: 10px;
box-sizing: border-box;
margin-bottom: 10px;
}

button {
margin-top: 10px;
padding: 10px 16px;
border: none;
background-color: #00a8a8;
color: white;
border-radius: 6px;
cursor: pointer;
}

button:hover {
background-color: #007c7c;
}

.list-box {
margin-top: 20px;
background: #fafafa;
padding: 16px;
border-radius: 8px;
}

ul {
padding-left: 20px;
}
 
function validateForm() {

const name = document.getElementById("name").value.trim();
const note = document.getElementById("note").value.trim();

if (name === "" || note === "") {

alert("Please enter a destination and a reason.");
return false;
}

if (note.length > 50) {

alert("Reason must be 50 characters or less.");
return false;
}

return true;
}

[]
