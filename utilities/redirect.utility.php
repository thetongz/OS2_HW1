<?php
function redirect($where) {
    header("Location: $where");
    die();
}

?>