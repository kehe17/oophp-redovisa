<?php
/**
 * Guess the number game.
 */

use Kehe17\Dice\DiceGame;

/**
 * Landing page.
 */
$app->router->get("dice", function () use ($app) {
    $title = "Dice game";

    $app->page->add("dice/landing");
    // $app->page->add("dice/debug");

    return $app->page->render([
        "title" => $title,
    ]);
});

/**
 * Start new game.
 */
$app->router->get("dice/new", function () use ($app) {
    $app->session->set('dice', new Kehe17\Dice\DiceGame(2, 2));

    return $app->response->redirect("dice/game");
});

/**
 * Play game.
 */
$app->router->get("dice/game", function () use ($app) {
    $title = "Dice game";
    $game = $app->session->get('dice');

    if (!$game) {
        return $app->response->redirect("dice");
    }

    $app->session->set('dice', $game);
    $app->page->add("dice/game", [$game]);
    // $app->page->add("dice/debug", [$game]);

    return $app->page->render([
        "title" => $title,
    ]);
});

/**
 * Post route to make guess.
 */
$app->router->get("dice/doai", function () use ($app) {
    $game = $app->session->get('dice');

    if (!$game) {
        return $app->response->redirect("dice");
    }

    $score = $game->getScore(1);
    $playerScore = $game->getScore(0);
    $turnScore = $game->getTurnScore();

    if (($turnScore + $score < 100) && ($playerScore > 90 || $turnScore < 10
        || ($score + $turnScore < $playerScore && $turnScore < 25))) {
        $game->doRoll(1);
    } else {
        $game->endTurn(1);
    }

    return $app->response->redirect("dice/game");
});

/**
 * Post route to make guess.
 */
$app->router->post("dice/roll", function () use ($app) {
    $game = $app->session->get('dice');

    if (!$game) {
        return $app->response->redirect("dice");
    }

    $game->doRoll(0);

    return $app->response->redirect("dice/game");
});

/**
 * Post route to make guess.
 */
$app->router->post("dice/pass", function () use ($app) {
    $game = $app->session->get('dice');

    if (!$game) {
        return $app->response->redirect("dice");
    }

    $game->endTurn(0);

    return $app->response->redirect("dice/game");
});
