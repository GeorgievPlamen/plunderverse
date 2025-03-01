<?php

class Scene
{
    public $id;
    public $img;
    public $scene;
    public $story;
    public $actions;

    public function print()
    {
        echo $this->id;
        echo $this->img;
        echo $this->scene;
        echo $this->story;
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
}
