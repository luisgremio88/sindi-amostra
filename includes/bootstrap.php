<?php

declare(strict_types=1);

session_name('sindi_amostra_session');
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'httponly' => true,
    'samesite' => 'Lax',
    'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
]);
session_start();

define('SITE_ROOT', dirname(__DIR__));
define('UPLOADS_ROOT', SITE_ROOT . '/uploads');

require_once SITE_ROOT . '/includes/data_store.php';

function asset_url(string $path): string
{
    return '/sindi-amostra/' . ltrim($path, '/');
}

function is_admin_logged_in(): bool
{
    return !empty($_SESSION['admin_id']);
}

function require_admin(): void
{
    if (!is_admin_logged_in()) {
        header('Location: ' . asset_url('area-restrita.php'));
        exit;
    }
}

function current_admin_id(): ?int
{
    return isset($_SESSION['admin_id']) ? (int) $_SESSION['admin_id'] : null;
}

function is_associate_logged_in(): bool
{
    return !empty($_SESSION['associate_id']);
}

function require_associate(): void
{
    if (!is_associate_logged_in()) {
        header('Location: ' . asset_url('associado/login.php'));
        exit;
    }
}

function current_associate_id(): ?int
{
    return isset($_SESSION['associate_id']) ? (int) $_SESSION['associate_id'] : null;
}

function redirect_to(string $path): void
{
    header('Location: ' . asset_url($path));
    exit;
}

function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return (string) $_SESSION['csrf_token'];
}

function csrf_field(): string
{
    return '<input type="hidden" name="csrf_token" value="' . h(csrf_token()) . '">';
}

function verify_csrf_token(): void
{
    $token = (string) ($_POST['csrf_token'] ?? '');
    $sessionToken = (string) ($_SESSION['csrf_token'] ?? '');

    if ($token === '' || $sessionToken === '' || !hash_equals($sessionToken, $token)) {
        throw new RuntimeException('Sessao expirada ou formulario invalido. Recarrega a pagina e tenta novamente.');
    }
}

function login_attempt_key(string $login): string
{
    return strtolower(trim($login)) ?: 'anonimo';
}

function can_attempt_login(string $login): bool
{
    $key = login_attempt_key($login);
    $attempt = $_SESSION['login_attempts'][$key] ?? ['count' => 0, 'last' => 0];
    $count = (int) ($attempt['count'] ?? 0);
    $last = (int) ($attempt['last'] ?? 0);

    if ($count < 5) {
        return true;
    }

    return (time() - $last) > 900;
}

function record_failed_login(string $login): void
{
    $key = login_attempt_key($login);
    $attempt = $_SESSION['login_attempts'][$key] ?? ['count' => 0, 'last' => 0];

    $_SESSION['login_attempts'][$key] = [
        'count' => (int) ($attempt['count'] ?? 0) + 1,
        'last' => time(),
    ];
}

function clear_failed_login(string $login): void
{
    $key = login_attempt_key($login);
    unset($_SESSION['login_attempts'][$key]);
}

function finish_login(string $sessionKey, int $userId, string $login): void
{
    session_regenerate_id(true);
    $_SESSION[$sessionKey] = $userId;
    unset($_SESSION['csrf_token']);
    clear_failed_login($login);
}

function logout_user(): void
{
    $_SESSION = [];

    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'] ?? '', (bool) $params['secure'], (bool) $params['httponly']);
    }

    session_destroy();
}

function format_currency_br(float $value): string
{
    return 'R$ ' . number_format($value, 2, ',', '.');
}

function sanitize_cpf(string $cpf): string
{
    return preg_replace('/\D+/', '', $cpf) ?? '';
}

function format_cpf(string $cpf): string
{
    $digits = sanitize_cpf($cpf);

    if (strlen($digits) !== 11) {
        return $cpf;
    }

    return substr($digits, 0, 3) . '.'
        . substr($digits, 3, 3) . '.'
        . substr($digits, 6, 3) . '-'
        . substr($digits, 9, 2);
}

function h(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function ensure_directory(string $path): void
{
    if (!is_dir($path)) {
        mkdir($path, 0777, true);
    }
}

function string_starts_with(string $haystack, string $needle): bool
{
    if ($needle === '') {
        return true;
    }

    return substr($haystack, 0, strlen($needle)) === $needle;
}
