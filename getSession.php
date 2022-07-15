<?
session_start();
$id = $_SESSION['id'];
if($id==''){
	header("Location: index.php");
}
?>