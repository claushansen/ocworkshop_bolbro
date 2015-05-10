<?php
/**
 * @file
 * Default template for an advanced poll bar - based on default Drupal Poll template.
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
print $chart;
?>

<h2>Piechart</h2>
<div class="total"><?php print t('Total votes: @total', array('@total' => $total)); ?></div>
<?php print_r($items); ?> 
<div class="poll" id="advpoll-<?php print $nid; ?>">
<div class="col-md-12">
<div id="chartdiv" style="width:100%; height:400px;"> piechart</div>
</div>    
    <div class="total"><?php print t('Total votes: @total', array('@total' => $total)); ?></div>

    <?php if ($voted): ?>
    <div class="poll-message"><?php print t('Thank you for voting.'); ?></div>
    <?php endif; ?>
    
    <?php print $cancel_form; ?>
    <script>drawChart();</script>
</div>