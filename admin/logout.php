<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/includes/bootstrap.php';

unset($_SESSION['admin_id']);

redirect_to('area-restrita.php');
