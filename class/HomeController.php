<?php

class HomeController {

	public function index() {

	$postModel = new PostModel();
	$posts = $postModel->getAllPosts();

	$fb = new FlashBag;

	$page = 'index';
	include 'views/layout.phtml';
	}
}