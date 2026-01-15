<?php
require_once 'BaseModel.php';
class Client extends BaseModel
{
    
    private $id;
    private $name;
    private $email;
    private $passwordC;
    private $role;
    private $timeC;
    public function __construct(int $id = 0, string $name = "", string $email = "", string $passwordC = "", string $role = "", float $timeC = 0.0)
{
    
    $this->id = $id;
    $this->name = $name;
    $this->email = $email;
    $this->passwordC = $passwordC;
    $this->role = $role;
    $this->timeC = $timeC;
}

    public function getId(): int
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getPassword(): string
    {
        return $this->passwordC;
    }
    public function getRole(): string
    {
        return $this->role;
    }
    public function getTime(): float
    {
        return $this->timeC;
    }
    // SETTERS

    public function setName(string $name)
    {
        $this->name = $name;
    }
    public function setEmail(string $email)
    {
        $this->email = $email;
    }
    public function setPassword(string $password)
    {
        $this->passwordC = $password;
    }
    public function setRole(string $role)
    {
        $this->role = $role;
    }
    public function setTime(float $timeC)
    {
        $this->timeC = $timeC;
    }

    // PASSWORD HASHING
    public function hash()
    {
        $password_hash = password_hash($this->passwordC , PASSWORD_DEFAULT);
        $this->passwordC = $password_hash;
    }
    // CREATION A CLIENT
    public function save(): bool
    {
        $sql = "INSERT INTO client (name ,email ,password_C ,role )
        VALUES (:name , :email, :password ,:role)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':name' => $this->name,
            ':email' => $this->email,
            ':password' => $this->passwordC,
            ':role' => $this->role
        ]);

    }

    // SELECT CLIENT FROM HIS EMAIL
    public static function find($email)
    { 
        $stmt = self::$pdo->prepare("SELECT * FROM client WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function verifyP($password)
    {
        return password_verify($password, $this->passwordC);
    }
    
    public function countAll()
    {
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM client");
        return $stmt->fetchColumn();
    }

    
    public function getLast($limit = 5)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM client ORDER BY id DESC LIMIT ?");
        $stmt->execute([$limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>