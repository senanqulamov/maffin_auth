<?php
class Controller {

    /**
     * Function for returning view.
     */
    protected function view($path, $data = []) {
        extract($data);
        require __DIR__ . "/../views/{$path}.php";
    }

    /**
     * Function for redirection (usage for a false Auth statement).
     */
    protected function redirect($url) {
        header("Location: $url");
        exit;
    }
}