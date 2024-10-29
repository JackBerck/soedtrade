<?php

namespace JackBerck\SoedTrade\Repository;

use JackBerck\SoedTrade\Domain\User;

class UserRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(User $user): User
    {
        $statement = $this->connection->prepare("INSERT INTO users(username, email, password, profile_image, phone_number, address) VALUES (?, ?, ?, ?, ?, ?)");
        $statement->execute([
            $user->username,
            $user->email,
            $user->password,
            $user->profile_image,
            $user->phone_number,
            $user->address
        ]);
        return $user;
    }

    public function update(User $user): User
    {
        $statement = $this->connection->prepare("UPDATE users SET username = ?, email = ?, password = ?, profile_image = ?, phone_number = ?, address = ? WHERE user_id = ?");
        $statement->execute([
            $user->username,
            $user->email,
            $user->password,
            $user->profile_image,
            $user->phone_number,
            $user->address,
        ]);
        return $user;
    }

    public function findById(string $user_id): ?User
    {
        $statement = $this->connection->prepare("SELECT user_id, username, password FROM users WHERE user_id = ?");
        $statement->execute([$user_id]);

        try {
            if ($row = $statement->fetch()) {
                $user = new User();
                $user->user_id = $row['user_id'];
                $user->username = $row['username'];
                $user->password = $row['password'];
                return $user;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function findByEmail(string $email): ?User {
        $statement = $this->connection->prepare("SELECT user_id, username, password FROM users WHERE email = ?");
        $statement->execute([$email]);
        try {
            if ($row = $statement->fetch()) {
                $user = new User();
                $user->user_id = $row['user_id'];
                $user->username = $row['username'];
                $user->password = $row['password'];
                return $user;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }


    public function deleteAll(): void
    {
        $this->connection->exec("DELETE from users");
    }
}
