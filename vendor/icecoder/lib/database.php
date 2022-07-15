<?php
function adminer_object() {
    include_once "./adminer-plugins/plugin.php";
    include_once "./adminer-plugins/frames.php";
    
    $plugins = array(
        new AdminerFrames()
    );
    
    return new AdminerPlugin($plugins);
}

include "./database-adminer-481-en.php";
?>
