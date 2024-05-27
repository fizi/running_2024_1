<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2022 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 * e107 Bootstrap Theme Shortcodes. 
 *
*/



/**
 *
 */
class theme_shortcodes extends e_shortcode
{

	/**
	 * Special Header Shortcode for dynamic menuarea templates.
	 * @shortcode {---HEADER---}
	 * @return string
	 */
	function sc_header()
	{
		return '
        <!-- Dynamic Header template -->
        <!-- Top menu -->
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <span class="navbar-brand">
              <div class="logo-shape">
                <a href="{SITEURL}">            
                  <div class="site-logo float-start">
                    {SETIMAGE: w=800&h=800&crop=1}
                    {LOGO}
                  </div>
                  <div class="site-name d-block">{SITENAME}</div>
                  <div class="site-tag d-block">{SITETAG}</div>
                </a>
              </div>
            </span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button> 
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              {NAVIGATION: type=main}      
            </div>
          </div>
        </nav>';
	}


	/**
	 * Special Footer Shortcode for dynamic menuarea templates.
	 * @shortcode {---FOOTER---}
	 * @return string
	 */
	function sc_footer()
	{
		return "<!-- Dynamic Footer template -->\n";
/*
		return '
			<footer class="footer py-4 bg-dark text-white">
			<div class="container">       		
				<div class="content">         			
					<div class="row">           				
						<div class="col-md-3">   <h4>Navigation</h4>{NAVIGATION: type=main&layout=alt} 
							{MENUAREA=14}
						</div>
						<div class="col-md-3">   <h4>Follow Us</h4>{XURL_ICONS: template=footer}
							{MENUAREA=15}
						</div>           				
						<div class="col-md-3">  
							{MENUAREA=16}
						</div>           				
						<div class="col-md-3">  
							{MENUAREA=17}
						</div>                 			
					</div>       		
				</div>       		
				<hr>   	 
				<div class="container">    {NAVIGATION: type=main&layout=footer} </div>
				<div class="container">      
					<p class="m-0 text-center text-white">{SITEDISCLAIMER}</p>
				</div>    
				<!-- /.container -->
				</div>
		</footer>';*/


	}

	/**
	 * Optional {---CAPTION---} processing.
	 * @shortcode {---CAPTION---}
	 * @return string
	 */
	function sc_caption($caption)
	{
		return $caption; 
	}

	/**
	 * Optional {---BREADCRUMB---} processing.
	 * @shortcode {---BREADCRUMB---}
	 * � et ?? string
	 */
	 /*
	function sc_breadcrumb($array)
	{
		$route = e107::route();

		if(strpos($route,'news/') === 0)
		{
			$array[0]['text'] = 'Blog';
		}

		return e107::getForm()->breadcrumb($array, true);

	}
	*/

	/**
	 * Will only function on the news page.
	 *
	 * @example {THEME_NEWS_BANNER: type=date}
	 * @example, {THEME_NEWS_BANNER: type=image}
	 * @example {THEME_NEWS_BANNER: type=author}
	 * @param null $parm
	 * @return string|null
	 *
	 */
	function sc_theme_news_banner($parm=null)
	{
		/** @var news_shortcodes $news */
		$sc = e107::getScBatch('news');
		$news = $sc->getScVar('news_item');

		$ret = '';
		$type = varset($parm['type']);

		switch($type)
		{
			case "title":
				$ret = $sc->sc_news_title();
				break;

			case "date":
				$ret = $sc->sc_news_date();
				break;

			case "comment":
				$ret = $sc->sc_news_comment_count();
				break;

			case "author":
				$ret = $sc->sc_news_author();
				break;

			case "image":
			default:
			if(!empty($news['news_thumbnail']))
			{
				$tmp = explode(',', $news['news_thumbnail']);

				$opts = array(
					'w' => 1800,
					'h' => null,
					'crop' => false,
				);

				$ret = e107::getParser()->toImage($tmp[0], $opts);
			}
			
		}

		return $ret;


	}
	/*
	function sc_bootstrap_branding()
	{
		$pref = e107::pref('theme', 'branding');

		switch ($pref)
		{
			case 'logo':

				return e107::getParser()->parseTemplate('{SITELOGO: h=30}', true);

				break;

			case 'sitenamelogo':
				return "<span>" . e107::getParser()->parseTemplate('{SITELOGO: h=30}', true) . "</span>" . SITENAME;

				break;

			case 'sitename':
			default:

				return SITENAME;

				break;
		}
	}
    */
	/*
	function sc_bootstrap_nav_align()
	{
		$pref = e107::pref('theme', 'nav_alignment');

		if ($pref == 'right')
		{
			return 	e107::getParser()->parseTemplate('{NAVIGATION: type=main&class=ms-auto}');
		}
		else
		{
			return e107::getParser()->parseTemplate('{NAVIGATION: type=main&class=me-auto}');
		}
	}
    */

