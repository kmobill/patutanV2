<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php require 'sidebar_left.php'; ?>
<?php
$id = $_GET['id'];
echo '<div data-srcBlog=' . $id . ' id="idBlog"></div>';
?>
<main class="flex flex-col w-11/12 m-auto justify-center items-center py-3 text-slate-600" id='pageContent'></main>
<?php require 'footer.php'; ?>
<script src="scripts/generateBlog.js" type="text/javascript"></script>