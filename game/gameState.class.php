<?php
class GameState
{
    public $character_id;
    public $story;
    public $actions;
    public $save_context;
    public $player_specific_context;
    public $image_url;
    public $generate_image;

    public function __construct($character_id, $story, $actions, $save_context, $player_specific_context, $image_url, $generate_image)
    {
        $this->character_id = $character_id;
        $this->story = $story;
        $this->actions = json_encode($actions);
        $this->save_context = json_encode($save_context);
        $this->player_specific_context = json_encode($player_specific_context);
        $this->image_url = $image_url;
        $this->generate_image = $generate_image;
    }

    public function saveToDatabase($conn)
    {
        $stmt = $conn->prepare("INSERT INTO game_state (character_id, story, actions, save_context, player_specific_context, image_url, generate_image) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssssi", $this->character_id, $this->story, $this->actions, $this->save_context, $this->player_specific_context, $this->image_url, $this->generate_image);
        $stmt->execute();
    }
}
