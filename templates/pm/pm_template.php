<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2009 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 *	PM plugin - template file
 *
 * $Source: /cvs_backup/e107_0.8/e107_plugins/pm/pm_template.php,v $
 * $Revision$
 * $Date$
 * $Author$
 */


/**
 *	e107 Private messenger plugin
 *
 *	@package	e107_plugins
 *	@subpackage	pm
 *	@version 	$Id$;
 */

if (!defined('e107_INIT')) { exit; }

//global $sc_style;		// Needed for the PM_REPLY shortcode!

if(deftrue('BOOTSTRAP') && deftrue('FONTAWESOME'))
{
	define('PM_READ_ICON', e107::getParser()->toGlyph('fa-envelope'));
	define('PM_UNREAD_ICON', e107::getParser()->toGlyph('fa-envelope-o'));
}
else
{
	if (!defined('PM_READ_ICON')) define('PM_READ_ICON', "<img src='".e_PLUGIN_ABS."pm/images/read.png' class='icon S16' alt='".LAN_PM_111."' />");
	if (!defined('PM_UNREAD_ICON')) define('PM_UNREAD_ICON', "<img src='".e_PLUGIN_ABS."pm/images/unread.png' class='icon S16' alt='".LAN_PM_27."' />");
}
/*
$sc_style['PM_ATTACHMENT_ICON']['pre'] = " ";
$sc_style['PM_ATTACHMENTS']['pre'] = "<div class='alert alert-block alert-info'>";
$sc_style['PM_ATTACHMENTS']['post'] = "</div>";

//$sc_style['PM_NEXTPREV']['pre'] = "<tr><td class='forumheader' colspan='6' style='text-align:left'> ".LAN_PM_59;
//$sc_style['PM_NEXTPREV']['post'] = "</td></tr>";

$sc_style['PM_EMOTES']['pre'] = "
<tr>
	<td class='forumheader3'>".LAN_PM_7.": </td>
	<td class='forumheader3'>
";
$sc_style['PM_EMOTES']['post'] = "</td></tr>";

$sc_style['PM_ATTACHMENT']['pre'] = "
<tr>
	<td class='forumheader3'>".LAN_PM_8.": </td>
	<td class='forumheader3'>
";
$sc_style['PM_ATTACHMENT']['post'] = "</td></tr>";

$sc_style['PM_RECEIPT']['pre'] = "
<tr>
	<td class='forumheader3'>".LAN_PM_9.": </td>
	<td class='forumheader3'>
";
$sc_style['PM_RECEIPT']['post'] = "</td></tr>";

$sc_style['PM_REPLY']['pre'] = "<tr>
	<td class='forumheader' style='text-align:center' colspan='2'>
";
	
$sc_style['PM_REPLY']['post'] = "</td>
	</tr>
";
*/

$PM_WRAPPER['PM_ATTACHMENT_ICON']= " {---}";
$PM_WRAPPER['PM_ATTACHMENTS']= "<div class='alert alert-block alert-info'>{---}</div>";

//$sc_style['PM_NEXTPREV']['pre'] = "<tr><td class='forumheader' colspan='6' style='text-align:left'> ".LAN_PM_59;
//$sc_style['PM_NEXTPREV']['post'] = "</td></tr>";

$PM_WRAPPER['PM_EMOTES']= "
<div class='form-group'>
  <div class='row border-bottom border-secondary border-opacity-25 py-2'>
    <label class='col-md-3'>".LAN_PM_7.":</label>
	<div class='col-md-9'>{---}</div>
  </div>
</div> 
";
$PM_WRAPPER['PM_ATTACHMENT']= "
<div class='form-group'>
  <div class='row border-bottom border-secondary border-opacity-25 py-2'>
    <label class='col-md-3'>".LAN_PM_8.":</label>
	<div class='col-md-9'>{---}</div>
  </div>
</div> 
";
$PM_WRAPPER['PM_RECEIPT']= "
<div class='form-group'>
  <div class='row border-bottom border-secondary border-opacity-25 py-2'>
    <label class='col-md-3'>".LAN_PM_9.":</label>
	<div class='col-md-9'>{---}</div>
  </div>
