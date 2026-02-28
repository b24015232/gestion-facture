<?php
namespace App\Core;

use PDO;
use PDOException;

/**
 * Classe qui gère la connexion unique à la base de données
 */
class Database extends PDO {
    private static $instance = null;

    private function __construct() {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";

        try {
            parent::__construct($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (PDOException $e) {
            // En cas d'erreur de connexion, on arrête tout proprement
            die("Erreur de connexion SQL : " . $e->getMessage());
        }
    }

    /**
     * Méthode statique pour récupérer l'unique instance
     */
    public static function getInstance(): self {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}