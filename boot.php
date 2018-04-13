<?php

    $page = rex_be_controller::getCurrentPage();
    if (!$page || $page === (string) (int) $page) {
        rex_be_controller::setCurrentPage('icecoder');
    }

