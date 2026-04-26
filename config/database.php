<?php

declare(strict_types=1);

$localConfigFile = __DIR__ . '/database.local.php';

if (is_file($localConfigFile)) {
    return require $localConfigFile;
}

return [
    'host' => getenv('DB_HOST') ?: '127.0.0.1',
    'port' => (int) (getenv('DB_PORT') ?: 3306),
    'database' => getenv('DB_NAME') ?: 'bancoSindi',
    'username' => getenv('DB_USER') ?: 'seu_usuario',
    'password' => getenv('DB_PASSWORD') ?: 'sua_senha',
    'charset' => getenv('DB_CHARSET') ?: 'utf8mb4',
];
