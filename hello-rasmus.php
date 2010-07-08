<?php
/*
Plugin Name: Hello Rasmus
Plugin URI: http://github.com/kanreisa/Hello-Rasmus
Description: Adds rasmus quotes to your admin header (original: Hello HAL)
Version: 1.2
Author: kanreisa
Author URI: http://r2.ag/
*/

/******************************************************************************

Copyright 2010  kanreisa : re@pixely.jp
Copyright 2008  Doc4 : info@doc4design.com

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
The license is also available at http://www.gnu.org/copyleft/gpl.html

*********************************************************************************/


$quotes = 
"I did not develop the PHP we know today. Dozens, if not hundreds of people, developed PHP. I was simply the first developer.<div id=\"note\">[ Rasmus Lerdorf ]</div>
I actually hate programming, but I love solving problems.<div id=\"note\">[ Rasmus Lerdorf ]</div>
I really don't like programming. I built this tool to program less so that I could just reuse code.<div id=\"note\">[ Rasmus Lerdorf ]</div>
PHP is about as exciting as your toothbrush. You use it every day, it does the job, it is a simple tool, so what? Who would want to read about toothbrushes?<div id=\"note\">[ Rasmus Lerdorf ]</div>
I was really, really bad at writing parsers. I still am really bad at writing parsers.<div id=\"note\">[ Rasmus Lerdorf ]</div>
We have things like protected properties. We have abstract methods. We have all this stuff that your computer science teacher told you you should be using. I don't care about this crap at all.<div id=\"note\">[ Rasmus Lerdorf ]</div>
There are people who actually like programming. I don't understand why they like programming.<div id=\"note\">[ Rasmus Lerdorf ]</div>
I'm not a real programmer. I throw together things until it works then I move on. The real programmers will say \"yeah it works but you're leaking memory everywhere. Perhaps we should fix that.\" I'll just restart apache every 10 requests.<div id=\"note\">[ Rasmus Lerdorf ]</div>
I do care about memory leaks but I still don't find programming enjoyable.<div id=\"note\">[ Rasmus Lerdorf ]</div>
I don't know how to stop it, there was never any intent to write a programming language [...] I have absolutely no idea how to write a programming language, I just kept adding the next logical step on the way.<div id=\"note\">[ Rasmus Lerdorf ]</div>
For all the folks getting excited about my quotes. Here is another - Yes, I am a terrible coder, but I am probably still better than you :)<div id=\"note\">[ Rasmus Lerdorf ]</div>";

// Here we split it into lines
$quotes = explode("\n", $quotes);
$notes = explode("\n", $notes);

// And then randomly choose a line
$chosen = wptexturize( $quotes[ mt_rand(0, count($quotes) - 1) ] );

// This just echoes the chosen line
function hello_hal() {
	global $chosen;
	echo "<div class='clear'></div><div id='hal9000'><a href='http://www.doc4design.com'></a><p id='quote'>$chosen</p></div>";
}

// Now we set that function up to execute when the admin_footer action is called
add_action('admin_notices', 'hello_hal');


// We need some CSS to position the quotes
function hal_css() {
	echo '<link href="'.get_bloginfo('siteurl').'/wp-content/plugins/hello-rasmus/hello-rasmus.css" rel="stylesheet" type="text/css" />'."\n";
}

add_action('admin_head', 'hal_css');

?>