</div> 
";
$PM_WRAPPER['PM_REPLY']= "<div class='text-center'>{---}</div>";

//$PM_SEND_PM = "<div id='pm-send-pm'>
$PM_TEMPLATE['send'] = "
<div id='pm-send-pm'>
  <div class='form-group'>
    <div class='row border-bottom border-secondary border-opacity-25 py-2'>
      <label class='col-md-3'>".LAN_PM_2.":</label>
	  <div class='col-md-9'>{PM_FORM_TO}</div>
    </div>
  </div>
  <div class='form-group'>
    <div class='row border-bottom border-secondary border-opacity-25 py-2'>
      <label class='col-md-3'>".LAN_PM_5.":</label>
	  <div class='col-md-9'>{PM_FORM_SUBJECT}</div>
    </div>
  </div>
  <div class='form-group'>
    <div class='row border-bottom border-secondary border-opacity-25 py-2'>
      <label class='col-md-3'>".LAN_PM_6.":</label>
	  <div class='col-md-9'>{PM_FORM_MESSAGE}</div>
    </div>
  </div> 
  {PM_EMOTES}
  {PM_ATTACHMENT}
  {PM_RECEIPT}
  <div class='send-button text-center py-3'>{PM_POST_BUTTON}</div> 
</div>
";

//$PM_INBOX_HEADER = "
$PM_TEMPLATE['inbox']['start'] = "
<div id='pm-inbox'>
  <div class='triangle-down'></div>
  <h4 class='pagename'>".LAN_PLUGIN_PM_INBOX."</h4>
  <div class='d-flex justify-content-end pb-4'>{PM_COMPOSE: class=block-level}</div>
";

//$PM_INBOX_TABLE = "{SETIMAGE: w=30&h=30&crop=1}
$PM_TEMPLATE['inbox']['item'] = "
  <div class='row border-bottom py-3 shadow {PM_STATUS_CLASS}'>
    <div class='col-md-1 text-center align-self-center'>{PM_SELECT}&nbsp;{PM_ATTACHMENT_ICON}</div>
    <div class='col-md-2 text-center align-self-center'>
      {SETIMAGE: w=60&h=60&crop=1}
      {PM_AVATAR: shape=circle}
    </div>
    <div class='col-md-6'>
      <div class='pm-from'>{LAN=LAN_PLUGIN_PM_FROM}:&nbsp;{PM_FROM=link}</div>
      <div class='pm-subject'>{LAN=LAN_PLUGIN_PM_SUB}:&nbsp;&nbsp;{PM_SUBJECT=link,inbox}</div>
      <div class='pm-date'>".LAN_PM_32.":&nbsp;&nbsp;{PM_DATE}</div>
    </div>
    <div class='col-md-3 text-center align-self-center'>
      <div class='pm-options'>{PM_DELETE=inbox}&nbsp;{PM_BLOCK_USER}</div>
    </div>
";

//$PM_INBOX_EMPTY = "
$PM_TEMPLATE['inbox']['empty'] = "
    <div class='no-pm'>".LAN_PM_34."</div>
";

//$PM_INBOX_FOOTER = "
$PM_TEMPLATE['inbox']['end'] = "
  </div>
  <div class='pm-delete py-3'>
    <input type='hidden' name='pm_come_from' value='inbox' />
	{PM_DELETE_SELECTED}
  </div>
  <div class='pm-nextprev py-3'>{PM_NEXTPREV=inbox}</div>
</div>
";

//$PM_OUTBOX_HEADER = "
$PM_TEMPLATE['outbox']['start'] = "
<div id='pm-outbox'>
  <div class='triangle-down'></div>
  <h4 class='pagename'>".LAN_PLUGIN_PM_OUTBOX."</h4>
";

//$PM_OUTBOX_TABLE = "
$PM_TEMPLATE['outbox']['item'] = "
    <div class='row border-bottom py-3 shadow {PM_STATUS_CLASS}'>
      <div class='col-md-1 text-center align-self-center'>{PM_SELECT}&nbsp;{PM_ATTACHMENT_ICON}</div>
      <div class='col-md-8'>
      <div class='pm-to'>{LAN=LAN_PLUGIN_PM_TO}:&nbsp;{PM_TO=link}</div>
      <div class='pm-subject'>{LAN=LAN_PLUGIN_PM_SUB}:&nbsp;&nbsp;{PM_SUBJECT=link,outbox}</div>
      <div class='pm-date'>".LAN_PM_33.":&nbsp;&nbsp;{PM_DATE}</div>
    </div>
    <div class='col-md-3 text-center align-self-center'>
      <div class='pm-options'>{PM_DELETE=outbox}</div>
    </div>
