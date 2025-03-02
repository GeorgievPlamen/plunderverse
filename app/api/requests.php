<?php

function queryGm($msg)
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
            ['role' => 'user', 'content' => $msg],
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
