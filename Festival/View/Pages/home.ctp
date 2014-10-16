<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */

//~ if (!Configure::read('debug')):
	//~ throw new NotFoundException();
//~ endif;

App::uses('Debugger', 'Utility');
?>


<p><span class="notice success"><a href="users/login">login</a></span></p>
<p><span class="notice success"><a href="users/logout">logout</a></span></p>
<p><span class="notice success"><a href="tickets">Tickets!</a></span></p>
<p><span class="notice success"><a href="users">Users</a></span></p>
<p><span class="notice success"><a href="events">Events</a></span></p>
<p><span class="notice success"><a href="stages">Stages</a></span></p>
<p><span class="notice success"><a href="concerts">Concerts</a></span></p>

