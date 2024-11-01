<?php

// Register Shortcode
function rd_hover_effects_shortcode($atts){
	extract( shortcode_atts( array(

		'category' => '',	
		'style' => '',				
		'effects' => '',				
		'circle_animation' => '',				
		'item_show_row' => '',				
		
	), $atts) );
	
	
	    $q = new WP_Query(
        array('posts_per_page' => -1, 'post_type' => 'rd-hover', 'hover_cat' => $category)
        );
	
		while($q->have_posts()) : $q->the_post();
		$id = get_the_ID();	
		
	
		$rdmeta = vp_metabox('rdmeta.rd-hover', false);
		
	$i = 0;
	
		$output = '<div class="main-wrapper rd-container"><div class="rd-row"><div id="'.$style.'">';
		
		foreach ($rdmeta as $info) {	

		if ($effects=="square" && $style=="style1") {
		
		$output .= '
			<style type="text/css">
			@import url(http://fonts.googleapis.com/css?family='.$google_font.');
			</style>
			<div class="'.$item_show_row.'">
				<div class="rakib-dev rakib-dev-first">
                    <img class="img-responsive" src="'.$info['imgup_1'].'" />
						<div class="mask">
							<h2>'.$info['title'].'</h2>
								<p>'.$info['desc'].'</p>
						<a href="'.$info['link'].'" class="info">'.$info['link_title'].'</a>
					</div>
                </div> 
				</div>
				';
		}
		else if ($effects=="square" && $style=="style2") {
		
		$output .= '
			<style type="text/css">
			@import url(http://fonts.googleapis.com/css?family='.$google_font.');
			</style>
		<div class="'.$item_show_row.'">
		<div class="rakib-dev rakib-dev-second">
                    <img src="'.$info['imgup_1'].'" />
                    <div class="mask"></div>
                    <div class="rd_content">
                        <h2>'.$info['title'].'</h2>
                        <p>'.$info['desc'].'</p>
                        <a href="'.$info['link'].'" class="info">'.$info['link_title'].'</a>
                    </div>
                </div>
                </div>
				';
		}
		else if ($effects=="square" && $style=="style3") {
		
		$output .= '
			<style type="text/css">
			@import url(http://fonts.googleapis.com/css?family='.$google_font.');
			</style>
			<div class="'.$item_show_row.'">
				<div class="rakib-dev rakib-dev-third">
                    <img src="'.$info['imgup_1'].'" />
						<div class="mask">
							<h2>'.$info['title'].'</h2>
								<p >'.$info['desc'].'</p>
						<a href="'.$info['link'].'" class="info">'.$info['link_title'].'</a>
					</div>
                </div>  
                </div>  
				';
		}
		else if ($effects=="square" && $style=="style4") {
		
		$output .= '
			<style type="text/css">
			@import url(http://fonts.googleapis.com/css?family='.$google_font.');
			</style>
			<div class="'.$item_show_row.'">
				<div class="rakib-dev rakib-dev-fourth">
                    <img src="'.$info['imgup_1'].'" />
						<div class="mask">
							<h2>'.$info['title'].'</h2>
								<p >'.$info['desc'].'</p>
						<a href="'.$info['link'].'" class="info">'.$info['link_title'].'</a>
					</div>
                </div>  
                </div>  
				';
		}
		else if ($effects=="square" && $style=="style5") {
		
		$output .= '
			<style type="text/css">
			@import url(http://fonts.googleapis.com/css?family='.$google_font.');
			</style>
			<div class="'.$item_show_row.'">
				<div class="rakib-dev rakib-dev-fifth">
                    <img src="'.$info['imgup_1'].'" />
						<div class="mask">
							<h2>'.$info['title'].'</h2>
								<p >'.$info['desc'].'</p>
						<a href="'.$info['link'].'" class="info">'.$info['link_title'].'</a>
					</div>
                </div>  
                </div>  
				';
		}
		
		
		else if ($effects=="square" && $style=="style6" || $style=="style7" || $style=="style8" || $style=="style9" || $style=="style10" || $style=="style11" || $style=="style12" || $style=="style13" || $style=="style14" || $style=="style15" || $style=="style16" || $style=="style17" || $style=="style18" || $style=="style19" || $style=="style20" || $style=="style21" || $style=="style22" || $style=="style23" || $style=="style24" || $style=="style25" || $style=="style26" || $style=="style27" || $style=="style28" || $style=="style29" || $style=="style30" || $style=="style31" || $style=="style32" || $style=="style33" || $style=="style34" || $style=="style35") {
		
		$output .= '
		
			<h1 style="color: red; ">SORRY THIS STYLE ONLY FOR PRO VERSION. IF YOU WANT TO BUY RD HOVER EFFECTS PRO VERSION WITH AWESOME FEATURES PLEASE CLICK HERE <a style="color: blue;" target="_blink" href="http://wpexpert24.com/rd-hover-effects-pro/">CLICK HERE</a></h1>
				';
		}
		
	// START Carcle STYLE //	
		
		if ($effects=="circle" && $style=="style1") {
		
		$output .= '
				<li class="circle_single">
		        <div class="item-hover circle effect1"><a href="'.$info['link'].'">
                      <div class="spinner"></div>
                      <div class="img"><img src="'.$info['imgup_1'].'" alt="img"></div>
                      <div class="info">
                        <div class="info-back">
                          <h3>'.$info['title'].'</h3>
                          <p>'.$info['desc'].'</p>
                        </div>
               </div></a></div>
			   </li>
				';
		}
		else if ($effects=="circle" && $style=="style2") {
				
				$output .= '
					<li class="circle_single">
						  <div class="item-hover circle effect2 '.$circle_animation.'"><a href="'.$info['link'].'">
							  <div class="img"><img src="'.$info['imgup_1'].'" alt="img"></div>
							  <div class="info">
								<h3>'.$info['title'].'</h3>
								<p>'.$info['desc'].'</p>
							  </div></a></div>
					   </li>
						';
				}
		else if ($effects=="circle" && $style=="style3") {
				
				$output .= '
						<li class="circle_single">
                     <div class="item-hover circle effect3 '.$circle_animation.'"><a href="'.$info['link'].'">
                      <div class="img"><img src="'.$info['imgup_1'].'" alt="img"></div>
                      <div class="info">
                       <h3>'.$info['title'].'</h3>
                        <p>'.$info['desc'].'</p>
                      </div></a></div>
					   </li>
						';
				}
			else if ($effects=="circle" && $style=="style4") {
				
				$output .= '
						<li class="circle_single">
                  <div class="item-hover circle effect4 '.$circle_animation.'"><a href="'.$info['link'].'">
                      <div class="img"><img src="'.$info['imgup_1'].'" alt="img"></div>
                      <div class="info">
                        <h3>'.$info['title'].'</h3>
                        <p>'.$info['desc'].'</p>
                      </div></a></div>
					   </li>
						';
				}
				else if ($effects=="circle" && $style=="style5") {
				
				$output .= '
					<li class="circle_single">
                  <div class="item-hover circle effect5"><a href="'.$info['link'].'">
                      <div class="img"><img src="'.$info['imgup_1'].'" alt="img"></div>
                      <div class="info">
                        <div class="info-back">
                          <h3>'.$info['title'].'</h3>
                         <p>'.$info['desc'].'</p>
                        </div>
                      </div></a></div>
					   </li>
						';
				}
				
							
		if ($effects=="circle" && $style=="style6" || $style=="style7" || $style=="style8" || $style=="style9" || $style=="style10" || $style=="style11" || $style=="style12" || $style=="style13" || $style=="style14" || $style=="style15" || $style=="style16" || $style=="style17" || $style=="style18" || $style=="style19" || $style=="style20" || $style=="style21" || $style=="style22" || $style=="style23" || $style=="style24" || $style=="style25" || $style=="style26" || $style=="style27" || $style=="style28" || $style=="style29" || $style=="style30" || $style=="style31" || $style=="style32" || $style=="style33" || $style=="style34" || $style=="style35") {
		
		$output .= '
		
			<h1 style="color: red; ">SORRY THIS STYLE ONLY FOR PRO VERSION. IF YOU WANT TO BUY RD HOVER EFFECTS PRO VERSION WITH AWESOME FEATURES PLEASE CLICK HERE <a style="color: blue;" target="_blink" href="http://wpexpert24.com/rd-hover-effects-pro/">CLICK HERE</a></h1>
				';
		}	
	
		$i++;
	}
	
	endwhile;
	$output .='</ul></div></div></div>';
	wp_reset_query();
	return $output;
}

add_shortcode('hover', 'rd_hover_effects_shortcode');


