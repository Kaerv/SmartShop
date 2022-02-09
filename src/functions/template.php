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
 * Prints content of template file
 * 
 * @param string $template Path to template file
 */
function template($template) {
    $template = str_replace(".php", "", $template);
    return _TPL_DIR_ . $template . ".php";
}