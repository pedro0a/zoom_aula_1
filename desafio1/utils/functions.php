<?php
function getColor($price)
{
    $color = 'text-muted';

    if ($price > 700) {
        $color = 'text-danger';
    }

    if ($price <= 300) {
        $color = 'text-success';
    }
    return $color;
}

function getPriceLevel($price)
{
    if ($price > 700) {
        return 'HIGH';
    }

    if ($price <= 300) {
        return 'LOW';
    }

    return 'AVERAGE';
}

function getAveragePrice($items)
{
    $counter = 0;
    $total = 0;
    foreach ($items as $row) {
        $counter++;
        $total += $row['price'];
    }
    return $total / $counter . ' €';
}
