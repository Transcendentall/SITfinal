<?php

require_once join(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'vendor', 'autoload.php']);
require_once join(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'Viewer.php']);
require_once join(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'InfoLogger.php']);


$view = new Viewer();
$view->show('flogs.twig');
$logger = new InfoLogger('notnew');

echo '<div class="text">';
$logger->print();
echo '<div>';