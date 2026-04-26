<?php

declare(strict_types=1);

function database_config(): array
{
    static $config = null;

    if ($config === null) {
        $config = require SITE_ROOT . '/config/database.php';
    }

    return $config;
}

function default_site_data(): array
{
    return [
        'home' => [
            'site_name' => 'SINDI AMOSTRA',
            'subtitle' => 'Modelo institucional para portfolio e estudo',
            'hero_title' => '',
            'hero_text' => '',
            'cta_label' => 'Associe-se',
        ],
        'banners' => [
            [
                'title' => 'Portal institucional com visual moderno',
                'subtitle' => 'Espaco para destacar servicos, comunicados e a presenca institucional do sindicato.',
                'image_path' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&w=1600&q=80',
                'sort_order' => 1,
            ],
            [
                'title' => 'Area administrativa para alimentar a Home',
                'subtitle' => 'O administrador pode subir banners, documentos, noticias e controlar os acessos.',
                'image_path' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1600&q=80',
                'sort_order' => 2,
            ],
            [
                'title' => 'Associados com consulta e area restrita',
                'subtitle' => 'Fluxo simples para associacao, liberacao de acesso e publicacao de informacoes importantes.',
                'image_path' => 'https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?auto=format&fit=crop&w=1600&q=80',
                'sort_order' => 3,
            ],
        ],
        'featured_images' => [
            [
                'title' => 'Destaque 1',
                'image_path' => 'https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=900&q=80',
                'sort_order' => 1,
            ],
            [
                'title' => 'Destaque 2',
                'image_path' => 'https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&w=900&q=80',
                'sort_order' => 2,
            ],
            [
                'title' => 'Destaque 3',
                'image_path' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f?auto=format&fit=crop&w=900&q=80',
                'sort_order' => 3,
            ],
            [
                'title' => 'Destaque 4',
                'image_path' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=900&q=80',
                'sort_order' => 4,
            ],
        ],
        'gallery_images' => [
            [
                'title' => 'Galeria 1',
                'image_path' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?auto=format&fit=crop&w=900&q=80',
                'sort_order' => 1,
            ],
            [
                'title' => 'Galeria 2',
                'image_path' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=900&q=80',
                'sort_order' => 2,
            ],
            [
                'title' => 'Galeria 3',
                'image_path' => 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=900&q=80',
                'sort_order' => 3,
            ],
        ],
        'highlights' => [
            ['title' => 'Area administrativa', 'text' => 'O administrador atualiza a Home, gerencia noticias, boletos, fichas e libera o acesso do associado.'],
            ['title' => 'Associacao com aprovacao', 'text' => 'A ficha entra como pendente e so vira acesso real depois da liberacao do administrador.'],
            ['title' => 'Base organizada em MySQL', 'text' => 'Configuracoes, usuarios, noticias e boletos ficam separados em tabelas proprias.'],
        ],
        'institutional_pages' => [
            'quem-somos' => [
                'title' => 'Quem Somos',
                'content' => 'Espaco institucional para apresentar a historia, a finalidade e a representacao do sindicato.',
            ],
            'diretoria' => [
                'title' => 'Diretoria',
                'content' => 'Area para listar os membros da diretoria e suas atribuicoes.',
            ],
            'conselho-fiscal' => [
                'title' => 'Conselho Fiscal',
                'content' => 'Area para listar os membros do conselho fiscal e suas funcoes.',
            ],
        ],
        'representatives' => [
            ['section_slug' => 'diretoria', 'name' => 'Representante Exemplo', 'role' => 'Presidente', 'description' => 'Responsavel pela representacao institucional do sindicato.', 'sort_order' => 1],
            ['section_slug' => 'conselho-fiscal', 'name' => 'Representante Exemplo 2', 'role' => 'Conselheiro Fiscal', 'description' => 'Atua no acompanhamento e fiscalizacao das contas.', 'sort_order' => 1],
        ],
        'annual_documents' => [
            ['document_type' => 'convencao', 'year_label' => '2026', 'title' => 'Convencao Coletiva 2026', 'file_path' => ''],
            ['document_type' => 'emolumentos', 'year_label' => '2026', 'title' => 'Tabela de Emolumentos 2026', 'file_path' => ''],
            ['document_type' => 'informativo', 'year_label' => '2026', 'title' => 'Informativo 2026', 'file_path' => ''],
        ],
        'news' => [
            ['title' => 'Portal demonstrativo publicado', 'category' => 'Projeto', 'date' => '2026-04-24', 'excerpt' => 'Primeira versao da amostra institucional com Home, painel admin e associacao com liberacao.'],
            ['title' => 'Espaco para informativos e comunicados', 'category' => 'Comunicacao', 'date' => '2026-04-20', 'excerpt' => 'Aqui entram avisos, destaques e noticias em formato simples para alimentar a pagina inicial.'],
        ],
        'invoices' => [
            ['associate_name' => 'Associado Exemplo', 'cpf' => '00000000000', 'reference' => 'Mensalidade Abril/2026', 'due_date' => '2026-05-10', 'amount' => 189.90, 'status' => 'aberto', 'barcode' => 'Linha digitavel de exemplo para demonstracao'],
        ],
    ];
}

function database_server_dsn(): string
{
    $config = database_config();
    return sprintf('mysql:host=%s;port=%d;charset=%s', $config['host'], $config['port'], $config['charset']);
}

function database_dsn(): string
{
    $config = database_config();
    return sprintf('mysql:host=%s;port=%d;dbname=%s;charset=%s', $config['host'], $config['port'], $config['database'], $config['charset']);
}

function database_server_connection(): PDO
{
    static $pdo = null;

    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $config = database_config();
    $pdo = new PDO(
        database_server_dsn(),
        $config['username'],
        $config['password'],
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );

    return $pdo;
}

function db(): PDO
{
    static $pdo = null;

    if ($pdo instanceof PDO) {
        return $pdo;
    }

    ensure_database_schema();

    $config = database_config();
    $pdo = new PDO(
        database_dsn(),
        $config['username'],
        $config['password'],
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );

    return $pdo;
}