	/*
    *
    * @example, {THEME_RELATED_NEWS: type=category-id}
    *
    */

	function sc_theme_related_news($parm = null)
	{

		/** @var news_shortcodes $news */
		$sc = e107::getScBatch('news');
		$news = $sc->getScVar('news_item');

		//$obj = e107::getAddon('news', 'e_related'); useless, not enough data */
		//$tmp = $obj->compile($tags, $parm); marked here just not try it again to find this again

		$tags = $news['news_meta_keywords'];  //category meta keys are available too
		$parm['current'] = (int) $news['news_id'];
		$parm['limit'] = varset($parm['limit'], 4);

		$tag_regexp = "'(^|,)(" . str_replace(",", "|", $tags) . ")(,|$)'";
		$parm['current'] = (int) $news['news_id'];

		$query = "SELECT n.*, nc.category_id, nc.category_name, nc.category_sef 
		FROM #news AS n
		LEFT JOIN #news_category AS nc ON n.news_category = nc.category_id
		WHERE n.news_id != " . $parm['current'] . " AND n.news_class REGEXP '" . e_CLASS_REGEXP . "'  AND n.news_meta_keywords REGEXP " . $tag_regexp . "  ORDER BY n.news_datestamp DESC LIMIT " . $parm['limit'];


		$news_related_data = e107::getDb()->retrieve($query, true);

		$TEMPLATE = e107::getTemplate('news', 'news', 'related');

		foreach ($news_related_data as $row)
		{
			$thumbs = !empty($row['news_thumbnail']) ?  explode(",", $row['news_thumbnail']) : array();
			$image = varset($thumbs[0]);
			$row = array(
				'THEME_RELATED_CATEGORY_ID'    => $row['category_id'],
				'THEME_RELATED_CATEGORY_NAME'  => $row['category_name'],
				'THEME_RELATED_URL'       => e107::getUrl()->create('news/view/item', $row),
				'THEME_RELATED_TITLE'     => varset($row['news_title']),
				'THEME_RELATED_IMAGE'  	  => e107::getParser()->toImage($image),
				'THEME_RELATED_SUMMARY'   => e107::getParser()->toHTML($row['summary'], true, 'SUMMARY'),
				'THEME_RELATED_DATE'	  => e107::getParser()->toDate(varset($row['news_datestamp']), 'short'),
			);

			$list[] = e107::getParser()->simpleParse($TEMPLATE['item'], $row);
		}
		$head = e107::getParser()->parseTemplate($TEMPLATE['start']);

		$text = "<div class='e-related clearfix hidden-print'>" . $head . implode("\n", $list) . e107::getParser()->parseTemplate($TEMPLATE['end']) . '</div>';
		$caption = e107::getParser()->parseTemplate(varset($TEMPLATE['caption']));
		return e107::getRender()->tablerender($caption, $text, 'related', true);
	}
    
    
    /* {THEME_LANGUAGE_SWITCHER} */
    function sc_theme_language_switcher($parm = '')
    {
        $slng = e107::getLanguage();
        $code = $slng->convert(e_LANGUAGE);

        $languages = $slng->installed();
        sort($languages);
 
        if (count($languages) > 1)
        {

			$active_lang = '<img class="flags" src="' . THEME_ABS . 'images/flags/' . e_LANGUAGE . '.png" /> ' . $code . '</a>';

			$text = '<ul class="multilan">
                   <li class="nav-item dropdown"><a class="nav-link dropdown-toggle text-uppercase" href="javascript:void(0)" id="navbarLangDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">' . $active_lang . '</a>
                     <ul class="dropdown-menu" aria-labelledby="navbarLangDropdown">';
			 
            $c = 0;
            $checked = "active'";
            foreach ($languages as $lng)
            {
                $code = $slng->convert($lng);
             
                $selected = '';
                if ($lng == e_LANGUAGE)
                {
                    $selected = $checked;
                    $link = '#';
                }

                else
                {
                    $get = $_GET;
                    $get['elan'] = $code;

                    $qry = http_build_query($get, '', '&amp;');
                    $link = e_REQUEST_SELF . '?' . $qry;
                }

                $tmp[$c]['text'] =  $lng ;
                $tmp[$c]['code'] =  $code;
                $tmp[$c]['link'] = $link;
                $tmp[$c]['checked'] = $selected; 
                $c++;
            }
 
              
        foreach($tmp AS $option) {
            $value =  $option['code']  ;
            $checked =  $option['checked'];
            $code =  $option['text'];  
            $link =  $option['link'];    
            $text .= '
            <li><a class="dropdown-item '.$checked.' text-uppercase" href="'.$link.'"><img class="flags" src="'.THEME_ABS.'images/flags/'.$code.'.png" /> '.$value.'</a></li> ';
        }  
       

        $text .= "</ul>
                  </li>
                  </ul>";
		}
        return $text; 
    }
    
    
/*----------------------------- 
  NEWS GRID SHORTCODE 
-----------------------------*/ 
    function sc_bootstrap_grid_news_home_latest(){
  
      $template = "
        <!-- News Grid Menu for Latest 5 News -->
        {MENU: path=news/news_grid&limit=3&category=0&source=latest&featured=0&layout=home-latest-news}

      ";

      $text = e107::getParser()->parseTemplate($template,true);

      echo $text;
  
    }
    
/*----------------------------- 
  NEWS CATEGORIES ON NEWS PAGE 
-----------------------------*/  
    function sc_theme_news_categories(){
  
      $news   = e107::getObject('e_news_category_tree');  // get news class.
      $sc     = e107::getScBatch('news'); // get news shortcodes.
      $tp     = e107::getParser(); // get parser.

      // load active news categories. ie. the correct userclass etc.
      $data = $news->loadActive(false)->toArray();  // false to utilize the built-in cache.

      $TEMPLATE = "<button data-filter='.news-category-id-{NEWS_CATEGORY_ID}'>{NEWS_CATEGORY_NAME}</button>";

      $text = '';

      foreach($data as $row){
        $sc->setScVar('news_item', $row); // send $row values to shortcodes.
        $text .= $tp->parseTemplate($TEMPLATE, true, $sc); // parse news shortcodes.
      }

      return $text;

    }
    
/*----------------------------- 
  SUBSCRIBE SHORTCODE 
-----------------------------*/    
    function sc_theme_subscribe() {
	  $pref = e107::pref('core');
	  $ns = e107::getRender();

	  if(empty($pref['signup_option_class'])) {
	    return false;
	  }
      
      $frm = e107::getForm();
	  $text = $frm->open('newsletter','post', e_SIGNUP, array('class'=>'form-inline'));
	  $text .= "<div class='row justify-content-md-center pb-4'>";
      $text .= "<div class='col-md-4'><div class='input-group'>";
	  $text .= $frm->text('email','', null, array('placeholder'=> LAN_THEME_401));
      $text .= "</div></div>";
	  $text .= "<div class='col-md-2'>";
	  $text .= $frm->button('subscribe', 1, 'submit', LAN_THEME_402, array('class'=>'btn-primary'));
	  $text .= "</div>";
	  $text .= "</div>";
	  $text .= $frm->close();

	  

	  $caption = LAN_THEME_400;

	  return $ns->tablerender($caption, $text, 'subscribe', true);
	}

       


}



