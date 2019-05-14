<?php

include_once 'Database.php';
include_once 'AbstractModel.php';

class CommentModel extends AbstractModel {

	//
	function getCommentsByPostId($id) {

		$sql = 'SELECT Comment.Id, Nickname, CreatedAt, Content
				FROM Comment
				WHERE PostId=?
				ORDER BY CreatedAt DESC
				LIMIT 5';

		return $this->db->queryAll($sql, [$id]);
	}

	function addComment($nickname, $content, $postId) {
	$sql = 'INSERT INTO comment (Nickname, Content, PostId) VALUES (?, ?, ?)';
	
	return $this->db->queryAction($sql, [$formNick, $formCont, $postId]);	
	}
}