<?php

include '../db/connect.php';

$stmt = $conn->prepare("INSERT INTO location (latitude, longitude) VALUES (?, ?)");
$stmt->bind_param("ss", $latitude, $longitude);

$latitude = isset($_POST['latitude'])
    ? $_POST['latitude']
    : '';

$longitude = isset($_POST['longitude'])
    ? $_POST['longitude']
    : '';

$insert1 = $stmt->execute();
//printf("%d row inserted.\n", $stmt->affected_rows);

$stmt->close();

$stmt = $conn->prepare("INSERT INTO library (lib_name, ip, format, db_name, port, location_id) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssii", $lib_name, $ip, $format, $db_name, $port, $location_id);

$lib_name = isset($_POST['lib_name'])
    ? $_POST['lib_name']
    : '';

$ip = isset($_POST['ip'])
    ? $_POST['ip']
    : '';
$format = isset($_POST['format'])
    ? $_POST['format']
    : '';
$db_name = isset($_POST['db_name'])
    ? $_POST['db_name']
    : '';
$port = isset($_POST['port'])
    ? $_POST['port']
    : '';

$location_id = $conn->insert_id;

$insert2 = $stmt->execute();
//printf("%d row inserted.\n", $stmt->affected_rows);
$stmt->close();
$conn->close();


if($insert1 == TRUE && $insert2 == TRUE)
    echo 'ok';
else
    echo 'err';

?>