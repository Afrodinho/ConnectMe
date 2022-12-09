<?php
    // Load all the required files in order
    /**
     * Abby's Note:
     * The tutorial had the db.php and class.php files in a "j_includes" subdirectory.
     * Since I am currently unsure whether there's any need to enforce this structure in
     * our project and there are no other references to these file paths, I have dropped
     * the subdirectory from the path of these two files in the lines below.
     */
    require_once(dirname(__FILE__) . '/config.php');
    require_once(dirname(__FILE__) . '/db.php');
    require_once(dirname(__FILE__) . '/class.php');
?>