#!/usr/bin/env php

<?php 

require $_SERVER['PWD'] . '/.git/hooks/utils.php';

// get the commit message
$commit_message_file = ".git/COMMIT_EDITMSG";

$status = 0;

// get the commit message
$commitMessage = file($commit_message_file);

$commitMessage = $commitMessage[0];

// check the commit message for pattern (\w+\-\d+)
preg_match('/(\w+\-\d+)/i', $commitMessage, $matches);

// check if a match is not found
if(empty($matches))
{
	// match was not found
	echo "Please mention the ISSUE ID in the commit message. The format is CW-12";
	$status = 1;
}

exit($status);