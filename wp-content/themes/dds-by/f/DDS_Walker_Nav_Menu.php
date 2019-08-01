<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class DDS_Walker_Nav_Menu extends Walker_Nav_Menu {
	public function start_lvl( &$output ) {

		$output .= "<ul class='menu__list'>";
	}

	public function end_lvl( &$output ) {

		$output .= "</ul>";
	}
}
