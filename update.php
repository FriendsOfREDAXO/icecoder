<?php
if (rex_string::versionCompare($this->getVersion(), '2.0', '<')) {
throw new rex_functional_exception('Please delete old version and start a new installation');
}
