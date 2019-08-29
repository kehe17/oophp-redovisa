<?php

namespace Anax\View;

$stylesheets[] = 'css/dice.css';

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
// echo showEnvironment(get_defined_vars(), get_defined_functions());
$finished = $data[0]->getStatus();

if ($data[0]->getTurn() === 1 && !$finished) {
    header("refresh:2; url=doai");
}
?>

<?php if ($finished) : ?>
<h2><?= $data[0]->getTurn() !== 0 ? "Player" : "Computer" ?> wins!</h2>
<?php endif; ?>

<h2>Computer</h2>
<p>
<?php foreach ($data[0]->getDice(1)["graphics"] as $die) : ?>
    <i class="die-sprite <?= $die ?>"></i>
<?php endforeach; ?>
<br>
<?= $data[0]->getTurn() === 1 ? "Turn Score: " . $data[0]->getTurnScore(1) : "" ?>
<br>Total Score: <?= $data[0]->getScore(1) ?>
</p>

<h2>Player</h2>
<p>
<?php foreach ($data[0]->getDice(0)["graphics"] as $die) : ?>
    <i class="die-sprite <?= $die ?>"></i>
<?php endforeach; ?>
<br>
<?= $data[0]->getTurn() === 0 ? "Turn Score: " . $data[0]->getTurnScore(0) : "" ?>
<br>Total Score: <?= $data[0]->getScore(0) ?>
</p>


<form method="POST" action="roll">
<input type="submit" value="Roll dice" <?= $data[0]->getTurn() !== 0 || $finished ? "disabled" : "" ?> >
</form>
<br>
<form method="POST" action="pass">
<input type="submit" value="End turn" <?= $data[0]->getTurn() !== 0 || $finished ? "disabled" : "" ?> >
</form>
<br>
<a href="new"><input type="submit" value="New game"></a>
