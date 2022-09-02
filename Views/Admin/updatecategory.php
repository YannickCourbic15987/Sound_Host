<?php ob_start(); ?>

<?php $content = ob_get_clean();
require_once ROOT . "/Views/Admin/dashboard.php"; ?>