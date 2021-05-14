<?php ob_start();
?>
<div>
</div>
<?php $content = ob_get_clean();
require_once ROOT.'/views/template.php';
