<?php
namespace App\Model;
require_once 'Database.php';

class Reservation extends Database
{
    private ?int $id;
    private int $client_id;
    private int $vehicule_id;
    private string $date_debut;
    private string $date_fin;
    private string $lieu_prise;
    private string $statut;
    private ?string $created_at;

    public function __construct(
        int $client_id,
        int $vehicule_id,
        string $date_debut,
        string $date_fin,
        string $lieu_prise,
        ?int $id = null
    ) {
        parent::__construct();
        $this->id = $id;
        $this->client_id = $client_id;
        $this->vehicule_id = $vehicule_id;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->lieu_prise = $lieu_prise;
        $this->statut = 'confirmée';
        $this->created_at = null;
    }



    public function getId()
    {
        return $this->id;
    }
    public function getClientId()
    {
        return $this->client_id;
    }
    public function getVehiculeId()
    {
        return $this->vehicule_id;
    }
    public function getDateDebut()
    {
        return $this->date_debut;
    }
    public function getDateFin()
    {
        return $this->date_fin;
    }
    public function getStatut()
    {
        return $this->statut;
    }



    public function setStatut(string $statut)
    {
        $this->statut = $statut;
    }


    public function isVehiculeDisponible(): bool
    {
        $sql = "
            SELECT COUNT(*) 
            FROM reservation
            WHERE vehicule_id = :vehicule_id
              AND statut = 'confirmée'
              AND (
                :date_debut <= date_fin
                AND :date_fin >= date_debut
              )
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'vehicule_id' => $this->vehicule_id,
            'date_debut' => $this->date_debut,
            'date_fin' => $this->date_fin
        ]);

        return $stmt->fetchColumn() == 0;
    }


    public function create(): bool
    {
        if (!$this->isVehiculeDisponible()) {
            return false;
        }

        $sql = "
            INSERT INTO reservation 
            (client_id, vehicule_id, date_debut, date_fin, lieu_prise)
            VALUES (:client_id, :vehicule_id, :date_debut, :date_fin, :lieu_prise)
        ";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'client_id' => $this->client_id,
            'vehicule_id' => $this->vehicule_id,
            'date_debut' => $this->date_debut,
            'date_fin' => $this->date_fin,
            'lieu_prise' => $this->lieu_prise
        ]);
    }


    public function cancel(): bool
    {
        $sql = "UPDATE reservation SET statut = 'annulée' WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$this->id]);
    }


    public function getByClient(int $client_id): array
    {
        $sql = "
            SELECT r.*, v.modele, v.prix
            FROM reservation r
            JOIN vehicule v ON r.vehicule_id = v.id_v
            WHERE r.client_id = ?
            ORDER BY r.created_at DESC
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$client_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getAll(): array
    {
        $sql = "
            SELECT r.*, c.name AS client_name, v.modele
            FROM reservation r
            JOIN client c ON r.client_id = c.id
            JOIN vehicule v ON r.vehicule_id = v.id_v
            ORDER BY r.created_at DESC
        ";

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countAll()
    {
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM reservation");
        return $stmt->fetchColumn();
    }


    public function getRecent($limit = 5)
    {
        $sql = "SELECT r.*, c.name, v.modele
            FROM reservation r
            JOIN client c ON r.client_id = c.id
            JOIN vehicule v ON r.vehicule_id = v.id_v
            ORDER BY r.created_at DESC
            LIMIT ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
