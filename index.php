<?php
require_once 'vendor/autoload.php';
use LFreeze\BuilderPattern\Entry;

(new Entry())->test('test method');
(new Entry())->run();

