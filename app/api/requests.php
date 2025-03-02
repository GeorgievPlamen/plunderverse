<?php

function fetchGm($msg)
{
    global $env;
    $key = $env['OPEN_AI_KEY'];

    $url = 'https://api.openai.com/v1/chat/completions';
    $ch = curl_init($url);

    $headers = [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $key
    ];

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_SSL_OPTIONS, CURLSSLOPT_NATIVE_CA);

    $primer = file_get_contents(APP_PATH . 'docs/primer.json');

    $payload = [
        'model'    => 'gpt-4o',
        'store'    => true,
        'messages' => [
            ['role' => 'developer', 'content' => $primer],
            ['role' => 'user', 'content' => '{        "previous_story": "This is the start of the game. Your ship, the Nebukanezar, tumbles through space, engines flickering. The battle was a disaster. Your crew is injured, your shields are barely holding, and an enemy warship is still scanning for survivors. If you don’t act fast, they’ll finish you off. Do you attempt a desperate escape, hail for mercy, or prepare for one last stand?",        "selected_action": "story_start",        "save-context": {          "scene": "space_battleship_aftermath",          "past_choices": []        },        "world-context": [          {            "item": "player",            "description": {              "name": "Eli Drake",              "level": 1,              "xp": "0/10",              "hp": "14/14",              "credits": 1500,              "stats": { "vitality": 2, "strength": 1, "charisma": 2 }            }          },          { "item": "ship_name", "description": "Nebukanezar" }        ]      }'],
        ]
    ];

    $jsonPayload = json_encode($payload);

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonPayload);

    $response = curl_exec($ch);

    if ($response === false) {
        echo 'Curl error: ' . curl_error($ch);
        return;
    }

    curl_close($ch);

    $jsonData = json_decode($response, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo 'Error: Failed to decode JSON: ' . json_last_error_msg();
        return;
    }

    if (!isset($jsonData['choices']) || !is_array($jsonData['choices']) || count($jsonData['choices']) < 1) {
        echo "Error: 'choices' key is missing or empty.";
        return;
    }

    if (!isset($jsonData['choices'][0]['message']) || !is_array($jsonData['choices'][0]['message'])) {
        echo "Error: 'message' key is missing in the first choice.";
        return;
    }

    if (!isset($jsonData['choices'][0]['message']['content'])) {
        echo "Error: 'content' key is missing in the message.";
        return;
    }

    return $jsonData['choices'][0]['message']['content'];
}
