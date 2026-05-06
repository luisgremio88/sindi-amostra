<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/bootstrap.php';
require_once SITE_ROOT . '/includes/layout.php';

if (is_admin_logged_in()) {
    redirect_to('admin/dashboard.php');
}

if (is_associate_logged_in()) {
    redirect_to('associado/dashboard.php');
}

$error = '';
$data = load_site_data();
$home = $data['home'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        verify_csrf_token();

        $login = trim((string) ($_POST['login'] ?? ''));
        $password = trim((string) ($_POST['password'] ?? ''));

        if (!can_attempt_login($login)) {
            throw new RuntimeException('Muitas tentativas de acesso. Aguarda alguns minutos e tenta novamente.');
        }

        $associate = authenticate_associate($login, $password);
        if ($associate !== null) {
            finish_login('associate_id', (int) $associate['id'], $login);
            redirect_to('associado/dashboard.php');
        }

        $admin = authenticate_admin($login, $password);
        if ($admin !== null) {
            finish_login('admin_id', (int) $admin['id'], $login);
            redirect_to('admin/dashboard.php');
        }

        record_failed_login($login);
        $error = 'Acesso nao localizado. Se for associado, usa o CPF cadastrado. Se for administrador, usa o usuario ou e-mail.';
    } catch (Throwable $exception) {
        $error = $exception->getMessage();
    }
}

render_header('Sindi Amostra | Area Restrita', $home);
?>

<main class="section">
    <div class="container narrow">
        <section class="panel">
            <span class="eyebrow solid">Area Restrita</span>
            <h2>Login</h2>

            <form method="post" class="form-grid">
                <?= csrf_field(); ?>
                <div class="field">
                    <label for="login">Login</label>
                    <input id="login" name="login" type="text" value="">
                </div>

                <div class="field">
                    <label for="password">Senha</label>
                    <input id="password" name="password" type="password" value="">
                </div>

                <?php if ($error !== ''): ?>
                    <p class="status-error"><?= h($error); ?></p>
                <?php endif; ?>

                <div class="actions">
                    <button class="button button-primary" type="submit">Entrar</button>
                </div>
            </form>
        </section>
    </div>
</main>

<?php render_footer(); ?>
