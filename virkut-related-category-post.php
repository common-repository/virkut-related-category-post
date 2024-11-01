<?php
/*
  Plugin Name: Virkut Related Category Post
  Plugin URI: http://www.trsbd.com/
  Description: Virkut Related Category Post is a WordPress Plugin help to show related category item using CSS3. Fully responsive With Mobile Optimized. Its easy to use.
  Author: Sk Abul Hasan
  Author URI: http://trsbd.com/
  Version: 1.0
 */

//Loading CSS File
function vkrcp_hover_effects_style() {
    wp_enqueue_style('gird_boot_css', plugins_url('/css/bootstrap.min.css', __FILE__));
    wp_enqueue_style('main_css', plugins_url('/css/style.css', __FILE__));
}

vkrcp_hover_effects_style();

if (!class_exists('VIRKUTAutoLoader')) {
    defined('VIRKUT_VERSION') or define('VIRKUT_VERSION', '1.0');
    defined('VIRKUT_URL') or define('VIRKUT_URL', plugin_dir_url(__FILE__));
    defined('VIRKUT_DIR') or define('VIRKUT_DIR', plugin_dir_path(__FILE__));
    defined('VIRKUT_FILE') or define('VIRKUT_FILE', __FILE__);
    require 'framework/bootstrap.php';
}

function vkrcp_shortcodegenerator() {
    $tmpl_sg = array(
        'name' => 'sg_1',
        'template' => VIRKUT_DIR . '/admin/shortcode_generator.php',
        'modal_title' => __('Related Post Shortcode', 'vkrcp_textdomain'),
        'button_title' => __('Related Post Shortcode', 'vkrcp_textdomain'),
        'types' => array('post', 'page'),
        'main_image' => VIRKUT_URL . 'images/hover-shortcode.gif',
        'sprite_image' => VIRKUT_URL . 'images/hover-shortcode.gif',
    );

    $sg = new VP_ShortcodeGenerator($tmpl_sg);
}

add_action('after_setup_theme', 'vkrcp_shortcodegenerator');


add_shortcode("virkut", "vkrcp_shortcode");

function vkrcp_shortcode($attr) {
    
}

add_filter('the_content', 'vkrcp_related_content');

function vkrcp_related_content($content) {
    global $shortcode_tags;
    
    if (false === strpos($content, '[')) {
        return $content;
    }
    if (empty($shortcode_tags) || !is_array($shortcode_tags)) {
        return $content;
    }
    // Find all registered tag names in $content.
    preg_match_all('@\[([^<>&/\[\]\x00-\x20=]++)@', $content, $matches);
    $tagnames = array_intersect(array_keys($shortcode_tags), $matches[1]);

    if (empty($tagnames)) {
        return $content;
    }

    $content = do_shortcodes_in_html_tags($content, $ignore_html, $tagnames);
    $allString = $content;
    $pattern = get_shortcode_regex($tagnames);
    $content = preg_replace_callback("/$pattern/", 'do_shortcode_tag', $content);
    
    // Always restore square braces so we don't break things like <!--[if IE ]>
    $content = unescape_invalid_shortcodes($content);    
    $allString = str_replace("[ ", "[", $allString);
    $allString = str_replace("[ ", "[", $allString);
    $allString = str_replace("[ ", "[", $allString);
    $allString = str_replace(" ]", "]", $allString);
    $allString = str_replace(" ]", "]", $allString);
    $allString = str_replace(" ]", "]", $allString);
    $allString = str_replace("  ", " ", $allString);
    $allString = str_replace("  ", " ", $allString);
    
    $sCode = "";
    $count = 0;
    for($i=0; $i < strlen($allString); $i++){
        if($allString[$i]=="[" && $allString[$i+1]=="v" && $allString[$i+2]=="i" && $allString[$i+3]=="r" && $allString[$i+4]=="k" && $allString[$i+5]=="u" && $allString[$i+6]=="t"){
            $count = 1;
        }
        if($count == 1){
            if($allString[$i] == "]"){
                break;
            }
            $sCode .= $allString[$i];
        }
    }    
    
    
    
    $sCode = str_replace("virkut", "", $sCode);
    $vkArr = array();
    $index = "";
    $value = "";
    $equal = 0;    
    
    
    
    for ($i = 2; $i < strlen($sCode); $i++) {
        if ($sCode[$i] == " " || $sCode[$i] == "]") {
            $vkArr[$index] = $value;
            $equal = 0;
            $index = "";
            $value = "";
        }
        else if ($equal == 0 && $sCode[$i] != "=") {
            $index .=$sCode[$i];
        } else if ($equal == 1 && $sCode[$i] != '"' && $sCode[$i] != "'") {
            $value .=$sCode[$i];
        }
        if ($sCode[$i] == "=") {
            $equal++;
        }
    }
    $vkArr[$index] = $value;
	/*
    echo "<pre>";
    print_r($vkArr);
    echo "</pre>";
	*/
    
    
    $id = get_the_ID();
    if (!is_singular('post')) {
        return $content;
    }
    $terms = get_the_terms($id, 'category');
    $con = do_shortcode($attr);

    $cats = array();
    foreach ($terms as $term) {
        $cats[] = $term->term_taxonomy_id;
    }
    $loop = new WP_Query(
            array(
        'posts_per_page' => $vkArr['vkrcp_post_per_row'],
        'category__in' => $cats,
        'orderby' => 'rand',
        'post__not_in' => array($id)
            )
    );
    
    
    
    if ($loop->have_posts()) {
        $content .= '<h2>Related Post</h2><div class="row">';
        while ($loop->have_posts()) {

            $loop->the_post();
            
            //Post Per Page
            if($vkArr['vkrcp_post_per_row'] == 1){
                $content .= "<div class='col-sm-12'>";
            }
            else if($vkArr['vkrcp_post_per_row'] == 2){
                $content .= "<div class='col-sm-6'>";
            }
            else if($vkArr['vkrcp_post_per_row'] == 3){
                $content .= "<div class='col-sm-4'>";
            }
            else if($vkArr['vkrcp_post_per_row'] == 4){
                $content .= "<div class='col-sm-3'>";
            }
            else if($vkArr['vkrcp_post_per_row'] == 6){
                $content .= "<div class='col-sm-6'>";
            }
            else{
                $vkArr['vkrcp_post_per_row'] = 4;
                $content .= "<div class='col-sm-4'>";
            }
            
            
            
            //Box Style
            $content .= "<a href='" . get_permalink() . "' class='thumbnail vkrcp_style_2' style='";
            
            
                $content .= "border: 1px solic #ccc !important; box-shadow: 0 0 3px #CCC !important;";
            
            $content .= "'>";
            
            
            //Image Style
            $content .= "<div class='vk-image'><img src='" . wp_get_attachment_url(get_post_thumbnail_id($post->ID)) . "' width='100%' class='img-responsive' /></div>";
            
            //Title Style
            $content .= "<span style='margin-top: 10px; min-height: 54px; display:block; font-size:{$vkArr['vkrcp_title_font_size']}px; text-align: center;'>";
            
            $content .= get_the_title();
            $content .= "</span></a></div>";
        }
        $content .='</div>';
        wp_reset_query();
    }
    return $content;
}

?>