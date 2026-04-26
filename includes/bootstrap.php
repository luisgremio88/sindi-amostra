<?php

declare(strict_types=1);

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