";

//$PM_OUTBOX_EMPTY = "
$PM_TEMPLATE['outbox']['empty'] = "
    <div class='no-pm'>".LAN_PM_34."</div>
";
/*
$PM_OUTBOX_FOOTER = "
<tr>
	<td class='forumheader' colspan='6' style='text-align:center'>
	<input type='hidden' name='pm_come_from' value='outbox' />
	{PM_DELETE_SELECTED}
	</td>
</tr>
{PM_NEXTPREV=outbox}
</tbody>
</table>
";*/

//$PM_OUTBOX_FOOTER = "
$PM_TEMPLATE['outbox']['end'] = "
  </div>
  <div class='pm-delete py-3'>
    <input type='hidden' name='pm_come_from' value='inbox' />
	{PM_DELETE_SELECTED}
  </div>
  <div class='pm-nextprev py-3'>{PM_NEXTPREV=outbox}</div>
</div>
";



$PM_TEMPLATE['blocked']['start'] = "
<div id='pm-blocked'>
  <div class='triangle-down'></div>
  <h4 class='pagename'>".LAN_PM_66."</h4>
";

$PM_TEMPLATE['blocked']['item'] = "
  <div class='row border-bottom py-3 shadow'>
      <div class='col-md-2 text-center align-self-center'>{PM_BLOCKED_SELECT}</div>
      <div class='col-md-8'>
      <div class='pm-bloked-user'>".LAN_PM_68.":&nbsp;{PM_BLOCKED_USER=link}</div>
      <div class='pm-subject'>".LAN_PM_69.":&nbsp;&nbsp;{PM_BLOCKED_DATE}</div>
    </div>
    <div class='col-md-3 text-center align-self-center'>
      <div class='pm-options'>{PM_BLOCKED_DELETE}</div>
    </div>
";

$PM_TEMPLATE['blocked']['empty'] = "
    <div class='no-user-bloked'>".LAN_PM_67."</div>
";

$PM_TEMPLATE['blocked']['end'] = "
  </div>
  <div class='pm-delete py-3'>{PM_DELETE_BLOCKED_SELECTED}</div>
</div>
";



//$PM_SHOW =
$PM_TEMPLATE['show'] = "
<div class='pm-show text-center'>
  <div class='card mb-4'>
    <div class='card-header'>
      <h3>{PM_SUBJECT}</h3>
      <div class='small'>{PM_DATE}</div>
      <div class='d-flex justify-content-between align-items-center'>
        <div class='small'>{PM_FROM_TO}</div>
	    <div class='small'>{PM_READ}</div>
        <div class='small'>{PM_DELETE}</div>
      </div>
    </div>
    <div class='card-body'>
      <div class='pm-message'>{PM_MESSAGE}</div>
    </div>
    <div class='card-footer'>{PM_REPLY}</div>
  </div>
</div>
";


//$PM_NOTIFY =
$PM_TEMPLATE['notify'] = "
<div>
  <h4>".LAN_PM_101." {SITENAME}</h4>
  <div class='card my-4'>
    <div class='card-header'>
      <div class='pm-notify-username>".LAN_PM_102."&nbsp;{USERNAME}</div>
    </div>
    <div class='card-body'>
      <div class='pm-notify-subject'>".LAN_PM_103."&nbsp;{PM_SUBJECT}</div>
      <div class='pm-notify-date'>".LAN_PM_108."&nbsp;{PM_DATE}</div>
      <div class='pm-notify-attachments'>".LAN_PM_104."&nbsp;{PM_ATTACHMENTS}</div>
    </div>
    <div class='card-footer'><a class='btn btn-primary btn-lg' href='{PM_URL}'>".LAN_PM_113."</a></div>
  </div>
";



