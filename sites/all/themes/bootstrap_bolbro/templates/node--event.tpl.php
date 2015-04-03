<?php

/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>
<?php
/**
* Uncomment var_dump to see what data you can play with :-)
**/
//var_dump($content);

/**
* We start by setting up some prefix and suffix on our fields
*
**/
//event datetime
if ($page): 
$content['field_event_time'][0]['#prefix'] = '<div class="datetime"><span class="glyphicon glyphicon-calendar"></span> ';
$content['field_event_time'][0]['#suffix'] = '</div>';
//eventype
$content['field_event_type'][0]['#prefix'] = '<div class="label label-info"><span class="glyphicon glyphicon-user"></span> ';
$content['field_event_type'][0]['#suffix'] = '</div>';
//event performer
$content['field_performer'][0]['#prefix'] = '<div class="performer"><span class="glyphicon glyphicon-bullhorn"></span> ';
$content['field_performer'][0]['#suffix'] = '</div>';
//event target group
$content['field_event_target_group'][0]['#prefix'] = '<div class="label label-success"><span class="glyphicon glyphicon-screenshot"></span> ';
$content['field_event_target_group'][0]['#suffix'] = '</div>';
//event venue
$content['field_event_venue'][0]['#prefix'] = '<div class="label label-primary"><span class="glyphicon glyphicon-map-marker"></span> ';
$content['field_event_venue'][0]['#suffix'] = '</div>';
//performer
$content['field_payment'][0]['#prefix'] = '<div class="label label-warning"><span class="glyphicon glyphicon-shopping-cart"></span> ';
$content['field_payment'][0]['#suffix'] = '</div>';
endif;
 ?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php print $user_picture; ?>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <div class="submitted">Event
      <?php print $submitted; ?>
    </div>
  <?php endif; ?>

  <div class="content"<?php print $content_attributes; ?>>
  <?php if($page): ?>
  <div class="row">
  <!--event image-->
  <?php if($content['field_event_image']): ?>
  <div class="col-md-3 event-img-box">
  <?php
  //render the image here
   print render($content['field_event_image']);
   ?>
  </div>
  <?php endif; ?>
  <!--/event image-->
  <!--event details-->
  <div class="col-md-9 event-details-box">
  <?php if($content['field_event_time']): ?>
  <div class="event-date">
  <?php print render($content['field_event_time']);?>
  </div>
  <?php endif; ?>
  <?php if($content['field_performer']): ?>
  <div class="event-performer">
  <?php print render($content['field_performer']);?>
  </div>
  <?php endif; ?>
  <?php if($content['field_event_type']): ?>
  <div class="event-type">
  <?php print render($content['field_event_type']);?>
  </div>
  <?php endif; ?>
  <?php if($content['field_event_target_group']): ?>
  <div class="event-target-group">
  <?php print render($content['field_event_target_group']);?>
  </div>
  <?php endif; ?>
  <?php if($content['field_event_venue']): ?>
  <div class="event-venue">
  <?php print render($content['field_event_venue']);?>
  </div>
  <?php endif; ?>
  <?php if($content['field_payment']): ?>
  <div class="event-payment">
  <?php print render($content['field_payment']);?>
  </div>
  <?php endif; ?>
  </div>
  <!--/event details-->
  </div>
  <div class="row">
  <!--event description-->
  <div class="col-md-12 event-description">
  <?php print render($content['field_event_description']);?>
  </div>
  <!--/event description-->
  </div>
  <?php endif;?>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>

  <?php print render($content['links']); ?>

  <?php print render($content['comments']); ?>

</div>
