<?php
require_once 'models/Status.php';

class StatusController {
    private $statusModel;

    public function __construct($pdo) {
        $this->statusModel = new Status($pdo);
    }

    public function listarJSON() {
        header('Content-Type: application/json');
        $status = $this->statusModel->getAll();
        echo json_encode($status);
    }
}
