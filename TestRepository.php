<?php

/**
 * Repository Pattern
 * Dalam buku Domain-Driven Design, Eric Evans menjelaskan bahwa “repository is a mechanism for encapsulating storage, retrieval, and search behavior, which emulates a collection of objects”
 * Pattern Repository ini biasanya digunakan sebagai jembatan antar business logic aplikasi kita dengan semua perintah SQL ke database
 * Jadi semua perintah SQL akan ditulis di Repository, sedangkan business logic kode program kita hanya cukup menggunakan Repository tersebut
 */

require_once __DIR__ . '/GetConnection.php';
require_once __DIR__ . '/Model/Comment.php';
require_once __DIR__ . '/Repository/CommentRepository.php';

use Repository\CommentRepositoryImpl;
use Model\Comment;

$connection = getConnection();
$repository = new CommentRepositoryImpl($connection);

// $comment = new Comment(email: "repository@test.com", comment: "Testing");
// $newComment = $repository->insert($comment);

// var_dump($newComment->getId());

// $comment = $repository->findById(16);
// var_dump($comment);

$comments = $repository->findAll();
var_dump($comments);

$connection = null;
