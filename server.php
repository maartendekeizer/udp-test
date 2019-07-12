<?php

$options = getopt('d:p:');

$socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
socket_bind($socket, $options['d'], $options['p']);

$expectedCounter = 0;

while(true) {
	$connection = socket_recvfrom($socket, $buffer, 512, 0, $name, $port);
	
	$parts = explode(';', $buffer);
	$parts[] = 'd';
	$parts[] = date('YmdHis', $parts[1]);
	$parts[] = 'mr';
	$parts[] = microtime(true);
	$parts[] = 'diff';
	$parts[] = $parts[9] - $parts[3];
	$parts[] = ( $expectedCounter != $parts[5] ? '!' . $expectedCounter : '' );
	echo implode(';', $parts) . PHP_EOL;
	
	$expectedCounter = $parts[5] + 1;
}
