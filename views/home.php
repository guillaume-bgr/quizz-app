<?php ob_start();
?> 
<div>
<h1>Lorem ipsum, dolor sit amet conse</div>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi explicabo nemo ipsum eligendi perferendis soluta, aperiam nesciunt culpa iusto laborum eveniet ratione doloribus qui neque rem. Et doloribus aut dolorem?</p>
<?php $content = ob_get_clean();
require_once ROOT.'/views/template.php';
