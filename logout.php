<?php
session_start();
if(session_destroy())
{
    
header("Location: index.php");
    
       echo '<script type="text/javascript">',
     'out();',
     '</script>' ;
}
?>
