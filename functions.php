<?php /** @noinspection PhpUnused */

// UTILITY

function trim_phone_number(string $readable_number): string
{
    return preg_replace('/[\s()]/', '', $readable_number);
}

function get_template(string $template, bool $common = false): string
{
    if ($common)
        return $_SERVER['DOCUMENT_ROOT'] . '/commons/templates/' . $template;
    else
        return $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $template;
}

function get_script(string $script, bool $common = false): string
{
    if ($common)
        return $_SERVER['DOCUMENT_ROOT'] . '/commons/scripts/' . $script;
    else
        return $_SERVER['DOCUMENT_ROOT'] . '/scripts/' . $script;
}

function get_page_style($file_name): string
{
    return '/pages/' . basename(dirname($_SERVER['SCRIPT_FILENAME'])) . '/' . $file_name;
}

// TEMPLATES

/**
 * @param string $name replace spaces with '+' signs
 * @param string $weights use semicolon delimiter
 * @param string $display font-display property
 * @return void
 */
function get_google_font(string $name, string $weights = '400;700', string $display = 'block'): void
{
    // @formatter:off
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=<?= $name ?>:wght@<?= $weights ?>&display=<?= $display ?>">
    <?php
    // @formatter:on
}

function get_preload_style(string $href): void
{
    ?>
    <link rel="preload" href="<?= $href ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <?php
}
