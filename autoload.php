<?php

spl_autoload_register(function ($className)
{ include "Classes/$className.php"; 
});

?>
