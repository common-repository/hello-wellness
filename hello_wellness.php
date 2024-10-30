<?php
/**
 * @package Hello_Wellness
 * @version 1.0
 */
/*
Plugin Name: Hello Wellness
Plugin URI: http://wordpress.org/plugins/hello-wellness
Description: Built using the base code of the popular plugin, Hello Dolly, this plugin gives
users the ability to receive wellness reminders on their admin panel.
Version: 1.0
Author: Rich Robinkoff
Author URI: http://rkoffy.com/
License: GPLv2
*/

function hello_wellness_get_quote() {
	/** These are the quotes used */
	$quotes = "Have you been outside today?
	Did you brush your teeth yet?
	Make sure you remember to eat breakfast!
	Have you hugged someone today?
	Get up and stretch your legs, even better, take a walk!
	Think a happy thought!
	Take that well-deserved nap.
	Stop slouching!
	Stand for five minutes.
	Walk it off!
	Call a friend.
	Walk the dog.
	Pet the cat.
	Drink some water or juice, something besides a power drink.
	Refuel with a snack.
	Take a minute and clear you mind.
	Play a game.
	Tweet a happy thought!
	Ask for help.
	Solve someone else's problem.
	Call someone who cares about you.
	Send a note to friend you haven't spoken to in a while just to say hi.";

		// Here we split it into lines
	$quotes = explode( "\n", $quotes );

	// And then randomly choose a line
	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_wellness() {
	$chosen = hello_wellness_get_quote();
	echo "<p id='wellness'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_wellness' );

// We need some CSS to position the paragraph
function wellness_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#wellness {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;
		margin: 0;
		font-size: 12px;
	}
	</style>
	";
}

add_action( 'admin_head', 'wellness_css' );

?>
