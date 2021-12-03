<table class="table">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Price</th>
            <th scope="col">#Types</th>
            <th scope="col">Price level</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($items as $i => $item) {
            echo '
                    <tr>
                        <th scope="row">' . $i . '</th>
                        <td>' . $item['price'] . ' €</td>
                        <td>' . count($item['types']) . '<span class="text-muted"> (' . implode(', ', $item['types']) . ')</span>' . '</td>
                        <td>' . getPriceLevel($item['price']) . '</td>
                    </tr>
                ';
        }
        ?>
    </tbody>
    <tfoot>
        <?php
        echo '
                    <tr>
                        <th scope="row">Average</th>
                        <td>' . getAveragePrice($items) . '</td>
                        <td></td>
                        <td></td>
                    </tr>
                ';
        ?>
    </tfoot>
</table>