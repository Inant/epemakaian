<?php

namespace App\Repository\User;

use Hash;
use App\Entity\User\User;

class UserRepository
{
    /**
     * Get all users.
     *
     * @return Collection
     */
    public function all()
    {
        return User::get();
    }

    /**
     * Find user by id.
     *
     * @param int|string
     * @return User
     */
    public function find($id)
    {
        return User::findOrFail($id);
    }

    /**
     * Create user.
     *
     * @param array $attributes
     * @return User
     */
    public function create(array $attributes)
    {
        return User::create([
            'name' => $attributes['nama'],
            'username' => $attributes['username'],
            'email' => $attributes['email'],
            'password' => Hash::make($attributes['password']),
            'role' => $attributes['hak_akses']
        ]);
    }

    /**
     * Edit user.
     *
     * @param int|string $id
     * @param array $attributes
     * @return User
     */
    public function update($id, array $attributes)
    {
        $user = User::findOrFail($id);
        $user->update([
            'name' => $attributes['nama'],
            'username' => $attributes['username'],
            'email' => $attributes['email'],
            'role' => $attributes['hak_akses']
        ]);

        if (isset($attributes['password'])) {
            if ($attributes['password']) {
                $user->update(['password' => Hash::make($attributes['password'])]);
            }
        }

        return $user;
    }

    /**
     * Delete user.
     *
     * @param int|string $id
     * @return User
     */
    public function delete($id)
    {
        return User::findOrFail($id)->delete();
    }
}