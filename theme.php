<?php

if(!defined('e107_INIT'))
{
	exit();
}

// [multilanguage]
e107::lan('theme'); // loads e107_themes/CURRENT_THEME/languages/English.php (when English is selected) 

class theme implements e_theme_render {

  public function init() {

    e107::meta('viewport', 'width=device-width, initial-scale=1.0'); // added to <head>
	// e107::link('rel="preload" href="{THEME}fonts/myfont.woff2?v=2.2.0" as="font" type="font/woff2" crossorigin');  // added to <head>
    // e107::meta('apple-mobile-web-app-capable','yes');

    
    //e107::js("theme", "js/jquery.lettering.js");
    e107::js("theme", "js/isotope.pkgd.js"); 
    e107::js("theme", "js/imagesloaded.pkgd.min.js");
    e107::js("theme", "js/custom.js", "jquery");
  }

  /**
  * Override how THEME_STYLE is loaded. Duplicates will be automatically removed.
  * @return void
  */
  function css() {
    // e107::css('url', 'https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap'); 
    e107::css('url', 'https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');
    e107::css('url', 'https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap');
    e107::css("url", "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css");
    e107::css('theme', THEME_STYLE);
	e107::css('theme', 'style.css'); // always load style.css last.
	e107::css('inline', '#carousel-hero.carousel {   margin-bottom: 80px; }');
  }

  
  /**
  * @param string $text
  * @return string without p tags added always with bbcodes
  * note: this solves W3C validation issue and CSS style problems
  * use this carefully, mainly for custom menus, let decision on theme developers
  */
  function remove_ptags($text = '') { // FIXME this is a bug in e107 if this is required.		
    $text = str_replace(array("<!-- bbcode-html-start --><p>", "</p><!-- bbcode-html-end -->"), "", $text);
	return $text;
  }

  function tablestyle($caption, $text, $mode='', $options = array()) {
    $style = varset($options['setStyle'], 'default');

	// Override style based on mode.
	switch($mode) {
	  case 'wmessage':
	  case 'wm':
	  $style = 'wmessage';
	  break;

	  case 'news_months_menu':
	  $style = 'listgroup';
	  break;
      
      case 'news':
      case 'cpage':
      case 'contact-info':
      case 'forum':
      case 'forum-viewforum':
      case 'forum-viewtopic':
      case 'forum-post':
      case 'PM':
      case 'user-list':
	  $style = 'nocaption';
	  break;

      case 'subscribe':
	  $style = 'home-section-4';
	  break;
      
      case 'login_page':
	  $style = 'login-page-menu';
	  break;
      
	}

	echo "\n<!-- tablestyle initial:  style=" . $style . "  mode=" . $mode . "  UniqueId=" . varset($options['uniqueId']) . " -->\n\n";

	// echo "\n<!-- tablestyle:  style=" . $style . "  mode=" . $mode . "  UniqueId=" . varset($options['uniqueId']) . " -->\n\n";

	if(deftrue('e_DEBUG')) {
	  echo "\n<!-- \n";
	  echo json_encode($options, JSON_PRETTY_PRINT);
	  echo "\n-->\n\n";
	}

	switch($style) {

	  case 'wmessage':
	  echo '<div class="wm p-5">';
      echo '<div class="text-center">';
      echo '<div class="row">';
	  if(!empty($caption)) {
	    echo '<div class="col-lg-6"><h1 class="display-2 p-5">'.$caption.'</h1></div>';
	  }
	  echo '<div class="col-lg-6"><div class="wtext p-5">'.$this->remove_ptags($text).'</div></div>';
	  echo '</div>';
      echo '</div>';
      echo '</div>';
	  break;
    
	  case 'nocaption':
	  echo $text;
	  break;
      
      case 'home-section-1':
	  echo '<div class="home-section-1-cmenu mb-3">';
	  if(!empty($caption)) {
	    echo '<h4 class="home-section-1-cmenu-title">'.$caption.'</h4>';
	  }
	  echo '<div class="home-section-1-cmenu-body">'.$this->remove_ptags($text).'</div>';
	  echo '</div>';
	  break;
      
      case 'home-section-2':
	  echo '<div class="home-section-2-cmenu">';
	  if(!empty($caption)) {
	    echo '<h4 class="home-section-2-cmenu-title">'.$caption.'</h4>';
	  }
	  echo '<div class="home-section-2-cmenu-body">'.$text.'</div>';
	  echo '</div>';
	  break;
      
      case 'home-section-4':
	  echo '<div class="home-section-4-cmenu">';
	  if(!empty($caption)) {
	    echo '<h4 class="home-section-4-cmenu-title text-center fst-italic pb-4">'.$caption.'</h4>';
	  }
	  echo '<div class="home-section-4-cmenu-body">'.$text.'</div>';
	  echo '</div>';
	  break;
      
      case 'home-contact':
	  echo '<div class="home-contact-menu">';
	  if(!empty($caption)) {
	    echo '<h4 class="home-contact-menu-title text-center">'.$caption.'</h4>';
	  }
	  echo '<div class="home-contact-menu-body">'.$text.'</div>';
	  echo '</div>';
	  break;
      
      case "side-menu":
      case "listgroup": 
	  echo "<div class='side-menubox mb-4'>";
	  if(!empty($caption)) {
	    echo "<h4 class='side-menubox-title'>{$caption}</h4>";
	  }
      echo "<div class='triangle-down'></div>";
      echo "<div class='side-menubox-content'>{$text}</div>";
	  echo "</div>";
	  break;
      
      case "main":
	  echo "<div class='main-menubox my-3'>";
	  if(!empty($caption)) {
	    echo "<h4 class='main-menubox-title'>{$caption}</h4>";
	  }
      echo "<div class='triangle-down'></div>";
      echo "<div class='main-menubox-content'>{$text}</div>";
	  echo "</div>";
	  break;
      
      case "footer-menu": 
	  echo "<div class='footer-menubox my-4'>";
	  if(!empty($caption)) {
	    echo "<h4 class='footer-menubox-title'>{$caption}</h4>";
	  }
      echo "<div class='triangle-down'></div>";
	  echo "<div class='footer-menubox-content'>{$text}</div>";
	  echo "</div>";
	  break;
      
      
      
      
      
      
      
      
      
      
      
      
      
      case "login-page-menu":
	  echo "<div class='login-page-box'>";
	  if(!empty($caption)) {
	    echo "<h4 class='login-page-box-title'>{$caption}</h4>";
	  }
      echo "<div class='login-page-box-content'>{$text}</div>";
	  echo "</div>";
	  break;

	  default:
	  // default style
	  // only if this always work, play with different styles
	  if(!empty($caption)) {
	    echo '<h4>'.$caption.'</h4>';
	  }
	  echo $text;
	  return;
	}
  }
}

