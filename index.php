<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Accept, Content-Type, Access-Control-Allow-Header');
header('Content-type: application/json');
header('Access-Control-Max-Age: 3600');

if ($_SERVER ['REQUEST_METHOD'] === 'OPTIONS') {
    return 0;
}

try {
$db = new PDO('mysql:host=localhost;dbname=todo2;charset=utf8', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql = "select * from task";
$query = $db->query($sql);
$results = $query->fetchAll(PDO::FETCH_ASSOC);
echo header('HTTP/1.1 200 OK');
echo json_encode($results);
}
catch (PDOException $pdoex) {
    echo header('HTTP/1.1 500 Internal Server Error');
    $error = array('error' => $pdoex->getMessage());
    echo json_encode($error);
    exit;
}