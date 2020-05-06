<?php
$master = [
    ['text' => 'master1', 'value' => 0],
    ['text' => 'master2', 'value' => 1],
];

$sub = [
    [
        ['text' => 'm1sub1', 'value' => '1-1'],
        ['text' => 'm1sub2', 'value' => '1-2'],
    ],
    [
        ['text' => 'm2sub1', 'value' => '2-1'],
        ['text' => 'm2sub1', 'value' => '2-2'],
    ]
];

return ['master' => $master, 'sub' => $sub];
