<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2013 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 */
if (!defined('e107_INIT')) { exit; }


// New in v2.x - requires a bootstrap theme be loaded.  
// Modifiey by fizi ************************************************************   

$FORUM_TEMPLATE['main']['start'] = "
{FORUM_BREADCRUMB}
<div id='forum' class='forum'>
  <div class='d-flex justify-content-end'>
    <div class='forum-search'>
      {SEARCH}
    </div>
  </div>
";

$FORUM_TEMPLATE['main']['parent_start'] = "
  <div class='row'>
    <div class='forum-parent-title'>
      {PARENTIMAGE:h=50}{PARENTNAME}
      <span>{PARENTSTATUS}</span>
    </div>
  </div>
  <div class='forum-child'>
    <div class='row'>
";

$FORUM_TEMPLATE['main']['parent_end'] = '
    </div>
  </div>
';

$FORUM_TEMPLATE['main']['forum'] = " 
    <div class='col-md-4 d-flex align-items-stretch'>
      <div class='forum-child-item mb-3'> 
        <div class='triangle-down'></div>
        <div class='forum-child-item-icon text-center'>{FORUMICON}</div>    
        <div class='row py-2'>
          <div class='col-sm-3'>{FORUMIMAGE:h=60}</div>
          <div class='col-sm-9'>
            <div class='forum-child-item-title'>{FORUMNAME}</div> 
            <div class='forum-child-item-desc'>{FORUMDESCRIPTION}</div>
            <div class='forum-child-item-subforums'>{FORUMSUBFORUMS}</div>
          </div>
        </div>
        <hr />
        <div class='row py-2'>
          <div class='col-sm-4 text-center forum-thread'>
            <div class='lang'>{LAN=FORUM_0002}</div> 
            {THREADSX}
          </div>
          <div class='col-sm-4 text-center forum-replies'>
            <div class='lang'>{LAN=FORUM_0003}</div>
            {REPLIESX}
          </div>
          <div class='col-sm-4 text-center forum-lastpost'> 
            <div class='lang'>{LAN=FORUM_0004}</div>
            {LASTPOST:type=date}
          </div>
        </div>
      </div>
    </div>  
";

//{LASTPOST:type=username} + {LASTPOST:type=datelink} can also be replaced by the legacy shortcodes {LASTPOST} or {LASTPOSTUSER} + {LASTPOSTDATE}

$FORUM_TEMPLATE['main']['end'] = "    
  <div class='forum-footer text-center'><small>{USERINFOX}</small></div>
</div> 
";

// $FORUM_WRAPPER['main']['forum']['USERINFOX'] = "{FORUM_BREADCRUMB}(html before){---}(html after)";

// Tracking
$FORUM_TEMPLATE['track']['start'] = "
{FORUM_BREADCRUMB}
<div id='forum-track'>
  <div class='forum-track-caption'>
    <div class='row'>
      <div class='col-8 forum-track-topic text-start'>{LAN=FORUM_1003}</div>
      <div class='col-2 forum-track-lastpost text-center'>{LAN=FORUM_0004}</div>
      <div class='col-2 forum-track-modify text-center'>{LAN=FORUM_1020}</div>
    </div>
  </div>
";

$FORUM_TEMPLATE['track']['item'] = "
  <div class='forum-track-item'>
    <div class='row d-flex align-items-center'>
      <div class='col-1 forum-track-item-newflag text-center'>{NEWIMAGE}</div>
      <div class='col-7 forum-track-item-topic text-left'>{TRACKPOSTNAME}</div>
      <div class='col-2 forum-track-item-lastpost text-center'>{LASTPOSTUSER} {LASTPOSTDATE}</div>
      <div class='col-2 forum-track-item-modify text-center'>{UNTRACK}</div>
    </div>
  </div>
";

$FORUM_TEMPLATE['track']['end'] = "
</div>
";




/*
$FORUM_TEMPLATE['main-end']				.= "

<div class='center'>
	<small class='muted'>{PERMS}</small>
	</div>
<table style='".USER_WIDTH."' class='fborder table'>\n<tr>
<td colspan='2' style='width:60%' class='fcaption'>{INFOTITLE}</td>\n</tr>\n<tr>
<td rowspan='4' style='width:5%; text-align:center' class='forumheader3'>{LOGO}</td>
<td style='width:auto' class='forumheader3'>{USERINFO}</td>\n</tr>
<tr>\n<td style='width:95%' class='forumheader3'>{INFO}</td>\n</tr>
<tr>\n<td style='width:95%' class='forumheader3'>{FORUMINFO}</td>\n</tr>
<tr>\n<td style='width:95%' class='forumheader3'>{USERLIST}<br />{STATLINK}</td>\n</tr>\n</table>
";
*/
?>
