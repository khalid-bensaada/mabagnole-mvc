<?php
namespace App\Model;

require_once 'Database.php';
class Categorie extends Database
{

    private int $id;
    private string $nom;
    private string $description;



    public function __construct(int $id, string $nom = '', string $description)
    {
        parent::__construct();
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }




    public function create()
    {
        $sql = "INSERT INTO categorie (name_c, description)
                VALUES (:nom, :description)";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':nom' => $this->nom,
            ':description' => $this->description
        ]);
    }


    public function update()
    {
        $sql = "UPDATE categorie 
                SET name_c = :nom, description = :description
                WHERE id_c = :id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':nom' => $this->nom,
            ':description' => $this->description,
            ':id' => $this->id
        ]);
    }


    public function delete()
    {
        $sql = "DELETE FROM categorie WHERE id_c = :id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':id' => $this->id
        ]);
    }


    public function getAll()
    {
        $sql = "SELECT * FROM categorie ORDER BY name_c ASC";
        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getById(int $id)
    {
        $sql = "SELECT * FROM categorie WHERE id_c = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function countVehiculesByCategorie()
    {
        $sql = "
            SELECT c.name_c AS categorie, COUNT(v.id_v) AS total
            FROM categorie c
            LEFT JOIN vehicule v ON v.catecorie_id = c.id_c
            GROUP BY c.id_c
        ";
        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
