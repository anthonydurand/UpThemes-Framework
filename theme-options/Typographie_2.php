<?php
/*  Array Options:
   
   name (string)
   desc (string)
   id (string)
   type (string) - text, color, image, select, multiple, textarea, page, pages, category, categories, text_list
   value (string) 	- default value - replaced when custom value is entered - (text, color, select, textarea, page, category)
					- For multiple default values in multiple selects, separate with a comma space ("value" => "option 1, options 2")
						- For pages "value" => "Page Name, Page Name 2"
						- For categories "value" => "slug, slug2"
   options (array)
   attr (array) - any form field attributes
   url (string) - for image type only - defines the default image
   default_text (string) - overrides "None" option text in selects
	
	How to use this file:
		1. Save this template to the 'theme-options' folder in the theme root
		2. Change the file name to this syntax (remember to add the php extension):  
			tab-name_#.php - # is the position you want your tab to appear. Each tab must have a unique ordinal number.
			Example: 
				colors-and-images_0.php - will render a tab "Colors and Images" that will be the first on the list.
		3. Create your options and BAM!
*/

$options = array (
    // Générique
    array(
        "name" => "Générique",
        "type" => "divider",
    ),
    array(  
        "name"  => "Couleur de la police",
        "desc"  => "Choisissez la couleur de la police",
        "id"    => "custom_p_color", // pour que ça marche, il faut nommer id de la couleur du 'id'_color ou 'id' est l'id de la typographie à colorer
        "type"  => "color",
        "value" => "#000000",
    ),
    array(  
        "name"  => "Couleur de la police au survol",
        "desc"  => "Choisissez la couleur de la police au survol",
        "id"    => "custom_p_hover_color", // pour que ça marche, il faut nommer id de la couleur du 'id'_hover_color ou 'id' est l'id de la typographie à colorer
        "type"  => "color",
        "value" => "#000000",
    ),
    array(
        "name" => "Paragraphe",
        "desc" => "Choisir la police pour les paragraphes.",
        "id" => "custom_p",
        "selector" => "p",
        "type" => "typography",
        "default" => "Helvetica",
        "attr" => "custom_p_color",
    ),
    ///////////////////////////////////////////////////////////////////////////////////////////////
    //Header
        array(
        "name" => "Navigation",
        "type" => "divider",
    ),
    array(  
        "name"  => "Couleur de la police",
        "desc"  => "Choisissez la couleur de la police",
        "id"    => "menu_font_color",
        "type"  => "color",
        "value" => "#000000",
    ),
    array(  
        "name"  => "Couleur de la police au survol",
        "desc"  => "Choisissez la couleur de la police au survol",
        "id"    => "menu_font_hover_color", // pour que ça marche, il faut nommer id de la couleur du 'id'_hover_color ou 'id' est l'id de la typographie à colorer
        "type"  => "color",
        "value" => "#000000",
    ),
    array(
        "name" => "Menu du site",
        "desc" => "Choisir la police pour le menu du site.",
        "id" => "menu_font",
        "selector" => "ul#nav li a",
        "type" => "typography",
        "default" => "Merriweather"
    ),
    ///////////////////////////////////////////////////////////////////////////////////////////////
    // Articles 
    array(
        "name" => "Article de blog",
        "type" => "divider",
    ),
        array(  
            "name"  => "Couleur de la police",
            "desc"  => "Choisissez la couleur de la police",
            "id"    => "post_blog_title_color",
            "type"  => "color",
            "value" => "#000000",
        ),
        array(  
            "name"  => "Couleur de la police au survol",
            "desc"  => "Choisissez la couleur de la police au survol",
            "id"    => "post_blog_title_hover_color",
            "type"  => "color",
            "value" => "#000000",
        ),
        array(
            "name" => "Titre d'article h1",
            "desc" => "Choisir la police pour le titre d'article du blog.",
            "id" => "post_blog_title",
            "selector" => ".entry h1",
            "type" => "typography",
            "default" => "Varela"
        ),
        ///////////////////////////////////////////////////////////////////////////////////////////
        array(  
            "name"  => "Couleur de la police",
            "desc"  => "Choisissez la couleur de la police",
            "id"    => "post_blog_meta_color",
            "type"  => "color",
            "value" => "#000000",
        ),
        array(  
            "name"  => "Couleur de la police au survol",
            "desc"  => "Choisissez la couleur de la police au survol",
            "id"    => "post_blog_meta_hover_color",
            "type"  => "color",
            "value" => "#000000",
        ),
        array(
            "name" => "Meta d'article",
            "desc" => "Choisir la police pour l'auteur et laa date de l'article du blog.",
            "id" => "post_blog_meta",
            "selector" => ".entry-meta li",
            "type" => "typography",
            "default" => "Helvetica"
        ),
);


/* ------------ Do not edit below this line ----------- */

//Check if theme options set
global $default_check;
global $default_options;

if(!$default_check):
    foreach($options as $option):
        if($option['type'] != 'image'):
            $default_options[$option['id']] = $option['value'];
        else:
            $default_options[$option['id']] = $option['url'];
        endif;
    endforeach;
    $update_option = get_option('up_themes_'.UPTHEMES_SHORT_NAME);
    if(is_array($update_option)):
        $update_option = array_merge($update_option, $default_options);
        update_option('up_themes_'.UPTHEMES_SHORT_NAME, $update_option);
    else:
        update_option('up_themes_'.UPTHEMES_SHORT_NAME, $default_options);
    endif;
endif;

render_options($options);

?>