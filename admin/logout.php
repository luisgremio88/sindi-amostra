<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/includes/bootstrap.php';

logout_user();

redirect_to('area-restrita.php');
