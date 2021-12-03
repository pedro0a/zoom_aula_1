<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php
    foreach ($items as $item) {
        echo '
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                        ' . $item['title'] . '
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                        ' . implode(' - ', $item['types']) . '
                        </h6>
                        <p class="card-text">
                        ' . $item['desc'] . '
                        </p>
                    </div>
                    <div class="card-footer ' . getColor($item['price']) . '">
                    ' . $item['price'] . ' €
                  </div>
                </div>
            </div>
            ';
    }
    ?>
</div>