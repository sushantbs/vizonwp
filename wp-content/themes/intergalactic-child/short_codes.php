<?php 



/************ raw form code of the each short code form element *******************/

add_filter('pu_shortcode_form_add_text', 'pu_add_text_form_element', 10, 4);
function pu_add_text_form_element( $content, $name, $title, $value = '' )
{
    return sprintf('<tr><td>%s</td><td><input type="text" id="%s" name="%s" value="%s" /></td></tr>',
        $title,
        $name,
        $name,
        $value);
}

/************ add form elements to the each specific short code *******************/


add_filter('pu_shortcode_form', 'pu_add_top_main_form', 10, 1);
function pu_add_top_main_form( $shortcode_tags )
{
    $shortcode_tags['top_main_box'] = apply_filters('pu_shortcode_form_add_text', null, 'page_name', 'Page Name');
    $shortcode_tags['top_main_box'] .= apply_filters('pu_shortcode_form_add_text', null, 'width', 'Width', 300);
    // $shortcode_tags['facebook_like_box'] .= apply_filters('pu_shortcode_form_add_checkbox', null, 'show_faces', 'Show Faces');
    // $shortcode_tags['facebook_like_box'] .= apply_filters('pu_shortcode_form_add_checkbox', null, 'show_stream', 'Show Stream');
    // $shortcode_tags['facebook_like_box'] .= apply_filters('pu_shortcode_form_add_checkbox', null, 'show_header', 'Show Header', true);
    // $shortcode_tags['facebook_like_box'] .= apply_filters('pu_shortcode_form_add_checkbox', null, 'show_border', 'Show Border');
    // $shortcode_tags['facebook_like_box'] .= apply_filters('pu_shortcode_form_add_select', null, 'color_scheme', 'Color Scheme', array('light' => 'Light', 'dark' => 'Dark'));

    return $shortcode_tags;
}






/************ initialize shortcodes_form javascript variable with short codes form attributes *******************/


add_action('admin_footer', 'pu_shortcode_dialog');
function pu_shortcode_dialog()
{
    echo '<div id="shortcode-dialog" title="Shortcode Form">
            <form class="shortcode-dialog-form"></form></div>';

    echo '<script type="text/javascript">
    var shortcodes_form = new Object();';

    $shortcode_form = array();
    $shortcode_form = apply_filters('pu_shortcode_form', $shortcode_form);

    if(!empty($shortcode_form))
    {

        foreach($shortcode_form as $tag => $form)
        {

            echo "shortcodes_form['{$tag}'] = '{$form}';";
        }
    }

    echo '</script>';
}



/************ story key value of short codes for drop down in editor *******************/



add_filter('pu_shortcode_button', 'add_top_main_shortcode', 10, 1);
function add_top_main_shortcode( $shortcode_tags )
{
    $shortcode_tags['top_main_box'] = 'Top Main Box';
        
    return $shortcode_tags;
}




/************ short code front display *******************/


function top_main_shortcode( $atts ){
	return '    <div class="header">
    	<div class="header-content">
    		<div class="header-content-inner wow fadeIn">
    			<p style="font-size: 38px; color: #fff; margin: 0;">MAKE THE MOST OF YOUR</p>
    			<h1>data and marketing</h1>
    			<p style="font-size: 38px; color: #fff; margin: 0;">WITH VIZURY\'S</p>
    			<h1>Performance Marketing Hub</h1>
    		</div>
    	</div>
    </div>
';
}
add_shortcode( 'top_main_box', 'top_main_shortcode' );







?>