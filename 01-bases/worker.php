<?php

// sleep(3); // on peut ralentir le script volontairement

$sentences = [
    'Hello world!',
    'Great server',
    'Amazing ajax request',
    'A random sentence',
    'Sentence generator'
];

echo $sentences[array_rand($sentences)];