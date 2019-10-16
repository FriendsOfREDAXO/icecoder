<?php
if (rex_string::versionCompare($this->getVersion(), '2.0', '<')) {
throw new rex_functional_exception('Please uninstall old version and install the new version');
}
