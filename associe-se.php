<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/bootstrap.php';
require_once SITE_ROOT . '/includes/layout.php';

$data = load_site_data();
$home = $data['home'];
$submitted = false;
$formData = [
    'nome' => '',
    'funcao' => '',
    'data_nascimento' => '',
    'cpf' => '',
    'documento_identidade' => '',
    'data_expedicao' => '',
    'orgao_expedicao' => '',
    'estado_civil' => '',
    'email' => '',
    'pagina_web' => '',
    'nome_oficial_servico' => '',
    'nome_substituto' => '',
    'endereco_completo' => '',
    'complemento' => '',
    'bairro' => '',
    'cep' => '',
    'cidade_estado' => '',
    'telefone' => '',
    'fax' => '',
    'entrancia' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $submitted = true;

    foreach ($formData as $field => $value) {
        $formData[$field] = trim((string) ($_POST[$field] ?? ''));
    }

    if ($formData['cpf'] !== '') {
        $formData['cpf'] = format_cpf($formData['cpf']);
    }

    if ($formData['cep'] !== '') {
        $formData['cep'] = preg_replace('/^(\d{5})(\d{3})$/', '$1-$2', sanitize_cpf($formData['cep'])) ?? $formData['cep'];
    }

    if ($formData['telefone'] !== '') {
        $digits = sanitize_cpf($formData['telefone']);
        if (strlen($digits) === 11) {
            $formData['telefone'] = sprintf('(%s) %s-%s', substr($digits, 0, 2), substr($digits, 2, 5), substr($digits, 7, 4));
        }
    }

    if ($formData['fax'] !== '') {
        $digits = sanitize_cpf($formData['fax']);
        if (strlen($digits) === 10) {
            $formData['fax'] = sprintf('(%s) %s-%s', substr($digits, 0, 2), substr($digits, 2, 4), substr($digits, 6, 4));
        }
    }

    create_association_request($formData);
}

render_header('Sindi Amostra | Associe-se', $home);
?>

