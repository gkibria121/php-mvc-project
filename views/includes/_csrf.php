<?php


[$token] =  getCurrentCSRF();
?>

<input type="hidden" name="_csrf" value="<?= $token ?>">