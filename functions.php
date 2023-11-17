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

    if (!file_exists($path)) {
        if (str_contains($locale, '-')) // Fallback to the locale without a country code
            return get_localization($fileName, explode('-', $locale, 2)[0], $common);
        else if (!str_starts_with($locale, 'en'))  // Fallback to default language
            return get_localization($fileName, 'en', $common);
    }

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

/**
 * @return string webp version of the source if available, or the source itself.
 */
function get_webp(string $source): string
{
    $dir = pathinfo($source, PATHINFO_DIRNAME);
    $name = pathinfo($source, PATHINFO_FILENAME);
    $destination = $dir . '/' . $name . '.webp';

    return file_exists($_SERVER['DOCUMENT_ROOT'] . $destination) ? $destination : $source;
}

// STATS & LOGGING

/**
 * @return string real user ip or 'unknown'
 */
function get_real_user_ip(int $filter_options = FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE): string
{
    $ips = [
        $_SERVER["HTTP_X_FORWARDED_FOR"] ?? '',
        $_SERVER["HTTP_CLIENT_IP"] ?? '',
        $_SERVER["HTTP_CF_CONNECTING_IP"] ?? '',
        $_SERVER["REMOTE_ADDR"] ?? '',
    ];

    foreach ($ips as $ip) {
        if ($ip = filter_var($ip, FILTER_VALIDATE_IP, $filter_options))
            break;
    }

    return $ip ?? 'unknown';
}

/**
 * Logs visitor data to our database server.
 */
function log_visitor_data(): void
{
    // TODO check if there's a room for improvement, e.g:
    // if user ip could be masked or completely avoided
    // if page url could be tampered with by client side
    // if using a public api is safe

    $api_url = "https://projects-logs.vercel.app/api/logs?";
    $page_url = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    $escaped_page_url = htmlspecialchars($page_url, ENT_QUOTES, 'UTF-8');
    $post_data = [
        "ip" => get_real_user_ip(),
        "project" => $escaped_page_url,
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url . http_build_query($post_data));
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch); // Close the connection manually in case of anything

    if ($response === false)
        error_log("API request failed..." . PHP_EOL . curl_error($ch));
}

// Let's log in each project!
log_visitor_data();