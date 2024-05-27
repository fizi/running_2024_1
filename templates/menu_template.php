<?php
if (!defined('e107_INIT')) { exit; }

#### Panel Template - Used by menu_class.php  for Custom Menu Content.
#### Additional control over image thumbnailing is possible via SETIMAGE e.g. {SETIMAGE: w=200&h=150&crop=1}

	$MENU_TEMPLATE['default']['start'] 					= '<div class="cpage-menu {CMENUNAME}">';
	$MENU_TEMPLATE['default']['body'] 					= '{CMENUBODY}'; 
	$MENU_TEMPLATE['default']['end'] 					= '</div>';

	$MENU_TEMPLATE['button']['start'] 					= '<div class="cpage-menu {CMENUNAME}">';
	$MENU_TEMPLATE['button']['body'] 					= '<div>{CMENUBODY}</div>{CPAGEBUTTON}';
	$MENU_TEMPLATE['button']['end'] 					= '</div>'; 

	$MENU_TEMPLATE['buttom-image']['start'] 			= '<div class="cpage-menu {CMENUNAME}">{SETIMAGE: w=360}';
	$MENU_TEMPLATE['buttom-image']['body'] 				= '<div>{CMENUIMAGE}</div>{CPAGEBUTTON}';
	$MENU_TEMPLATE['buttom-image']['end'] 				= '</div>';

	$MENU_TEMPLATE['image-only']['start'] 				= '<div class="cpage-menu {CMENUNAME}">{SETIMAGE: w=360}';
	$MENU_TEMPLATE['image-only']['body'] 				= '{CMENUIMAGE}';
	$MENU_TEMPLATE['image-only']['end'] 				= '</div>';

	$MENU_TEMPLATE['image-text-button']['start'] 		= '<div class="cpage-menu {CMENUNAME}">{SETIMAGE: w=360}';
	$MENU_TEMPLATE['image-text-button']['body'] 		= '{CMENUIMAGE}{CMENUBODY}{CPAGEBUTTON}';
	$MENU_TEMPLATE['image-text-button']['end'] 			= '</div>';
    
    
    /*------------------- MENU TEMPLATE BY FIZI --------------------------------*/
    
    // IMAGE - TEXT- BUTTON -----------------------------
    $MENU_TEMPLATE['fizi-image-text-button']['start'] = '
    <div class="cpage-menu {CMENUNAME}">
      ';
	$MENU_TEMPLATE['fizi-image-text-button']['body'] = '
      <div class="cmenu-image">
        {SETIMAGE: w=1200&h=800&crop=1}
        {CMENUIMAGE}
      </div>
      <div class="cmenu-text">
        {CMENUBODY}
        {CPAGEBUTTON}
      </div>
    ';
	$MENU_TEMPLATE['fizi-image-text-button']['end'] = '
    </div>';
    
    // TEXT - BUTTON ------------------------------
    $MENU_TEMPLATE['fizi-text-button']['start'] = '
    <div class="cpage-menu {CMENUNAME}">
      ';
	$MENU_TEMPLATE['fizi-text-button']['body'] = '
      <div class="cmenu-text">
        {CMENUBODY}
        {CPAGEBUTTON}
      </div>
    ';
	$MENU_TEMPLATE['fizi-text-button']['end'] = '
    </div>';


