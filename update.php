<?php
if (rex_string::versionCompare($this->getVersion(), '2.0', '<')) {
throw new rex_functional_exception(rex_i18n::msg('icecoder_delete_install'));
}