function ensure_database_schema(): void
{
    static $initialized = false;

    if ($initialized) {
        return;
    }

    $config = database_config();
    $server = database_server_connection();
    $server->exec(sprintf('CREATE DATABASE IF NOT EXISTS `%s` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci', $config['database']));
    $server->exec(sprintf('USE `%s`', $config['database']));

    $statements = [
        "CREATE TABLE IF NOT EXISTS site_config (id TINYINT UNSIGNED NOT NULL PRIMARY KEY, site_name VARCHAR(150) NOT NULL, subtitle VARCHAR(255) NOT NULL, hero_title VARCHAR(255) NOT NULL, hero_text TEXT NOT NULL, cta_label VARCHAR(80) NOT NULL, created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)",
        "CREATE TABLE IF NOT EXISTS site_highlights (id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, sort_order INT UNSIGNED NOT NULL DEFAULT 0, title VARCHAR(180) NOT NULL, text TEXT NOT NULL, created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)",
        "CREATE TABLE IF NOT EXISTS admins (id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, nome VARCHAR(150) NOT NULL, usuario VARCHAR(80) NOT NULL UNIQUE, email VARCHAR(190) DEFAULT NULL UNIQUE, senha_hash VARCHAR(255) NOT NULL, ativo TINYINT(1) NOT NULL DEFAULT 1, created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)",
        "CREATE TABLE IF NOT EXISTS associates (id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, request_id INT UNSIGNED DEFAULT NULL, nome VARCHAR(180) NOT NULL, cpf VARCHAR(11) NOT NULL UNIQUE, email VARCHAR(190) NOT NULL, senha_hash VARCHAR(255) NOT NULL, status ENUM('ativo','inativo') NOT NULL DEFAULT 'ativo', liberado_area_restrita TINYINT(1) NOT NULL DEFAULT 1, created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)",
        "CREATE TABLE IF NOT EXISTS association_requests (id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, nome VARCHAR(180) NOT NULL, funcao VARCHAR(150) DEFAULT NULL, data_nascimento DATE DEFAULT NULL, cpf VARCHAR(11) NOT NULL, documento_identidade VARCHAR(80) DEFAULT NULL, data_expedicao DATE DEFAULT NULL, orgao_expedicao VARCHAR(80) DEFAULT NULL, estado_civil VARCHAR(80) DEFAULT NULL, email VARCHAR(190) NOT NULL, pagina_web VARCHAR(190) DEFAULT NULL, nome_oficial_servico VARCHAR(190) DEFAULT NULL, nome_substituto VARCHAR(190) DEFAULT NULL, endereco_completo TEXT DEFAULT NULL, complemento VARCHAR(150) DEFAULT NULL, bairro VARCHAR(120) DEFAULT NULL, cep VARCHAR(8) DEFAULT NULL, cidade_estado VARCHAR(150) DEFAULT NULL, telefone VARCHAR(20) DEFAULT NULL, fax VARCHAR(20) DEFAULT NULL, entrancia VARCHAR(120) DEFAULT NULL, status ENUM('pendente','aprovado','rejeitado') NOT NULL DEFAULT 'pendente', associate_id INT UNSIGNED DEFAULT NULL, approved_by_admin_id INT UNSIGNED DEFAULT NULL, approved_at DATETIME DEFAULT NULL, created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)",
        "CREATE TABLE IF NOT EXISTS institutional_pages (slug VARCHAR(80) NOT NULL PRIMARY KEY, title VARCHAR(180) NOT NULL, content TEXT NOT NULL, updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)",
        "CREATE TABLE IF NOT EXISTS institutional_representatives (id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, section_slug VARCHAR(80) NOT NULL, name VARCHAR(180) NOT NULL, role VARCHAR(180) NOT NULL, description TEXT DEFAULT NULL, sort_order INT UNSIGNED NOT NULL DEFAULT 0, created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)",
        "CREATE TABLE IF NOT EXISTS annual_documents (id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, document_type ENUM('convencao','emolumentos','informativo') NOT NULL, year_label VARCHAR(10) NOT NULL, title VARCHAR(180) NOT NULL, file_path VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)",
        "CREATE TABLE IF NOT EXISTS home_banners (id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, title VARCHAR(180) NOT NULL, subtitle TEXT NOT NULL, image_path VARCHAR(255) NOT NULL, sort_order INT UNSIGNED NOT NULL DEFAULT 0, created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)",
        "CREATE TABLE IF NOT EXISTS featured_images (id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, title VARCHAR(180) NOT NULL, image_path VARCHAR(255) NOT NULL, sort_order INT UNSIGNED NOT NULL DEFAULT 0, created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)",
        "CREATE TABLE IF NOT EXISTS gallery_images (id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, title VARCHAR(180) NOT NULL, image_path VARCHAR(255) NOT NULL, sort_order INT UNSIGNED NOT NULL DEFAULT 0, created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)",
        "CREATE TABLE IF NOT EXISTS news (id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, title VARCHAR(180) NOT NULL, category VARCHAR(100) NOT NULL, published_date DATE NOT NULL, excerpt TEXT NOT NULL, created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)",
        "CREATE TABLE IF NOT EXISTS invoices (id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, associate_id INT UNSIGNED DEFAULT NULL, associate_name VARCHAR(180) NOT NULL, cpf VARCHAR(11) NOT NULL, reference_label VARCHAR(180) NOT NULL, due_date DATE NOT NULL, amount DECIMAL(10,2) NOT NULL, status ENUM('aberto','pago') NOT NULL DEFAULT 'aberto', barcode TEXT NOT NULL, created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)",
        "CREATE TABLE IF NOT EXISTS contact_messages (id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, nome VARCHAR(180) NOT NULL, email VARCHAR(190) NOT NULL, assunto VARCHAR(190) NOT NULL, mensagem TEXT NOT NULL, created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP)",
    ];

    foreach ($statements as $statement) {
        $server->exec($statement);
    }

    seed_database($server);
    $initialized = true;
}

