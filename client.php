<?php

$options = getopt('d:p:');

$socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
socket_connect($socket, $options['d'], $options['p']);

$counter = 0;

while(true) {
	$msg = 't;' . time() . ';m;' . microtime(true) . ';c;' . $counter;
	echo $msg . PHP_EOL;
	socket_write($socket, $msg);
	sleep(1);
	$counter ++;
}
