<?php

if (!rex_request::isHttps()) {
    $this->setProperty('installmsg', 'https is required for this addon to work properly');
    return;
}

rex_dir::copy($this->getPath('vendor/icecoder'), rex_path::frontend('icecoder'));
rex_file::copy($this->getPath('config___settings.php'), rex_path::frontend('icecoder/lib/'));
