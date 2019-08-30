<?php
/**
 * Dice controller
 */
return [
    "mount" => "dice",
    
    // All routes in order
    "routes" => [
        [
            "info" => "Dice controller.",
            "mount" => "",
            "handler" => "\Kehe17\Dice\DiceController",
        ],
        [
            "info" => "Dice controller.",
            "mount" => "new",
            "handler" => "\Kehe17\Dice\DiceController",
        ],
        [
            "info" => "Dice controller.",
            "mount" => "game",
            "handler" => "\Kehe17\Dice\DiceController",
        ],
        [
            "info" => "Dice controller.",
            "mount" => "doai",
            "handler" => "\Kehe17\Dice\DiceController",
        ],
        [
            "info" => "Dice controller.",
            "mount" => "roll",
            "handler" => "\Kehe17\Dice\DiceController",
        ],
        [
            "info" => "Dice controller.",
            "mount" => "pass",
            "handler" => "\Kehe17\Dice\DiceController",
        ],
    ]
];
