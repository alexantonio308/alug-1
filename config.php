<?php
session_start();

global $pdo;
try {
	$pdo = new PDO("mysql:dbname=alug;host=127.0.0.1", "root", "");
} catch(PDOException $e) {
	echo "FALHOU: ".$e->getMessage();
	exit;
}
?>