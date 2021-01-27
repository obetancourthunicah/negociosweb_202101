<?php
Define( "CLASS_DIR" , "src".DIRECTORY_SEPARATOR);

set_include_path(CLASS_DIR.PATH_SEPARATOR.get_include_path());
spl_autoload_extensions('.class.php');
spl_autoload_register();
//var_dump(get_include_path());


?>
