<?php
    http_response_code(404);
?>
<title><?php echo "Errore 404 - RegUni" ?></title>
<div class="container">
    <div class="alert alert-danger" role="alert">
        Errore 404 ― La pagina: <code><?php echo('/' . $page); ?></code> non è stata trovata.
    </div>
</div>