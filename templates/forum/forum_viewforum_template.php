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

//TODO Find a good place to put a {SEARCH} dropdown.

$FORUM_VIEWFORUM_TEMPLATE['caption'] = "";
$FORUM_VIEWFORUM_TEMPLATE['start'] = "
<!--- START -->
<div id='forum-viewforum'>
";

$FORUM_VIEWFORUM_TEMPLATE['header'] = "
  <div class='row'>
    <div class='col-md-12'>{BREADCRUMB}</div>
  </div>
  <div class='d-flex justify-content-between'>
      <h3 class='forum-viewforum-title'>{FORUMIMAGE:h=40}{FORUMTITLE}</h3>
      <div class='forum-viewforum-button'>{NEWTHREADBUTTONX}</div>
  </div> 
  <div class='forum-viewforum'> 
  {SUBFORUMS}
  <div class='row'>
";

$FORUM_VIEWFORUM_TEMPLATE['item'] = "
    <div class='col-md-6 d-flex align-items-stretch'>
      <div class='forum-viewforum-item w-100'>
        <div class='triangle-down'></div>
        <div class='d-flex'>
          <div class='forum-viewforum-item-newflag'>{ICON}</div>
          <div class='px-3'>
            <div class='forum-viewforum-item-topictitle'>{THREADNAME}</div>
            <div class='small'>{LAN=FORUM_1004}: {POSTER} {THREADTIMELAPSE}</div>
            <div class='small'>{PAGESX}</div>
          </div>
          <div class='forum-viewforum-item-adminoptions ms-auto'>{ADMINOPTIONS}</div>
        </div>
        <hr />
        <div class='row py-2'>
          <div class='col-sm-4 forum-viewforum-replies text-center'>
            <div class='lang'>{LAN=FORUM_0003}</div>
            {REPLIESX}
          </div>
          <div class='col-sm-4 forum-viewforum-views text-center'>
            <div class='lang'>{LAN=FORUM_1005}</div>
            {VIEWSX}
          </div>
          <div class='col-sm-4 forum-viewforum-lastpost text-center'>
            <div class='lang'>{LAN=FORUM_0004}</div>
            <div class='small'>{LASTPOSTUSER} {LASTPOSTDATE}</div>
          </div>
        </div>
      </div>
    </div>  
";


$FORUM_VIEWFORUM_TEMPLATE['item-sticky'] = $FORUM_VIEWFORUM_TEMPLATE['item'] ; // "<tr><td>{THREADNAME}</td></tr>\n";
$FORUM_VIEWFORUM_TEMPLATE['item-announce'] = $FORUM_VIEWFORUM_TEMPLATE['item'] ; // "<tr><td>{THREADNAME}</td></tr>\n";


$FORUM_VIEWFORUM_TEMPLATE['sub-header']	= " ";

$FORUM_VIEWFORUM_TEMPLATE['sub-item'] = "
    <div class='forum-viewforum-item w-100'>
        <div class='triangle-down'></div>
        <div class='d-flex'>
          <div class='forum-viewforum-item-newflag'>{NEWFLAG}</div>
          <div class='px-3'>
            <div class='forum-viewforum-item-topictitle'>
              {SUB_FORUMIMAGE:h=50}{SUB_FORUMTITLE}
              <div class='small'>{SUB_DESCRIPTION}</div>
            </div>
            <div class='forum-viewforum-item-replies text-center'>{SUB_REPLIESX}</div>
            <div class='forum-viewforum-item-views text-center'>{SUB_THREADSX}</div>
            <div class='forum-viewforum-item-lastpost text-left'>
              <div class='smalltext'>{SUB_LASTPOSTUSER} {SUB_LASTPOSTDATE}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
";


$FORUM_VIEWFORUM_TEMPLATE['sub-footer']	= "";		

/* Examples top divider with shortcodes - working
$FORUM_VIEWFORUM_TEMPLATE['divider-important']	= "<tr><th colspan='2'>{LAN=FORUM_1006} {FORUMTITLE}</th><th class='text-center'>{LAN=FORUM_0003}</th><th class='hidden-xs text-center'>{LAN=FORUM_1005}</th><th class='hidden-xs'>{LAN=FORUM_0004}</th></tr>";
$FORUM_VIEWFORUM_TEMPLATE['divider-normal']		= "<tr><th colspan='2'>{LAN=FORUM_1007} {FORUMTITLE}</th><th class='text-center' >{LAN=FORUM_0003}</th><th class='hidden-xs text-center'>{LAN=FORUM_1005}</th><th class='hidden-xs'>{LAN=FORUM_0004}</th></tr>";
*/
$FORUM_VIEWFORUM_TEMPLATE['divider-important']	= " ";

$FORUM_VIEWFORUM_TEMPLATE['divider-normal']	= " ";

$SC_WRAPPER['VIEWABLE_BY'] = "
    <div class='card mt-5'>
      <div class='card-header fw-bold text-center'>{LAN=FORUM_8012}</div>
      <div class='card-body'>{---}</div>
    </div>
";

$FORUM_VIEWFORUM_TEMPLATE['footer'] = "
  </div>
  <div class='d-flex justify-content-between'>
    <div class='forum-viewforum-pages'>{THREADPAGES}</div>
    <div class='forum-viewforum-button'>{NEWTHREADBUTTONX}</div>
  </div>

  <div class='card mt-5'>
    <div class='card-header fw-bold text-center'>{LAN=FORUM_8011}</div>
	<div class='card-body'>{ICONKEY}</div>
  </div>
  <div class='viewforum-perms py-4'>{PERMS}</div>
  {VIEWABLE_BY}
";

$FORUM_VIEWFORUM_TEMPLATE['end'] = "
  </div>
</div>
<!--- END -->
";

// define {ICONKEY}
$FORUM_VIEWFORUM_TEMPLATE['iconkey'] = "
<div class='row' >
	<div class='col-md-3 col-6'>".IMAGE_new_small." ".LAN_FORUM_0039."</div>
	<div class='col-md-3 col-6'>".IMAGE_nonew_small." ".LAN_FORUM_0040."</div>
	<div class='col-md-3 col-6'>".IMAGE_sticky_small." ".LAN_FORUM_1011."</div>
	<div class='col-md-3 col-6'>".IMAGE_announce_small." ".LAN_FORUM_1013."</div>
</div>

<div class='row' >
	<div class='col-md-3 col-6'>".IMAGE_new_popular_small." ".LAN_FORUM_0039." ".LAN_FORUM_1010."</div>
	<div class='col-md-3 col-6'>".IMAGE_nonew_popular_small." ".LAN_FORUM_0040." ".LAN_FORUM_1010."</div>
	<div class='col-md-3 col-6'>".IMAGE_noreplies_small." ".LAN_FORUM_1021."</div>
	<div class='col-md-3 col-6'>".IMAGE_closed_small." ".LAN_FORUM_1014."</div>
</div>
";

$FORUM_VIEWFORUM_TEMPLATE['forum-crumb'] =  $FORUM_CRUMB;

// $FORUM_VIEWFORUM_WRAPPER['THREADNAME']          = "<span class='label label-info'>{---}</span>";





