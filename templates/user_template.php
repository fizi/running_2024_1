<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2009 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 *
 *
 * $Source: /cvs_backup/e107_0.8/e107_themes/templates/user_template.php,v $
 * $Revision$
 * $Date$
 * $Author$
 */

if (!defined('e107_INIT')) { exit; }

 

	$USER_TEMPLATE = array();
	$USER_WRAPPER = array();


	$USER_TEMPLATE['addon']  = '
		<div class="row">
			<div class="col-xs-12 col-md-4">{USER_ADDON_LABEL}</div>
			<div class="col-xs-12 col-md-8">{USER_ADDON_TEXT}</div>
		 </div>
		';

	$USER_TEMPLATE['extended']['start'] = '';
	$USER_TEMPLATE['extended']['end']   = '';

	$USER_TEMPLATE['extended']['item'] = '
		<div class="row {EXTENDED_ID}">
		    <div class="ue-label col-xs-12 col-md-4">{EXTENDED_NAME}</div>
		    <div class="ue-value col-xs-12 col-md-8">{EXTENDED_VALUE}</div>
		</div>
		';


$USER_TEMPLATE['list']['start']  = "
<div id='user-list'>
  <div class='triangle-down'></div>
  <h4 class='pagename'>{LAN=USER_56} {TOTAL_USERS}</h4>
  {USER_FORM_START}
  <div class='select-user-list'>
    <div class='form-group'>
      <div class='row border-bottom border-secondary border-opacity-25 py-2'>
        <label class='col-md-3'>{LAN=SHOW}:</label>
        <div class='col-md-9'>{USER_FORM_RECORDS}</div>
      </div>
    </div>
    <div class='form-group'>
      <div class='row border-bottom border-secondary border-opacity-25 py-2'>
        <label class='col-md-3'>{LAN=USER_57}</label>
        <div class='col-md-9'>{USER_FORM_ORDER}</div>	
      </div>
    </div>
    <div class='send-button text-center py-3'>{USER_FORM_SUBMIT}</div>  
  </div>
  {USER_FORM_END}
  <div class='row py-3'>
";

$USER_TEMPLATE['list']['item']  = "
    <div class='col-md-6'>
      <div class='card d-flex flex-row my-3 shadow'>
        {SETIMAGE: w=100&h=100&crop=1}
        {USER_PICTURE: class=card-img-top w-25 m-auto p-2}
        <div class='card-body d-flex flex-row justify-content-between'>
          <div class='text-section'>
            <h5 class='card-title'>
              <div class='userlist-username'>{LAN=USER_58} {USER_ID}: {USER_NAME_LINK}</div>
            </h5>
            <div class='card-text'>    
              <div class='userlist-email small text-muted'>{LAN=USER_60} {USER_EMAIL}</div>
              <div class='userlist-join small text-muted'>{LAN=USER_59} {USER_JOIN}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
";

$USER_TEMPLATE['list']['end']  = "
  </div>
</div>
";


	// View shortcode wrappers.
	$USER_WRAPPER['view']['USER_COMMENTPOSTS']      = '<div class="col-xs-12 col-md-4">{LAN=USER_68}</div><div class="col-xs-12 col-md-8">{---}';
	$USER_WRAPPER['view']['USER_COMMENTPER']        = ' ( {---}% )</div>';
	$USER_WRAPPER['view']['USER_SIGNATURE']         = '<div class="user-signature">{---}</div>';
	$USER_WRAPPER['view']['USER_RATING']            = '<div class="user-rate small pt-3">{---}</div>';
	$USER_WRAPPER['view']['USER_SENDPM']            = '{---}';
	$USER_WRAPPER['view']['PROFILE_COMMENTS']       = '<div class="clearfix">{---}</div>';
//	$USER_WRAPPER['view']['PROFILE_COMMENT_FORM']   = '{---} </div>';

$USER_TEMPLATE['view'] = '
<div id="user-profile-view">
  <div class="user-profile-view-top">
    <div class="row">
      <div class="col-md-6">
        <div class="user-profile-image">
          {SETIMAGE: w=800&h=800&crop=1}
	      {USER_PICTURE: class=img-fluid&link=1}
        </div>
      </div>
      <div class="col-md-6">
        <div class="user-profile-text">
          <h6>{LAN=USER_58} {USER_ID}</h6>
          <h3 class="user-name">{USER_NAME}</h3>
          <h5 class="user-other-data">
            {USER_SIGNATURE}
	        {USER_RATING}
          </h5>
	      <div class="py-4 text-center">{USER_SENDPM}</div>
        </div>
      </div>
    </div>
  </div>
  <div class="user-profile-view-bottom">
    <div class="triangle-down"></div>
    <div class="row border-bottom border-secondary border-opacity-25 py-2">
      <div class="col-md-4">{LAN=USER_63}</div>
      <div class="col-md-8">{USER_REALNAME}</div>
    </div>
	<div class="row border-bottom border-secondary border-opacity-25 py-2">
      <div class="col-md-4">{LAN=USER_02}</div>
      <div class="col-md-8">{USER_LOGINNAME}</div>
    </div>
	<div class="row border-bottom border-secondary border-opacity-25 py-2">
      <div class="col-md-4">{LAN=USER_60}</div>
      <div class="col-md-8">{USER_EMAIL}</div>
    </div>
	<div class="row border-bottom border-secondary border-opacity-25 py-2">
      <div class="col-md-4">{LAN=USER_54}</div>
      <div class="col-md-8">{USER_LEVEL}</div>
    </div>
	<div class="row border-bottom border-secondary border-opacity-25 py-2">
      <div class="col-md-4">{LAN=USER_65}</div>
      <div class="col-md-8">{USER_LASTVISIT}<br /><small class="padding-left">{USER_LASTVISIT_LAPSE}</small></div>
    </div>
	<div class="row border-bottom border-secondary border-opacity-25 py-2">
      <div class="col-md-4">{LAN=USER_59}</div>
      <div class="col-md-8">{USER_JOIN}<br /><small class="padding-left">{USER_DAYSREGGED}</small></div>
    </div>
	<div class="row border-bottom border-secondary border-opacity-25 py-2">
      <div class="col-md-4">{LAN=USER_66}</div>
      <div class="col-md-8">{USER_VISITS}</div>
    </div>
	{USER_ADDONS}
	<div class="row border-bottom border-secondary border-opacity-25 py-2">
      {USER_COMMENTPOSTS} {USER_COMMENTPER}
    </div>
	{USER_EXTENDED_ALL}
    <div class="text-center py-3">{USER_UPDATE_LINK}</div>
	<div class="user-profile-nextprev">
	  <ul class="pager user-view-nextprev">
	    <li class="previous">{USER_JUMP_LINK=prev}</li>
		<li><!-- Back to List? --></li>
	    <li class="next">{USER_JUMP_LINK=next}</li>
	  </ul>
	</div>
    <!-- Start Comments -->
	{PROFILE_COMMENTS}
	<!-- End Comments -->
  </div>
</div>
';








