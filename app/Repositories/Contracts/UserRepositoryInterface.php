<?php

namespace App\Repositories\Contracts;

use App\DTOs\UserDTO;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    public function all(): Collection;
    
    public function paginate(int $perPage = 15): LengthAwarePaginator;
    
    public function findById(int $id): ?User;
    
    public function findByEmail(string $email): ?User;
    
    public function findByCpf(string $cpf): ?User;
    
    public function create(UserDTO $dto): User;
    
    public function update(int $id, UserDTO $dto): bool;
    
    public function delete(int $id): bool;
    
    public function restore(int $id): bool;
}
