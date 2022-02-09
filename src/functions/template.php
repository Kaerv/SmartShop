<?php
/**
 * Template functions
 */

/**
 * Returns content of template file with assigned params
 * 
 * @param string $path Path to tpl folder
 * @param string $file Template file name without extension
 * @param array $args Template args
 * 
 * @return string Template content
 * 
*/
function getTemplate(string $path, string $file, array $args = array()) {
    $filepath = $path . $file . ".php";

    if(file_exists($filepath)) {
        extract($args);

        ob_start();
        include($filepath);
        $content = ob_get_contents();
        ob_end_clean();
        
        return $content;
    } else {
        return "";
    }
}

/**
 * Returns path to template file
 * 
 * @param string $template Path to template file
 */
function template($template, $is_admin = false) {
    $template = str_replace(".php", "", $template);
    return ($is_admin ? _ADMIN_TPL_DIR_ : _TPL_DIR_) . $template . ".php";
}