function seed_database(PDO $pdo): void
{
    $defaults = default_site_data();

    if ((int) $pdo->query('SELECT COUNT(*) FROM site_config')->fetchColumn() === 0) {
        $stmt = $pdo->prepare('INSERT INTO site_config (id, site_name, subtitle, hero_title, hero_text, cta_label) VALUES (1, :site_name, :subtitle, :hero_title, :hero_text, :cta_label)');
        $stmt->execute($defaults['home']);
    }

    if ((int) $pdo->query('SELECT COUNT(*) FROM site_highlights')->fetchColumn() === 0) {
        $stmt = $pdo->prepare('INSERT INTO site_highlights (sort_order, title, text) VALUES (:sort_order, :title, :text)');
        foreach ($defaults['highlights'] as $index => $item) {
            $stmt->execute([
                'sort_order' => $index + 1,
                'title' => $item['title'],
                'text' => $item['text'],
            ]);
        }
    }

    if ((int) $pdo->query('SELECT COUNT(*) FROM home_banners')->fetchColumn() === 0) {
        $stmt = $pdo->prepare('INSERT INTO home_banners (title, subtitle, image_path, sort_order) VALUES (:title, :subtitle, :image_path, :sort_order)');
        foreach ($defaults['banners'] as $item) {
            $stmt->execute($item);
        }
    }

    if ((int) $pdo->query('SELECT COUNT(*) FROM featured_images')->fetchColumn() === 0) {
        $stmt = $pdo->prepare('INSERT INTO featured_images (title, image_path, sort_order) VALUES (:title, :image_path, :sort_order)');
        foreach ($defaults['featured_images'] as $item) {
            $stmt->execute($item);
        }
    }

    if ((int) $pdo->query('SELECT COUNT(*) FROM gallery_images')->fetchColumn() === 0) {
        $stmt = $pdo->prepare('INSERT INTO gallery_images (title, image_path, sort_order) VALUES (:title, :image_path, :sort_order)');
        foreach ($defaults['gallery_images'] as $item) {
            $stmt->execute($item);
        }
    }

    if ((int) $pdo->query('SELECT COUNT(*) FROM admins')->fetchColumn() === 0) {
        $stmt = $pdo->prepare('INSERT INTO admins (nome, usuario, email, senha_hash, ativo) VALUES (:nome, :usuario, :email, :senha_hash, 1)');
        $stmt->execute([
            'nome' => 'Administrador Principal',
            'usuario' => 'admin',
            'email' => 'admin@sindi-amostra.local',
            'senha_hash' => password_hash((string) (getenv('SINDI_DEFAULT_ADMIN_PASSWORD') ?: 'change-me'), PASSWORD_DEFAULT),
        ]);
    }

    if ((int) $pdo->query('SELECT COUNT(*) FROM institutional_pages')->fetchColumn() === 0) {
        $stmt = $pdo->prepare('INSERT INTO institutional_pages (slug, title, content) VALUES (:slug, :title, :content)');
        foreach ($defaults['institutional_pages'] as $slug => $item) {
            $stmt->execute([
                'slug' => $slug,
                'title' => $item['title'],
                'content' => $item['content'],
            ]);
        }
    }

    if ((int) $pdo->query('SELECT COUNT(*) FROM institutional_representatives')->fetchColumn() === 0) {
        $stmt = $pdo->prepare('INSERT INTO institutional_representatives (section_slug, name, role, description, sort_order) VALUES (:section_slug, :name, :role, :description, :sort_order)');
        foreach ($defaults['representatives'] as $item) {
            $stmt->execute($item);
        }
    }

    if ((int) $pdo->query('SELECT COUNT(*) FROM annual_documents')->fetchColumn() === 0) {
        $stmt = $pdo->prepare('INSERT INTO annual_documents (document_type, year_label, title, file_path) VALUES (:document_type, :year_label, :title, :file_path)');
        foreach ($defaults['annual_documents'] as $item) {
            $stmt->execute($item);
        }
    }

    if ((int) $pdo->query('SELECT COUNT(*) FROM news')->fetchColumn() === 0) {
        $stmt = $pdo->prepare('INSERT INTO news (title, category, published_date, excerpt) VALUES (:title, :category, :published_date, :excerpt)');
        foreach ($defaults['news'] as $item) {
            $stmt->execute([
                'title' => $item['title'],
                'category' => $item['category'],
                'published_date' => $item['date'],
                'excerpt' => $item['excerpt'],
            ]);
        }
    }

    if ((int) $pdo->query('SELECT COUNT(*) FROM invoices')->fetchColumn() === 0) {
        $stmt = $pdo->prepare('INSERT INTO invoices (associate_name, cpf, reference_label, due_date, amount, status, barcode) VALUES (:associate_name, :cpf, :reference_label, :due_date, :amount, :status, :barcode)');
        foreach ($defaults['invoices'] as $item) {
            $stmt->execute([
                'associate_name' => $item['associate_name'],
                'cpf' => $item['cpf'],
                'reference_label' => $item['reference'],
                'due_date' => $item['due_date'],
                'amount' => $item['amount'],
                'status' => $item['status'],
                'barcode' => $item['barcode'],
            ]);
        }
    }
}

