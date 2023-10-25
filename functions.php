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

/**
 * @param string $fileName without locale & extension
 * @param string $locale ISO language code (with our without country code)
 * @param bool $common
 * @return string full path of the requested file
 */
function get_localization(string $fileName, string $locale, bool $common = false): string
{
    if ($common)
        $path = $_SERVER['DOCUMENT_ROOT'] . '/commons/i18n/' . $fileName . '-' . $locale . '.php';
    else
        $path = $_SERVER['DOCUMENT_ROOT'] . '/i18n/' . $fileName . '-' . $locale . '.php';

    // Fallback to the locale without a country code
    if (!file_exists($path) && str_contains($locale, '-'))
        return get_localization($fileName, explode('-', $locale, 2)[0], $common);

    return $path;
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

function get_wp_button(string $text, string $href = null): void
{
    ?>
    <a class="button" href="<?= $href ?? WHATSAPP_LINK ?>" target="_blank">
        <?= $text ?>
    </a>
    <?php
}

function get_form_analytics_script(string $rid): void
{
    ?>
    <script id='wf_anal' src='https://crm.zohopublic.com/crm/WebFormAnalyticsServeServlet?rid=<?= $rid ?>'></script>
    <?php
}
