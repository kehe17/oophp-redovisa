<?php

namespace Kehe17\Dice;

/**
 * Showing off a standard class with methods and properties.
 */
class Dice
{
    /**
     * Constructor to create a die.
     *
     * @param int $sides  The number of sides on the die.
     */
    public function __construct($sides = 6)
    {
        $this->sides = $sides;
        $this->value = 0;
    }

    /**
     * @var int   $sides  The number of sides on the die.
     * @var int   $value  The value of the last roll.
     */
    private $sides;
    protected $value;


    /**
     * Roll the die.
     *
     * @return void.
     */
    public function roll()
    {
        $this->value = rand(1, $this->sides);
    }

    /**
     * Get last roll value.
     *
     * @return int.
     */
    public function getLastRoll()
    {
        return $this->value;
    }
}
