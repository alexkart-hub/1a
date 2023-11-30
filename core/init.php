<?php

define('TEMPLATE', 'default');
define('TEMPLATE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/app/template/' . TEMPLATE);
define('HOST', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']);
define('TEMPLATE_URL', HOST . '/app/template/' . TEMPLATE);