<?php
// require'db.php';
class InsuranceOfClient {
    private $clientId;
    private $insurerId;
    private $pdo;


    public function __construct($clientId, $insurerId) {
        $this->clientId = $clientId;
        $this->insurerId = $insurerId;

        // $database = Database::getInstance();
        // $this->pdo = $database::getConnection();

        
    }


    public function getClientId() {
        return $this->clientId;
    }

    public function getInsurerId() {
        return $this->insurerId;
    }


    public function setClientId($clientId) {
        return $this->clientId=$clientId;
    }

    public function setInsurerId($insurerId) {
        return $this->insurerId =$insurerId;
    }
}

?>
