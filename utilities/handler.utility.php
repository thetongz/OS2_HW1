<?php
require "redirect.utility.php";

class Handler {

    private function handleEvent($status, $destinationIfSuccess, $errorMessage) {
        if($status) {
            redirect($destinationIfSuccess);
        } else {
            echo "<script>alert('{$errorMessage}')</script>";
        }
    }

    function handleAddEvent($status) {
        $destinationIfSuccess = "product";
        $errorMessage = "Adding product isn\'t complete";

        $this->handleEvent($status, $destinationIfSuccess, $errorMessage);
    }
}
?>