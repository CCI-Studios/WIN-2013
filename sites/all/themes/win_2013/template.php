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

function win_2013_theme(&$existing, $type, $theme, $path) {
	$hooks['user_login_block'] = array(
		'template' => 'templates/user-login-block',
		'render element' => 'form',
	);

	return $hooks;
}

function win_2013_preprocess_user_login_block(&$vars) {
	$vars['form']['links'] = null; // kill links

	$vars['name'] = render($vars['form']['name']);
	$vars['pass'] = render($vars['form']['pass']);
	$vars['submit'] = render($vars['form']['actions']['submit']);
	$vars['rendered'] = drupal_render_children($vars['form']);
}