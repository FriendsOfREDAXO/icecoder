<?php

if (!rex_request::isHttps()) {
    $this->setProperty('installmsg', 'https is required for this addon to work properly');
    return;
}

rex_dir::copy($this->getPath('vendor/icecoder'), rex_path::frontend('icecoder'));

// resolve the HOST at installation time, so we dont need to resolve it at login-time.
// this makes sure noone can fake the auto-login url.
$config = rex_file::get($this->getPath('config___settings.php'));
$config = str_replace('%%HOST%%', $_SERVER['HTTP_HOST'], $config);
rex_file::put(rex_path::frontend('icecoder/data/config-settings.php'), $config);

