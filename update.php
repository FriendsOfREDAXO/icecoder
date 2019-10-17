<?php
// delete old Version
rex_dir::delete(rex_path::frontend('icecoder'));
// start install
include_once (__DIR__ . '/install.php');
