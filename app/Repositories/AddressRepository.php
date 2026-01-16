<?php

namespace App\Repositories;

use App\DTOs\AddressDTO;
use App\Models\Address;
use App\Repositories\Contracts\AddressRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class AddressRepository implements AddressRepositoryInterface
{
    public function __construct(private Address $model) {}

    /**
     * Get all addresses
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * Get addresses by user ID
     */
    public function findByUserId(int $userId): Collection
    {
        return $this->model->where('user_id', $userId)->get();
    }

    /**
     * Get address by ID
     */
    public function findById(int $id): ?Address
    {
        return $this->model->find($id);
    }

    /**
     * Create a new address
     */
    public function create(AddressDTO $dto): Address
    {
        return $this->model->create([
            'user_id' => $dto->user_id,
            'street' => $dto->street,
            'number' => $dto->number,
            'district' => $dto->district,
            'cep' => $dto->cep,
            'complement' => $dto->complement,
        ]);
    }

    /**
     * Update an address
     */
    public function update(int $id, AddressDTO $dto): bool
    {
        $address = $this->findById($id);
        if (!$address) {
            return false;
        }

        return $address->update([
            'street' => $dto->street,
            'number' => $dto->number,
            'district' => $dto->district,
            'cep' => $dto->cep,
            'complement' => $dto->complement,
        ]);
    }

    /**
     * Delete an address
     */
    public function delete(int $id): bool
    {
        $address = $this->findById($id);
        if (!$address) {
            return false;
        }

        return (bool) $address->delete();
    }
}
