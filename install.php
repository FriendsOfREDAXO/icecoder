<?php

rex_dir::copy(rex_path::backend('src/addons/icecoder/vendor/icecoder'), rex_path::frontend('icecoder'));
rex_file::copy(rex_path::backend('src/addons/icecoder/config___settings.php'), rex_path::frontend('icecoder/lib/'));
