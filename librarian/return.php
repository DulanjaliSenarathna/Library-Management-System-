<?php 
include "connection.php";
$id=$_GET["id"];
$a=date("d-m-yy");
$res=mysqli_query($link,"update issue_books set books_return_date='$a' where id=$id");
?>

<script type="text/javascript">
    window.location="return_book.php";
</script>