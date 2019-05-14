<?php

	include 'class/UserSession.php';

	$userSession = new UserSession();
	$user = $userSession->signout();

	header ('Location: index.php');

	exit;