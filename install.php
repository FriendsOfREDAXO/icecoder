<?php

if (!rex_request::isHttps()) {
    $this->setProperty('installmsg', 'https is required for this addon to work properly');
    return;
}

rex_dir::copy($this->getPath('vendor/icecoder'), rex_path::frontend('icecoder'));

// resolve the HOST at installation time, so we dont need to resolve it at login-time.
// this makes sure noone can fake the auto-login url.

$index = rex_file::get($this->getPath('ice_index.php'));
$index = str_replace('%%HOST%%', $_SERVER['HTTP_HOST'], $index);
rex_file::put(rex_path::frontend('icecoder/index.php'), $index);

$config = rex_file::get($this->getPath('config__global.php'));
rex_file::put(rex_path::frontend('icecoder/data/config-global.php'), $config);

