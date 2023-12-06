<?php

namespace App\Core\Domain\Infrastructure\Interfaces;

use App\Core\Domain\Models\User\User;

interface UserRepositoryInterface
{
    public function persist(User $user): void;

    public function find(string $id): ?User;

    public function getAll(): ?array;

    public function getUserByEmail(string $email): ?User;

    public function updateUser(User $user): void;

    public function constructFromRows(array $rows): ?array;
}
