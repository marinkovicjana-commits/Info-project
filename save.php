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
