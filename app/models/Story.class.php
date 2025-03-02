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

    public function generateGmMsg($actionKey)
    {
        $saveContextArr = json_decode($this->saveContext, true);
        if ($saveContextArr === null) {
            $saveContextArr = [];
        }

        $worldContextArr = json_decode($this->worldContext, true);
        if ($worldContextArr === null) {
            $worldContextArr = [];
        }

        $selectedAction = $actionKey;

        $msg = [
            'previous_story'  => $this->story,
            'selected_action' => $selectedAction,
            'save-context'    => $saveContextArr,
            'world-context'   => $worldContextArr,
        ];

        return json_encode($msg);
    }
}
