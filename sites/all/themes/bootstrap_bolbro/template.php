<?php

/**
 * @file
 * template.php
 */
function bootstrap_bolbro_preprocess_field(&$variables) {
    if($variables['element']['#field_name'] == 'field_event_image'){
        foreach($variables['items'] as $key => $item){
            $variables['items'][ $key ]['#item']['attributes']['class'][] = 'img-responsive'; // http://getbootstrap.com/css/#overview-responsive-images
        }
    }
}