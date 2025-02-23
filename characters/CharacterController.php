<?php
// Get character data here
require_once '../config/database.php';

header('Content-Type: application/json');

$sql = "SELECT id, name, vitality, strength, charisma, credits, hp FROM characters";
$result = $conn->query($sql);

$characters = [];
while ($row = $result->fetch_assoc()) {
    $characters[] = $row;
}

echo json_encode($characters);
?>

<?php
require_once '../config/database.php';
require_once '../models/Character.php';

$data = json_decode(file_get_contents("php://input"), true);

$newCharacter = new Character($data['name'], $data['vitality'], $data['strength'], $data['charisma']);
$newCharacter->saveToDatabase($conn);

echo json_encode(["message" => "Character created successfully"]);
?>