<main class="section">
    <div class="container signup-layout">
        <section class="panel">
            <span class="eyebrow solid">Associe-se</span>
            <h2>Ficha de inscricao</h2>
            <p>
                Agora o botao de associacao abre uma pagina propria de cadastro. O objetivo aqui e te dar
                um formulario mais institucional, no estilo de ficha, como base para evoluirmos juntos.
            </p>

            <div class="signup-notes">
                <div class="info-card">
                    <strong>Visual tipo ficha</strong>
                    <span>Cada item fica em linha propria, lembrando um formulario de secretaria ou cadastro institucional.</span>
                </div>
                <div class="info-card">
                    <strong>Proximo passo</strong>
                    <span>Depois podemos gravar essa ficha em JSON, mandar por e-mail ou salvar direto no MySQL.</span>
                </div>
            </div>
        </section>

        <section class="panel signup-panel">
            <h2>Ficha de Inscricao</h2>
            <p class="hint">Preenche os campos abaixo para simular a solicitacao de associacao.</p>

            <?php if ($submitted): ?>
                <div class="flash-success">Ficha enviada com sucesso. Agora ela fica aguardando liberacao na area administrativa.</div>
            <?php endif; ?>

            <form method="post" class="signup-form">
                <div class="signup-table">
                    <div class="signup-row">
                        <label for="nome">Nome:</label>
                        <input id="nome" name="nome" type="text" value="<?= h($formData['nome']); ?>">
                    </div>

                    <div class="signup-row">
                        <label for="funcao">Funcao:</label>
                        <input id="funcao" name="funcao" type="text" value="<?= h($formData['funcao']); ?>">
                    </div>

                    <div class="signup-row">
                        <label for="data_nascimento">Data de Nascimento:</label>
                        <input id="data_nascimento" name="data_nascimento" type="date" value="<?= h($formData['data_nascimento']); ?>">
                    </div>

                    <div class="signup-row">
                        <label for="cpf">CPF:</label>
                        <input id="cpf" name="cpf" type="text" value="<?= h($formData['cpf']); ?>">
                    </div>

                    <div class="signup-row">
                        <label for="documento_identidade">Documento de Identidade:</label>
                        <input id="documento_identidade" name="documento_identidade" type="text" value="<?= h($formData['documento_identidade']); ?>">
                    </div>

                    <div class="signup-row">
                        <label for="data_expedicao">Data de Expedicao:</label>
                        <input id="data_expedicao" name="data_expedicao" type="date" value="<?= h($formData['data_expedicao']); ?>">
                    </div>

                    <div class="signup-row">
                        <label for="orgao_expedicao">Orgao de Expedicao:</label>
                        <input id="orgao_expedicao" name="orgao_expedicao" type="text" value="<?= h($formData['orgao_expedicao']); ?>">
                    </div>

                    <div class="signup-row">
                        <label for="estado_civil">Estado Civil:</label>
                        <input id="estado_civil" name="estado_civil" type="text" value="<?= h($formData['estado_civil']); ?>">
                    </div>

                    <div class="signup-row">
                        <label for="email">E-mail:</label>
                        <input id="email" name="email" type="email" value="<?= h($formData['email']); ?>">
                    </div>

                    <div class="signup-row">
                        <label for="pagina_web">Pagina na Web:</label>
                        <input id="pagina_web" name="pagina_web" type="text" value="<?= h($formData['pagina_web']); ?>">
                    </div>

                    <div class="signup-row">
                        <label for="nome_oficial_servico">Nome Oficial do Servico:</label>
                        <input id="nome_oficial_servico" name="nome_oficial_servico" type="text" value="<?= h($formData['nome_oficial_servico']); ?>">
                    </div>

                    <div class="signup-row">
                        <label for="nome_substituto">Nome do Substituto:</label>
                        <input id="nome_substituto" name="nome_substituto" type="text" value="<?= h($formData['nome_substituto']); ?>">
                    </div>

                    <div class="signup-row signup-row--textarea">
                        <label for="endereco_completo">Endereco Completo:</label>
                        <textarea id="endereco_completo" name="endereco_completo"><?= h($formData['endereco_completo']); ?></textarea>
                    </div>

                    <div class="signup-row">
                        <label for="complemento">Complemento:</label>
                        <input id="complemento" name="complemento" type="text" value="<?= h($formData['complemento']); ?>">
                    </div>

                    <div class="signup-row">
                        <label for="bairro">Bairro:</label>
                        <input id="bairro" name="bairro" type="text" value="<?= h($formData['bairro']); ?>">
                    </div>

                    <div class="signup-row">
                        <label for="cep">CEP:</label>
                        <input id="cep" name="cep" type="text" value="<?= h($formData['cep']); ?>">
                    </div>

                    <div class="signup-row">
                        <label for="cidade_estado">Cidade/Estado:</label>
                        <input id="cidade_estado" name="cidade_estado" type="text" value="<?= h($formData['cidade_estado']); ?>">
                    </div>

                    <div class="signup-row">
                        <label for="telefone">Telefone:</label>
                        <input id="telefone" name="telefone" type="text" value="<?= h($formData['telefone']); ?>">
                    </div>

                    <div class="signup-row">
                        <label for="fax">Fax:</label>
                        <input id="fax" name="fax" type="text" value="<?= h($formData['fax']); ?>">
                    </div>

                    <div class="signup-row">
                        <label for="entrancia">Entrancia:</label>
                        <input id="entrancia" name="entrancia" type="text" value="<?= h($formData['entrancia']); ?>">
                    </div>
                </div>

                <div class="actions top-gap">
                    <button class="button button-primary" type="submit">Enviar ficha</button>
                </div>
            </form>
        </section>
    </div>
</main>

<?php render_footer(); ?>
