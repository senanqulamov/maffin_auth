<?php
require_once __DIR__ . '/../Model.php';

class User extends Model
{
    private $table = 'users';

    /**
     * Function for finding a user by its username.
     */
    public function findByUserName($username)
    {
        $stmt = self::$database->prepare("SELECT * FROM {$this->table} WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Function for storing a new user with given credentials.
     */
    public function create(array $data)
    {
        $sql = "INSERT INTO {$this->table} 
        (username, password, created_at) 
        VALUES (?, ?, ?)";

        $stmt = self::$database->prepare($sql);

        // Hash the password
        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);

        return $stmt->execute([
            $data['username'],
            $hashedPassword,
            $data['created_at'],
        ]);
    }
}