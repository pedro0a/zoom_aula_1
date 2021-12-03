<?php

require_once './utils/variables.php';
require_once './utils/functions.php';

include_once './components/header.html';

?>
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1"><?php echo $title ?></span>
        <div class="d-flex">
            <ul class="navbar-nav fd-row">
                <?php
                foreach ($navbarLinks as $link => $key) {
                    echo '<li class="nav-item"><a class="nav-link" href="#' . $key . '">' . $link . '</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
<div class="container" style="padding: 50px 0;" id="items-group">
    <h2 class="mb-4">All products</h2>
    <?php include_once './components/cards.php' ?>
</div>
<hr>
<div class="container" id="table-prices">
    <h2 class="mb-4">Table prices</h2>
    <?php include_once './components/table.php' ?>
</div>

<?php include_once './components/footer.html'; ?>