function load_site_data(): array
{
    $pdo = db();
    $home = $pdo->query('SELECT site_name, subtitle, hero_title, hero_text, cta_label FROM site_config WHERE id = 1')->fetch() ?: default_site_data()['home'];
    $banners = $pdo->query('SELECT id, title, subtitle, image_path, sort_order FROM home_banners ORDER BY sort_order ASC, id ASC LIMIT 3')->fetchAll();
    $featuredImages = $pdo->query('SELECT id, title, image_path, sort_order FROM featured_images ORDER BY sort_order ASC, id ASC LIMIT 4')->fetchAll();
    $galleryImages = $pdo->query('SELECT id, title, image_path, sort_order FROM gallery_images ORDER BY sort_order ASC, id ASC LIMIT 3')->fetchAll();
    $highlights = $pdo->query('SELECT title, text FROM site_highlights ORDER BY sort_order ASC, id ASC')->fetchAll();
    $institutionalPages = $pdo->query('SELECT slug, title, content FROM institutional_pages ORDER BY slug ASC')->fetchAll();
    $representatives = $pdo->query('SELECT id, section_slug, name, role, description, sort_order FROM institutional_representatives ORDER BY section_slug ASC, sort_order ASC, id ASC')->fetchAll();
    $annualDocuments = $pdo->query('SELECT id, document_type, year_label, title, file_path FROM annual_documents ORDER BY year_label DESC, id DESC')->fetchAll();
    $newsRows = $pdo->query('SELECT id, title, category, published_date, excerpt FROM news ORDER BY published_date DESC, id DESC')->fetchAll();
    $invoiceRows = $pdo->query('SELECT id, associate_name, cpf, reference_label, due_date, amount, status, barcode FROM invoices ORDER BY due_date DESC, id DESC')->fetchAll();

    $news = array_map(
        static fn(array $item): array => [
            'id' => (int) $item['id'],
            'title' => $item['title'],
            'category' => $item['category'],
            'date' => $item['published_date'],
            'excerpt' => $item['excerpt'],
        ],
        $newsRows
    );

    $invoices = array_map(
        static fn(array $item): array => [
            'id' => (int) $item['id'],
            'associate_name' => $item['associate_name'],
            'cpf' => $item['cpf'],
            'reference' => $item['reference_label'],
            'due_date' => $item['due_date'],
            'amount' => (float) $item['amount'],
            'status' => $item['status'],
            'barcode' => $item['barcode'],
        ],
        $invoiceRows
    );

    return [
        'home' => $home,
        'banners' => $banners ?: default_site_data()['banners'],
        'featured_images' => $featuredImages ?: default_site_data()['featured_images'],
        'gallery_images' => $galleryImages ?: default_site_data()['gallery_images'],
        'highlights' => $highlights ?: default_site_data()['highlights'],
        'institutional_pages' => $institutionalPages,
        'representatives' => $representatives,
        'annual_documents' => $annualDocuments,
        'news' => $news,
        'invoices' => $invoices,
    ];
}

function save_site_home(array $home): void
{
    $stmt = db()->prepare('UPDATE site_config SET site_name = :site_name, subtitle = :subtitle, hero_title = :hero_title, hero_text = :hero_text, cta_label = :cta_label WHERE id = 1');
    $stmt->execute([
        'site_name' => trim((string) ($home['site_name'] ?? '')),
        'subtitle' => trim((string) ($home['subtitle'] ?? '')),
        'hero_title' => trim((string) ($home['hero_title'] ?? '')),
        'hero_text' => trim((string) ($home['hero_text'] ?? '')),
        'cta_label' => trim((string) ($home['cta_label'] ?? '')),
    ]);
}

function get_institutional_pages_map(): array
{
    $items = db()->query('SELECT slug, title, content FROM institutional_pages ORDER BY slug ASC')->fetchAll();
    $map = [];
    foreach ($items as $item) {
        $map[$item['slug']] = $item;
    }
    return $map;
}

function save_institutional_page(array $input): void
{
    $stmt = db()->prepare('UPDATE institutional_pages SET title = :title, content = :content WHERE slug = :slug');
    $stmt->execute([
        'slug' => trim((string) ($input['slug'] ?? '')),
        'title' => trim((string) ($input['title'] ?? '')),
        'content' => trim((string) ($input['content'] ?? '')),
    ]);
}

function add_representative(array $input): void
{
    $stmt = db()->prepare('INSERT INTO institutional_representatives (section_slug, name, role, description, sort_order) VALUES (:section_slug, :name, :role, :description, :sort_order)');
    $stmt->execute([
        'section_slug' => trim((string) ($input['section_slug'] ?? '')),
        'name' => trim((string) ($input['name'] ?? '')),
        'role' => trim((string) ($input['role'] ?? '')),
        'description' => trim((string) ($input['description'] ?? '')),
        'sort_order' => (int) ($input['sort_order'] ?? 0),
    ]);
}

function delete_representative(int $id): void
{
    $stmt = db()->prepare('DELETE FROM institutional_representatives WHERE id = :id');
    $stmt->execute(['id' => $id]);
}

function get_representatives_grouped(): array
{
    $items = db()->query('SELECT id, section_slug, name, role, description, sort_order FROM institutional_representatives ORDER BY section_slug ASC, sort_order ASC, id ASC')->fetchAll();
    $grouped = [];
    foreach ($items as $item) {
        $grouped[$item['section_slug']][] = $item;
    }
    return $grouped;
}

