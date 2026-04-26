<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/bootstrap.php';
require_once SITE_ROOT . '/includes/layout.php';

$data = load_site_data();
$home = $data['home'];
$errors = [];
$successMessage = null;
$formData = [
    'nome' => '',
    'email' => '',
    'assunto' => '',
    'mensagem' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formData = [
        'nome' => trim((string) ($_POST['nome'] ?? '')),
        'email' => trim((string) ($_POST['email'] ?? '')),
        'assunto' => trim((string) ($_POST['assunto'] ?? '')),
        'mensagem' => trim((string) ($_POST['mensagem'] ?? '')),
    ];

    if ($formData['nome'] === '') {
        $errors[] = 'Informe o nome.';
    }

    if ($formData['email'] === '' || !filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Informe um e-mail valido.';
    }

    if ($formData['assunto'] === '') {
        $errors[] = 'Informe o assunto.';
    }

    if ($formData['mensagem'] === '') {
        $errors[] = 'Escreva a mensagem.';
    }

    if ($errors === []) {
        create_contact_message($formData);
        $successMessage = 'Mensagem enviada e salva com sucesso.';
        $formData = [
            'nome' => '',
            'email' => '',
            'assunto' => '',
            'mensagem' => '',
        ];
    }
}

render_header('Sindi Amostra | Contato', $home);
?>

<main class="section">
    <div class="container">
        <div class="section-heading">
            <div>
                <h2>Contato</h2>
                <p>Canal institucional para apresentar os dados de contato e receber mensagens pelo formulario.</p>
            </div>
        </div>

        <?php if ($successMessage !== null): ?>
            <div class="flash-success"><?= h($successMessage); ?></div>
        <?php endif; ?>

        <?php if ($errors !== []): ?>
            <div class="flash-error">
                <?= h(implode(' ', $errors)); ?>
            </div>
        <?php endif; ?>

        <div class="contact-layout">
            <section class="panel">
                <span class="eyebrow solid">Atendimento</span>
                <h3>Fale conosco</h3>
                <p>Esta pagina pode ser usada como vitrine institucional e tambem como canal para receber mensagens de clientes e associados.</p>

                <div class="contact-list">
                    <div class="contact-item">
                        <strong>Endereco</strong>
                        <p>Av. Borges de Medeiros</p>
                        <p>Praia de Belas | Porto Alegre | RS | Brasil</p>
                        <p>90110-150</p>
                    </div>

                    <div class="contact-item">
                        <strong>Telefone</strong>
                        <p>(51) xxxx-xxxx</p>
                    </div>

                    <div class="contact-item">
                        <strong>E-mail</strong>
                        <p>contato@sindi-amostra.local</p>
                    </div>
                </div>
            </section>

            <section class="panel">
                <span class="eyebrow solid">Formulario</span>
                <h3>Envio de e-mail</h3>
                <p>Preencha os campos abaixo. A mensagem fica registrada no banco para depois ligarmos ao painel ou ao disparo real de e-mail.</p>

                <form method="post" class="signup-form top-gap-sm">
                    <div class="field">
                        <label for="nome">Nome</label>
                        <input id="nome" name="nome" type="text" value="<?= h($formData['nome']); ?>" required>
                    </div>

                    <div class="field">
                        <label for="email">E-Mail</label>
                        <input id="email" name="email" type="email" value="<?= h($formData['email']); ?>" required>
                    </div>

                    <div class="field">
                        <label for="assunto">Assunto</label>
                        <input id="assunto" name="assunto" type="text" value="<?= h($formData['assunto']); ?>" required>
                    </div>

                    <div class="field">
                        <label for="mensagem">Mensagem</label>
                        <textarea id="mensagem" name="mensagem" required><?= h($formData['mensagem']); ?></textarea>
                    </div>

                    <div class="actions">
                        <button class="button button-primary" type="submit">Enviar mensagem</button>
                    </div>
                </form>
            </section>
        </div>
    </div>
</main>

<?php render_footer(); ?>
