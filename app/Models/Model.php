<?php
namespace App\Models;

use App\Core\Database;

abstract class Model {
    protected $db;

    // Indicateur pour savoir si le soft delete est utilisé
    protected $useSoftDelete = false;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAll(string $table) {
        $sql = "SELECT * FROM " . $table;
        
        if ($this->useSoftDelete) {
            $sql .= " WHERE deleted_at IS NULL";
        }
        
        return $this->db->query($sql)->fetchAll();
    }

    public function getById(string $table, string $primaryKey, int $id) {
        $sql = "SELECT * FROM " . $table . " WHERE " . $primaryKey . " = :id";
        
        if ($this->useSoftDelete) {
            $sql .= " AND deleted_at IS NULL";
        }

        $query = $this->db->prepare($sql);
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    public function create(string $table, array $data) {
        // array_keys($data) va "arracher" les étiquettes et les mettre dans une liste simple :
        // implode prend les éléments d'un tableau et les colle les uns aux autres pour en faire un seul bloc de texte. 
        $colonnes = implode(', ', array_keys($data));
        $marqueurs = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO " . $table . " (" . $colonnes . ") VALUES (" . $marqueurs . ")";
        $query = $this->db->prepare($sql);
        return $query->execute($data);
    }

    public function update(string $table, string $primaryKey, int $id, array $data) {
        $champs = [];
        foreach ($data as $colonne => $valeur) {
            $champs[] = $colonne . " = :" . $colonne;
        }
        $listeChamps = implode(', ', $champs);

        $sql = "UPDATE " . $table . " SET " . $listeChamps . " WHERE " . $primaryKey . " = :id";
        $query = $this->db->prepare($sql);
        $data['id'] = $id;

        return $query->execute($data);
    }

    public function delete(string $table, string $primaryKey, int $id) {
        if ($this->useSoftDelete) {
            // Mode "Soft" : On met juste à jour la date
            $sql = "UPDATE " . $table . " SET deleted_at = NOW() WHERE " . $primaryKey . " = :id";
        } else {
            // Mode "Hard" : On supprime vraiment la ligne de la base !
            $sql = "DELETE FROM " . $table . " WHERE " . $primaryKey . " = :id";
        }
        
        $query = $this->db->prepare($sql);
        return $query->execute(['id' => $id]);
    }
}