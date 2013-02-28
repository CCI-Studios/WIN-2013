<?php

// add menu classes to all menus
function win_2013_preprocess_menu_link(&$vars) {
 	$classes = $vars['element']['#attributes']['class'];
 	$name = $vars['element']['#title'];
 	$name = 'menu-'. str_replace(' ', '', strtolower($name));

 	$classes[] = $name;
 	$vars['element']['#attributes']['class'] = $classes;
}

function win_2013_preprocess_views_view(&$vars) {

}