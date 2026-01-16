<?php

namespace App\Repositories\Contracts;

use App\DTOs\AddressDTO;
use App\Models\Address;
use Illuminate\Database\Eloquent\Collection;

interface AddressRepositoryInterface
{
    public function all(): Collection;
    
    public function findByUserId(int $userId): Collection;
    
    public function findById(int $id): ?Address;
    
    public function create(AddressDTO $dto): Address;
    
    public function update(int $id, AddressDTO $dto): bool;
    
    public function delete(int $id): bool;
}
