<?php

/**
 * @param string $name replace spaces with '+' signs
 * @param string $weights use semicolon delimiter
 * @param string $display font-display property
 * @return void
 */
function get_google_font(string $name, string $weights = '400;700', string $display = 'block'): void
{
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=<?= $name ?>:wght@<?= $weights ?>&display=<?= $display ?>">
    <?php
}
