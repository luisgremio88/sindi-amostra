<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/includes/bootstrap.php';

unset($_SESSION['associate_id']);

redirect_to('associado/login.php');
