<?php
// Logged in page. To be included on all pages that require login for access.
$page_title = 'Logged In!'; ?>

<!--Print a customized message:-->
<div class="logout">
<?php echo "<h1>Logged In!</h1>
<p>You are now logged in, {$_SESSION['username']}!</p>";
?>
<a class="btn btn-info"  href="logout.php">Logout </a>
</div>