<?php include '../view/header.php'; ?>
<div id="main">
    <h1 class="top">Error</h1>
    <p class="first_paragraph error"><?php echo $error; ?></p>
</div>
<?php include '../page/'. echo $page; ?>
<?php include '../view/footer.php'; ?>