<?php

declare(strict_types=1);

namespace PortfolioSamples;

use PDO;

final class CustomerRepository
{
    public function __construct(private readonly PDO $database)
    {
    }

    /**
     * @return list<array{id: int, name: string, email: ?string, phone: ?string}>
     */
    public function search(string $query = ''): array
    {
        $normalizedQuery = trim($query);

        if ($normalizedQuery === '') {
            $statement = $this->database->query(
                'SELECT id, name, email, phone FROM customers ORDER BY name'
            );
        } else {
            $statement = $this->database->prepare(
                'SELECT id, name, email, phone
                 FROM customers
                 WHERE name LIKE :query OR email LIKE :query OR phone LIKE :query
                 ORDER BY name'
            );
            $statement->execute(['query' => '%' . $normalizedQuery . '%']);
        }

        return array_map(
            static fn (array $row): array => [
                'id' => (int) $row['id'],
                'name' => (string) $row['name'],
                'email' => $row['email'] !== null ? (string) $row['email'] : null,
                'phone' => $row['phone'] !== null ? (string) $row['phone'] : null,
            ],
            $statement->fetchAll(PDO::FETCH_ASSOC)
        );
    }

    public function create(string $name, ?string $email, ?string $phone): int
    {
        $statement = $this->database->prepare(
            'INSERT INTO customers (name, email, phone) VALUES (:name, :email, :phone)'
        );
        $statement->execute([
            'name' => trim($name),
            'email' => $email !== null ? trim($email) : null,
            'phone' => $phone !== null ? trim($phone) : null,
        ]);

        return (int) $this->database->lastInsertId();
    }
}
