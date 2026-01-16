<?php

namespace App\Repositories;

use App\DTOs\UserDTO;
use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(private User $model) {}

    /**
     * Get all users
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * Get paginated users
     */
    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return $this->model->paginate($perPage);
    }

    /**
     * Get user by ID
     */
    public function findById(int $id): ?User
    {
        return $this->model->find($id);
    }

    /**
     * Get user by email
     */
    public function findByEmail(string $email): ?User
    {
        return $this->model->where('email', $email)->first();
    }

    /**
     * Get user by CPF
     */
    public function findByCpf(string $cpf): ?User
    {
        return $this->model->where('cpf', $cpf)->first();
    }

    /**
     * Create a new user
     */
    public function create(UserDTO $dto): User
    {
        return $this->model->create([
            'name' => $dto->name,
            'email' => $dto->email,
            'phone' => $dto->phone,
            'cpf' => $dto->cpf,
            'password' => bcrypt($dto->password),
        ]);
    }

    /**
     * Update a user
     */
    public function update(int $id, UserDTO $dto): bool
    {
        $user = $this->findById($id);
        if (!$user) {
            return false;
        }

        return $user->update([
            'name' => $dto->name,
            'email' => $dto->email,
            'phone' => $dto->phone,
            'cpf' => $dto->cpf,
        ]);
    }

    /**
     * Delete a user (soft delete)
     */
    public function delete(int $id): bool
    {
        $user = $this->findById($id);
        if (!$user) {
            return false;
        }

        return (bool) $user->delete();
    }

    /**
     * Restore a soft deleted user
     */
    public function restore(int $id): bool
    {
        $user = $this->model->withTrashed()->find($id);
        if (!$user) {
            return false;
        }

        return (bool) $user->restore();
    }
}
