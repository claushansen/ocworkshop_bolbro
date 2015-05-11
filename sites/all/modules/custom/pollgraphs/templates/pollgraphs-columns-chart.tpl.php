<?php
/**
 * @file
 * Template for an Pollgraphs Google columns Chart 
 *
 * Variables available:
 * - $title: The title of the poll.
 * - $votes: The number of votes for this choice
 * - $percentage: The percentage of votes for this choice.
 * - $vote: The choice number of the current user's vote.
 * - $voted: Set to TRUE if the user voted for this choice.
 */

// add extra class to wrapper so that user's selected vote can have a different style.
$voted_class = '';
if ($voted) {
    $voted_class = ' voted';
}
//drupal_add_js('https://www.google.com/jsapi', 'external');
//print $chart;
?>

<div class="poll" id="advpoll-<?php print $nid; ?>">
<div class="col-md-12">
<?php print $chart; ?>
</div>    
    <div class="total"><?php print t('Total votes: @total', array('@total' => $total)); ?></div>

    <?php if ($voted): ?>
    <div class="poll-message"><?php print t('Thank you for voting.'); ?></div>
    <?php endif; ?>
    
    <?php print $cancel_form; ?>
    
</div>