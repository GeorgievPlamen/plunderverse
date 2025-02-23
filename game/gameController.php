<?php
// Get Game data here
require_once '../config/database.php';

$data = json_decode(file_get_contents("php://input"), true);
$character_id = $data['character_id'];
$chosen_action = $data['action_key'];

// Извличане на текущото състояние
$sql = "SELECT * FROM game_state WHERE character_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $character_id);
$stmt->execute();
$result = $stmt->get_result();
$gameState = $result->fetch_assoc();

// Изпращане на заявка към AI
$aiRequest = [
    "previous_story" => $gameState["story"],
    "save_context" => json_decode($gameState["save_context"]),
    "player_specific_context" => json_decode($gameState["player_specific_context"]),
    "selected_action" => $chosen_action
];

$aiResponse = sendRequestToAI($aiRequest); // Функция за комуникация с AI

// Обновяване на базата данни
$stmt = $conn->prepare("UPDATE game_state SET story = ?, actions = ?, save_context = ?, player_specific_context = ?, generate_image = ? WHERE character_id = ?");
$stmt->bind_param("ssssii", $aiResponse["story"], json_encode($aiResponse["actions"]), json_encode($aiResponse["save_context"]), json_encode($aiResponse["player_specific_context"]), $aiResponse["generate_image"], $character_id);
$stmt->execute();

echo json_encode($aiResponse);