function store_uploaded_pdf(array $file, string $prefix): string
{
    if (($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
        throw new RuntimeException('Seleciona um arquivo PDF valido.');
    }

    $extension = strtolower((string) pathinfo((string) $file['name'], PATHINFO_EXTENSION));
    if ($extension !== 'pdf') {
        throw new RuntimeException('Somente arquivos PDF sao permitidos.');
    }

    $directory = UPLOADS_ROOT . '/documents';
    ensure_directory($directory);

    $baseName = preg_replace('/[^a-zA-Z0-9_-]+/', '-', $prefix . '-' . date('YmdHis'));
    $filename = trim((string) $baseName, '-') . '.pdf';
    $target = $directory . '/' . $filename;

    if (!move_uploaded_file((string) $file['tmp_name'], $target)) {
        throw new RuntimeException('Nao foi possivel salvar o PDF enviado.');
    }

    return 'uploads/documents/' . $filename;
}

function store_uploaded_image(array $file, string $prefix): string
{
    if (($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
        throw new RuntimeException('Seleciona uma imagem valida para o banner.');
    }

    $extension = strtolower((string) pathinfo((string) $file['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'webp'];

    if (!in_array($extension, $allowed, true)) {
        throw new RuntimeException('Somente imagens JPG, PNG ou WEBP sao permitidas.');
    }

    $directory = UPLOADS_ROOT . '/banners';
    ensure_directory($directory);

    $baseName = preg_replace('/[^a-zA-Z0-9_-]+/', '-', $prefix . '-' . date('YmdHis'));
    $filename = trim((string) $baseName, '-') . '.' . $extension;
    $target = $directory . '/' . $filename;

    if (!move_uploaded_file((string) $file['tmp_name'], $target)) {
        throw new RuntimeException('Nao foi possivel salvar a imagem do banner.');
    }

    return 'uploads/banners/' . $filename;
}

function add_annual_document(array $input, array $file): void
{
    $filePath = store_uploaded_pdf($file, trim((string) ($input['document_type'] ?? 'documento')));
    $stmt = db()->prepare('INSERT INTO annual_documents (document_type, year_label, title, file_path) VALUES (:document_type, :year_label, :title, :file_path)');
    $stmt->execute([
        'document_type' => trim((string) ($input['document_type'] ?? '')),
        'year_label' => trim((string) ($input['year_label'] ?? '')),
        'title' => trim((string) ($input['title'] ?? '')),
        'file_path' => $filePath,
    ]);
}

function add_home_banner(array $input, array $file): void
{
    $pdo = db();
    $total = (int) $pdo->query('SELECT COUNT(*) FROM home_banners')->fetchColumn();
    if ($total >= 3) {
        throw new RuntimeException('A Home aceita no maximo 3 banners. Exclui um antes de cadastrar outro.');
    }

    $imagePath = store_uploaded_image($file, trim((string) ($input['title'] ?? 'banner-home')));
    $stmt = $pdo->prepare('INSERT INTO home_banners (title, subtitle, image_path, sort_order) VALUES (:title, :subtitle, :image_path, :sort_order)');
    $stmt->execute([
        'title' => trim((string) ($input['title'] ?? '')),
        'subtitle' => trim((string) ($input['subtitle'] ?? '')),
        'image_path' => $imagePath,
        'sort_order' => max(1, (int) ($input['sort_order'] ?? ($total + 1))),
    ]);
}

function delete_home_banner(int $id): void
{
    $stmt = db()->prepare('SELECT image_path FROM home_banners WHERE id = :id LIMIT 1');
    $stmt->execute(['id' => $id]);
    $item = $stmt->fetch();

    if ($item && !empty($item['image_path']) && !string_starts_with((string) $item['image_path'], 'http')) {
        $absolute = SITE_ROOT . '/' . ltrim((string) $item['image_path'], '/');
        if (is_file($absolute)) {
            unlink($absolute);
        }
    }

    $deleteStmt = db()->prepare('DELETE FROM home_banners WHERE id = :id');
    $deleteStmt->execute(['id' => $id]);
}

function get_home_banners(): array
{
    return db()->query('SELECT id, title, subtitle, image_path, sort_order FROM home_banners ORDER BY sort_order ASC, id ASC LIMIT 3')->fetchAll();
}

function add_featured_image(array $input, array $file): void
{
    $pdo = db();
    $total = (int) $pdo->query('SELECT COUNT(*) FROM featured_images')->fetchColumn();
    if ($total >= 4) {
        throw new RuntimeException('Noticias em destaque aceita no maximo 4 imagens.');
    }

    $imagePath = store_uploaded_image($file, trim((string) ($input['title'] ?? 'destaque')));
    $stmt = $pdo->prepare('INSERT INTO featured_images (title, image_path, sort_order) VALUES (:title, :image_path, :sort_order)');
    $stmt->execute([
        'title' => trim((string) ($input['title'] ?? '')),
        'image_path' => $imagePath,
        'sort_order' => max(1, (int) ($input['sort_order'] ?? ($total + 1))),
    ]);
}

function delete_featured_image(int $id): void
{
    $stmt = db()->prepare('SELECT image_path FROM featured_images WHERE id = :id LIMIT 1');
    $stmt->execute(['id' => $id]);
    $item = $stmt->fetch();

    if ($item && !empty($item['image_path']) && !string_starts_with((string) $item['image_path'], 'http')) {
        $absolute = SITE_ROOT . '/' . ltrim((string) $item['image_path'], '/');
        if (is_file($absolute)) {
            unlink($absolute);
        }
    }

    $deleteStmt = db()->prepare('DELETE FROM featured_images WHERE id = :id');
    $deleteStmt->execute(['id' => $id]);
}

function get_featured_images(): array
{
    return db()->query('SELECT id, title, image_path, sort_order FROM featured_images ORDER BY sort_order ASC, id ASC LIMIT 4')->fetchAll();
}

function add_gallery_image(array $input, array $file): void
{
    $pdo = db();
    $total = (int) $pdo->query('SELECT COUNT(*) FROM gallery_images')->fetchColumn();
    if ($total >= 3) {
        throw new RuntimeException('A galeria da Home aceita no maximo 3 imagens.');
    }

    $imagePath = store_uploaded_image($file, trim((string) ($input['title'] ?? 'galeria')));
    $stmt = $pdo->prepare('INSERT INTO gallery_images (title, image_path, sort_order) VALUES (:title, :image_path, :sort_order)');
    $stmt->execute([
        'title' => trim((string) ($input['title'] ?? '')),
        'image_path' => $imagePath,
        'sort_order' => max(1, (int) ($input['sort_order'] ?? ($total + 1))),
    ]);
}

function delete_gallery_image(int $id): void
{
    $stmt = db()->prepare('SELECT image_path FROM gallery_images WHERE id = :id LIMIT 1');
    $stmt->execute(['id' => $id]);
    $item = $stmt->fetch();

    if ($item && !empty($item['image_path']) && !string_starts_with((string) $item['image_path'], 'http')) {
        $absolute = SITE_ROOT . '/' . ltrim((string) $item['image_path'], '/');
        if (is_file($absolute)) {
            unlink($absolute);
        }
    }

    $deleteStmt = db()->prepare('DELETE FROM gallery_images WHERE id = :id');
    $deleteStmt->execute(['id' => $id]);
}

function get_gallery_images(): array
{
    return db()->query('SELECT id, title, image_path, sort_order FROM gallery_images ORDER BY sort_order ASC, id ASC LIMIT 3')->fetchAll();
}

function delete_annual_document(int $id): void
{
    $stmt = db()->prepare('SELECT file_path FROM annual_documents WHERE id = :id LIMIT 1');
    $stmt->execute(['id' => $id]);
    $item = $stmt->fetch();

    if ($item && !empty($item['file_path'])) {
        $absolute = SITE_ROOT . '/' . ltrim((string) $item['file_path'], '/');
        if (is_file($absolute)) {
            unlink($absolute);
        }
    }

    $deleteStmt = db()->prepare('DELETE FROM annual_documents WHERE id = :id');
    $deleteStmt->execute(['id' => $id]);
}

function get_annual_documents_by_type(string $documentType): array
{
    $stmt = db()->prepare('SELECT id, document_type, year_label, title, file_path FROM annual_documents WHERE document_type = :document_type ORDER BY year_label DESC, id DESC');
    $stmt->execute(['document_type' => $documentType]);
    return $stmt->fetchAll();
}

function create_contact_message(array $input): void
{
    $stmt = db()->prepare(
        'INSERT INTO contact_messages (nome, email, assunto, mensagem)
         VALUES (:nome, :email, :assunto, :mensagem)'
    );

    $stmt->execute([
        'nome' => trim((string) ($input['nome'] ?? '')),
        'email' => trim((string) ($input['email'] ?? '')),
        'assunto' => trim((string) ($input['assunto'] ?? '')),
        'mensagem' => trim((string) ($input['mensagem'] ?? '')),
    ]);
}

function add_news(array $input): void
{
    $stmt = db()->prepare('INSERT INTO news (title, category, published_date, excerpt) VALUES (:title, :category, :published_date, :excerpt)');
    $stmt->execute([
        'title' => trim((string) ($input['title'] ?? '')),
        'category' => trim((string) ($input['category'] ?? '')),
        'published_date' => trim((string) ($input['date'] ?? '')),
        'excerpt' => trim((string) ($input['excerpt'] ?? '')),
    ]);
}

function delete_news(int $id): void
{
    $stmt = db()->prepare('DELETE FROM news WHERE id = :id');
    $stmt->execute(['id' => $id]);
}

function add_invoice(array $input): void
{
    $stmt = db()->prepare('INSERT INTO invoices (associate_id, associate_name, cpf, reference_label, due_date, amount, status, barcode) VALUES (:associate_id, :associate_name, :cpf, :reference_label, :due_date, :amount, :status, :barcode)');
    $stmt->execute([
        'associate_id' => !empty($input['associate_id']) ? (int) $input['associate_id'] : null,
        'associate_name' => trim((string) ($input['associate_name'] ?? '')),
        'cpf' => sanitize_cpf((string) ($input['cpf'] ?? '')),
        'reference_label' => trim((string) ($input['reference'] ?? '')),
        'due_date' => trim((string) ($input['due_date'] ?? '')),
        'amount' => (float) ($input['amount'] ?? 0),
        'status' => trim((string) ($input['status'] ?? 'aberto')),
        'barcode' => trim((string) ($input['barcode'] ?? '')),
    ]);
}

function delete_invoice(int $id): void
{
    $stmt = db()->prepare('DELETE FROM invoices WHERE id = :id');
    $stmt->execute(['id' => $id]);
}

function reset_site_data(): void
{
    $pdo = db();
    $pdo->exec('DELETE FROM home_banners');
    $pdo->exec('DELETE FROM featured_images');
    $pdo->exec('DELETE FROM gallery_images');
    $pdo->exec('DELETE FROM site_highlights');
    $pdo->exec('DELETE FROM institutional_pages');
    $pdo->exec('DELETE FROM institutional_representatives');
    $pdo->exec('DELETE FROM annual_documents');
    $pdo->exec('DELETE FROM news');
    $pdo->exec('DELETE FROM invoices');

    $defaults = default_site_data();
    save_site_home($defaults['home']);

    $bannerStmt = $pdo->prepare('INSERT INTO home_banners (title, subtitle, image_path, sort_order) VALUES (:title, :subtitle, :image_path, :sort_order)');
    foreach ($defaults['banners'] as $item) {
        $bannerStmt->execute($item);
    }

    $featuredStmt = $pdo->prepare('INSERT INTO featured_images (title, image_path, sort_order) VALUES (:title, :image_path, :sort_order)');
    foreach ($defaults['featured_images'] as $item) {
        $featuredStmt->execute($item);
    }

    $galleryStmt = $pdo->prepare('INSERT INTO gallery_images (title, image_path, sort_order) VALUES (:title, :image_path, :sort_order)');
    foreach ($defaults['gallery_images'] as $item) {
        $galleryStmt->execute($item);
    }

    $highlightStmt = $pdo->prepare('INSERT INTO site_highlights (sort_order, title, text) VALUES (:sort_order, :title, :text)');
    foreach ($defaults['highlights'] as $index => $item) {
        $highlightStmt->execute([
            'sort_order' => $index + 1,
            'title' => $item['title'],
            'text' => $item['text'],
        ]);
    }

    $pageStmt = $pdo->prepare('INSERT INTO institutional_pages (slug, title, content) VALUES (:slug, :title, :content)');
    foreach ($defaults['institutional_pages'] as $slug => $item) {
        $pageStmt->execute([
            'slug' => $slug,
            'title' => $item['title'],
            'content' => $item['content'],
        ]);
    }

    $representativeStmt = $pdo->prepare('INSERT INTO institutional_representatives (section_slug, name, role, description, sort_order) VALUES (:section_slug, :name, :role, :description, :sort_order)');
    foreach ($defaults['representatives'] as $item) {
        $representativeStmt->execute($item);
    }

    $documentStmt = $pdo->prepare('INSERT INTO annual_documents (document_type, year_label, title, file_path) VALUES (:document_type, :year_label, :title, :file_path)');
    foreach ($defaults['annual_documents'] as $item) {
        $documentStmt->execute($item);
    }

    foreach ($defaults['news'] as $item) {
        add_news($item);
    }

    foreach ($defaults['invoices'] as $item) {
        add_invoice($item);
    }
}

function authenticate_admin(string $username, string $password): ?array
{
    $login = trim($username);
    $stmt = db()->prepare('SELECT * FROM admins WHERE ativo = 1 AND (usuario = :login OR email = :login) LIMIT 1');
    $stmt->execute(['login' => $login]);
    $admin = $stmt->fetch();

    if (!$admin) {
        return null;
    }

    return password_verify($password, $admin['senha_hash']) ? $admin : null;
}

function create_admin(array $input): void
{
    $stmt = db()->prepare('INSERT INTO admins (nome, usuario, email, senha_hash, ativo) VALUES (:nome, :usuario, :email, :senha_hash, 1)');
    $stmt->execute([
        'nome' => trim((string) ($input['nome'] ?? '')),
        'usuario' => trim((string) ($input['usuario'] ?? '')),
        'email' => trim((string) ($input['email'] ?? '')),
        'senha_hash' => password_hash((string) ($input['senha'] ?? ''), PASSWORD_DEFAULT),
    ]);
}

function get_admin_by_id(int $adminId): ?array
{
    $stmt = db()->prepare('SELECT id, nome, usuario, email, ativo FROM admins WHERE id = :id LIMIT 1');
    $stmt->execute(['id' => $adminId]);
    $admin = $stmt->fetch();

    return $admin ?: null;
}

function update_admin(array $input): void
{
    $adminId = (int) ($input['admin_id'] ?? 0);
    $existing = get_admin_by_id($adminId);

    if ($existing === null) {
        throw new RuntimeException('Administrador nao encontrado.');
    }

    $password = trim((string) ($input['senha'] ?? ''));

    if ($password === '') {
        $stmt = db()->prepare('UPDATE admins SET nome = :nome, usuario = :usuario, email = :email WHERE id = :id');
        $stmt->execute([
            'id' => $adminId,
            'nome' => trim((string) ($input['nome'] ?? '')),
            'usuario' => trim((string) ($input['usuario'] ?? '')),
            'email' => trim((string) ($input['email'] ?? '')),
        ]);

        return;
    }

    $stmt = db()->prepare('UPDATE admins SET nome = :nome, usuario = :usuario, email = :email, senha_hash = :senha_hash WHERE id = :id');
    $stmt->execute([
        'id' => $adminId,
        'nome' => trim((string) ($input['nome'] ?? '')),
        'usuario' => trim((string) ($input['usuario'] ?? '')),
        'email' => trim((string) ($input['email'] ?? '')),
        'senha_hash' => password_hash($password, PASSWORD_DEFAULT),
    ]);
}

function delete_admin(int $adminId, int $currentAdminId): void
{
    if ($adminId === $currentAdminId) {
        throw new RuntimeException('Nao e permitido excluir o administrador que esta logado.');
    }

    $stmt = db()->prepare('DELETE FROM admins WHERE id = :id');
    $stmt->execute(['id' => $adminId]);
}

function create_associate(array $input): void
{
    $stmt = db()->prepare('INSERT INTO associates (request_id, nome, cpf, email, senha_hash, status, liberado_area_restrita) VALUES (NULL, :nome, :cpf, :email, :senha_hash, "ativo", 1)');
    $stmt->execute([
        'nome' => trim((string) ($input['nome'] ?? '')),
        'cpf' => sanitize_cpf((string) ($input['cpf'] ?? '')),
        'email' => trim((string) ($input['email'] ?? '')),
        'senha_hash' => password_hash((string) ($input['senha'] ?? ''), PASSWORD_DEFAULT),
    ]);
}

function update_associate(array $input): void
{
    $associateId = (int) ($input['associate_id'] ?? 0);
    $existing = get_associate_by_id($associateId);

    if ($existing === null) {
        throw new RuntimeException('Associado nao encontrado.');
    }

    $password = trim((string) ($input['senha'] ?? ''));

    if ($password === '') {
        $stmt = db()->prepare('UPDATE associates SET nome = :nome, cpf = :cpf, email = :email, status = "ativo", liberado_area_restrita = 1 WHERE id = :id');
        $stmt->execute([
            'id' => $associateId,
            'nome' => trim((string) ($input['nome'] ?? '')),
            'cpf' => sanitize_cpf((string) ($input['cpf'] ?? '')),
            'email' => trim((string) ($input['email'] ?? '')),
        ]);

        return;
    }

    $stmt = db()->prepare('UPDATE associates SET nome = :nome, cpf = :cpf, email = :email, senha_hash = :senha_hash, status = "ativo", liberado_area_restrita = 1 WHERE id = :id');
    $stmt->execute([
        'id' => $associateId,
        'nome' => trim((string) ($input['nome'] ?? '')),
        'cpf' => sanitize_cpf((string) ($input['cpf'] ?? '')),
        'email' => trim((string) ($input['email'] ?? '')),
        'senha_hash' => password_hash($password, PASSWORD_DEFAULT),
    ]);
}

function delete_associate(int $associateId): void
{
    $stmt = db()->prepare('DELETE FROM associates WHERE id = :id');
    $stmt->execute(['id' => $associateId]);
}

function get_admins(): array
{
    return db()->query('SELECT id, nome, usuario, email, ativo, created_at FROM admins ORDER BY id DESC')->fetchAll();
}

function get_associates(): array
{
    return db()->query('SELECT id, nome, cpf, email, status, liberado_area_restrita, created_at FROM associates ORDER BY id DESC')->fetchAll();
}

function create_association_request(array $input): void
{
    $stmt = db()->prepare(
        'INSERT INTO association_requests (
            nome, funcao, data_nascimento, cpf, documento_identidade, data_expedicao, orgao_expedicao,
            estado_civil, email, pagina_web, nome_oficial_servico, nome_substituto, endereco_completo,
            complemento, bairro, cep, cidade_estado, telefone, fax, entrancia, status
        ) VALUES (
            :nome, :funcao, :data_nascimento, :cpf, :documento_identidade, :data_expedicao, :orgao_expedicao,
            :estado_civil, :email, :pagina_web, :nome_oficial_servico, :nome_substituto, :endereco_completo,
            :complemento, :bairro, :cep, :cidade_estado, :telefone, :fax, :entrancia, "pendente"
        )'
    );

    $stmt->execute([
        'nome' => trim((string) ($input['nome'] ?? '')),
        'funcao' => trim((string) ($input['funcao'] ?? '')),
        'data_nascimento' => trim((string) ($input['data_nascimento'] ?? '')) ?: null,
        'cpf' => sanitize_cpf((string) ($input['cpf'] ?? '')),
        'documento_identidade' => trim((string) ($input['documento_identidade'] ?? '')),
        'data_expedicao' => trim((string) ($input['data_expedicao'] ?? '')) ?: null,
        'orgao_expedicao' => trim((string) ($input['orgao_expedicao'] ?? '')),
        'estado_civil' => trim((string) ($input['estado_civil'] ?? '')),
        'email' => trim((string) ($input['email'] ?? '')),
        'pagina_web' => trim((string) ($input['pagina_web'] ?? '')),
        'nome_oficial_servico' => trim((string) ($input['nome_oficial_servico'] ?? '')),
        'nome_substituto' => trim((string) ($input['nome_substituto'] ?? '')),
        'endereco_completo' => trim((string) ($input['endereco_completo'] ?? '')),
        'complemento' => trim((string) ($input['complemento'] ?? '')),
        'bairro' => trim((string) ($input['bairro'] ?? '')),
        'cep' => sanitize_cpf((string) ($input['cep'] ?? '')),
        'cidade_estado' => trim((string) ($input['cidade_estado'] ?? '')),
        'telefone' => sanitize_cpf((string) ($input['telefone'] ?? '')),
        'fax' => sanitize_cpf((string) ($input['fax'] ?? '')),
        'entrancia' => trim((string) ($input['entrancia'] ?? '')),
    ]);
}

function get_association_requests(): array
{
    return db()->query(
        'SELECT ar.*, a.nome AS associate_nome, ad.nome AS admin_nome
         FROM association_requests ar
         LEFT JOIN associates a ON a.id = ar.associate_id
         LEFT JOIN admins ad ON ad.id = ar.approved_by_admin_id
         ORDER BY ar.created_at DESC, ar.id DESC'
    )->fetchAll();
}

function approve_association_request(int $requestId, string $password, int $adminId): void
{
    $pdo = db();
    $stmt = $pdo->prepare('SELECT * FROM association_requests WHERE id = :id LIMIT 1');
    $stmt->execute(['id' => $requestId]);
    $request = $stmt->fetch();

    if (!$request) {
        throw new RuntimeException('Ficha de associacao nao encontrada.');
    }

    $associateStmt = $pdo->prepare('SELECT id FROM associates WHERE cpf = :cpf LIMIT 1');
    $associateStmt->execute(['cpf' => $request['cpf']]);
    $existing = $associateStmt->fetch();

    if ($existing) {
        $associateId = (int) $existing['id'];
        $updateStmt = $pdo->prepare('UPDATE associates SET nome = :nome, email = :email, senha_hash = :senha_hash, status = "ativo", liberado_area_restrita = 1, updated_at = CURRENT_TIMESTAMP WHERE id = :id');
        $updateStmt->execute([
            'nome' => $request['nome'],
            'email' => $request['email'],
            'senha_hash' => password_hash($password, PASSWORD_DEFAULT),
            'id' => $associateId,
        ]);
    } else {
        $insertStmt = $pdo->prepare('INSERT INTO associates (request_id, nome, cpf, email, senha_hash, status, liberado_area_restrita) VALUES (:request_id, :nome, :cpf, :email, :senha_hash, "ativo", 1)');
        $insertStmt->execute([
            'request_id' => $requestId,
            'nome' => $request['nome'],
            'cpf' => $request['cpf'],
            'email' => $request['email'],
            'senha_hash' => password_hash($password, PASSWORD_DEFAULT),
        ]);
        $associateId = (int) $pdo->lastInsertId();
    }

    $approvalStmt = $pdo->prepare('UPDATE association_requests SET status = "aprovado", associate_id = :associate_id, approved_by_admin_id = :admin_id, approved_at = NOW(), updated_at = CURRENT_TIMESTAMP WHERE id = :id');
    $approvalStmt->execute([
        'associate_id' => $associateId,
        'admin_id' => $adminId,
        'id' => $requestId,
    ]);
}

function reject_association_request(int $requestId): void
{
    $stmt = db()->prepare('UPDATE association_requests SET status = "rejeitado", updated_at = CURRENT_TIMESTAMP WHERE id = :id');
    $stmt->execute(['id' => $requestId]);
}

function authenticate_associate(string $login, string $password): ?array
{
    $cpf = sanitize_cpf($login);
    $stmt = db()->prepare(
        'SELECT * FROM associates
         WHERE liberado_area_restrita = 1
           AND status = "ativo"
           AND (cpf = :cpf OR email = :email)
         LIMIT 1'
    );
    $stmt->execute([
        'cpf' => $cpf,
        'email' => trim($login),
    ]);
    $associate = $stmt->fetch();

    if (!$associate) {
        return null;
    }

    return password_verify($password, $associate['senha_hash']) ? $associate : null;
}

function get_associate_by_id(int $associateId): ?array
{
    $stmt = db()->prepare('SELECT * FROM associates WHERE id = :id LIMIT 1');
    $stmt->execute(['id' => $associateId]);
    $associate = $stmt->fetch();
    return $associate ?: null;
}

function get_associate_open_invoices(int $associateId, string $cpf): array
{
    $stmt = db()->prepare(
        'SELECT * FROM invoices
         WHERE status = "aberto"
           AND (associate_id = :associate_id OR cpf = :cpf)
         ORDER BY due_date DESC, id DESC'
    );
    $stmt->execute([
        'associate_id' => $associateId,
        'cpf' => $cpf,
    ]);

    return $stmt->fetchAll();
}
