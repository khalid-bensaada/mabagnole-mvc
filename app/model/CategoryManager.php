<?php

class CategoryManager
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllWithVehicules(): array
    {
        $sql = "
            SELECT
                c.id_c       AS categorie_id,
                c.name_c     AS categorie_name,
                c.description AS categorie_description,

                v.id_v       AS vehicule_id,
                v.modele     AS vehicule_modele,
                v.prix       AS vehicule_prix,
                v.disponibilite
            FROM categorie c
            LEFT JOIN vehicule v ON v.categorie_id = c.id_c
            ORDER BY c.id_c
        ";

        $stmt = $this->pdo->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $categories = [];

        foreach ($rows as $row) {
            $catId = $row['categorie_id'];


            if (!isset($categories[$catId])) {
                $categories[$catId] = [
                    'id_c' => $catId,
                    'name_c' => $row['categorie_name'],
                    'description' => $row['categorie_description'],
                    'vehicules' => []
                ];
            }


            if ($row['vehicule_id'] !== null) {
                $categories[$catId]['vehicules'][] = [
                    'id_v' => $row['vehicule_id'],
                    'modele' => $row['vehicule_modele'],
                    'prix' => $row['vehicule_prix'],
                    'disponibilite' => $row['disponibilite']
                ];
            }
        }


        return array_values($categories);
    }
}
