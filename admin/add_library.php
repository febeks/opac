<?php

include '../db/connect.php';

$stmt = $conn->prepare("INSERT INTO library (lib_name, ip, format, db_name, port) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssssi", $lib_name, $ip, $format, $db_name, $port);

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

$stmt->execute();
printf("%d row inserted.\n", $stmt->affected_rows);
$stmt->close();
$conn->close();

?>