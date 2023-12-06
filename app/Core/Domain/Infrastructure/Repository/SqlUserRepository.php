<?php

namespace App\Core\Domain\Infrastructure\Repository;

use App\Core\Domain\Infrastructure\Interfaces\UserRepositoryInterface;
use App\Core\Domain\Models\Email;
use App\Core\Domain\Models\User\User;
use App\Core\Domain\Models\User\UserId;
use Illuminate\Support\Facades\DB;
use Exception;

class SqlUserRepository implements UserRepositoryInterface
{
    public function persist(User $user): void
    {
        DB::table('users')->upsert([
          'id' => $user->getId()->toString(),
          'name' => $user->getName(),
          'email' => $user->getEmail()->toString(),
          'image_url' => $user->getImageUrl(),
          'password' => $user->getHashPassword(),
        ], 'id');
    }

    /**
     * @throws Exception
     */
    public function find(string $id): ?User
    {
        $row = DB::table('users')->where('id', $id)->first();
        if ($row === null) {
            return null;
        }

        return $this->constructFromRows([$row])[0];
    }

    /**
     * @throws Exception
     */
    public function getAll(): ?array
    {
        $rows = DB::table('users')->get();
        if ($rows === null) {
            return null;
        }

        return $this->constructFromRows($rows->all());
    }

    /**
     * @throws Exception
     */
    public function getUserByEmail(string $email): ?User
    {
        $row = DB::table('users')->where('email', $email)->first();
        if ($row === null) {
            return null;
        }

        return $this->constructFromRows([$row])[0];
    }

    /**
     * @throws Exception
     */
    public function updateUser(User $user): void
    {
        DB::table('users')->where('id', $user->getId()->toString())->update([
          'name' => $user->getName(),
          'email' => $user->getEmail(),
          'image_url' => $user->getImageUrl(),
          'password' => $user->getHashPassword(),
        ]);
    }

    /**
     * @throws Exception
     */
    public function constructFromRows(array $rows): ?array
    {
        $users = [];
        foreach ($rows as $row) {
            $users[] = new User(
                new UserId($row->id),
                $row->name,
                new Email($row->email),
                $row->image_url,
                $row->password
            );
        }

        return $users;
    }
}
