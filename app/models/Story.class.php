<?php

require_once("./app/app.php");

class Story
{
    public $id;
    public $img;
    public $scene;
    public $story;
    public $actions;
    public $characterId;
    public $generateImage;
    public $saveContext;
    public $worldContext;
    public $xpEarned;

    public function print()
    {
        echo $this->id;
        echo $this->characterId;
        print_r($this->actions);
        echo $this->generateImage;
    }

    public function getActionText($id)
    {
        $actionsArray = json_decode($this->actions, true);
        $result = 'EMPTY ACTION';

        if (isset($actionsArray[$id]['text'])) {
            $result = $actionsArray[$id]['text'];
        }

        return $result;
    }

    public function getActionKey($id)
    {
        $actionsArray = json_decode($this->actions, true);

        $result = 'EMPTY ACTION';

        if (isset($actionsArray[$id]['key'])) {
            $result = $actionsArray[$id]['key'];
        }

        return $result;
    }

    public function init()
    {
        $this->scene = json_decode($this->saveContext, true)['scene'];
        $this->img = 'StartOption_distress_signal_from_abandonded_ship.jpeg';
    }

    public function parseGmResponse($gmResponse)
    {
        $response = json_decode($gmResponse, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            echo 'Error: Failed to decode JSON: ' . json_last_error_msg();
            return;
        }

        $story = parseStory($response);
        $this->story = $story;

        $actions = parseActions($response);
        $this->actions = $actions;

        $saveContext = parseSaveContext($response);
        $this->saveContext = $saveContext;

        $this->scene = $saveContext['scene'];

        $generateImage = parseGenerateImage($response);
        $this->generateImage = $generateImage;

        $xpEarned = parseXpEarned($response);
        $this->xpEarned = $xpEarned;

        $worldContext = parseWorldContext($response);
        $this->worldContext = $worldContext;

        $player = parsePlayer($worldContext);

        print_r($player);
    }
}
