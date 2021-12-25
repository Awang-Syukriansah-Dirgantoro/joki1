<?php

namespace App\Policies;

use App\Models\{ Cart, User };
use Illuminate\Auth\Access\HandlesAuthorization;

class CartPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Cart $cart)
    {
        //
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, Cart $cart)
    {
        //
    }

    public function delete(User $user, Cart $cart)
    {
        //
    }

    public function restore(User $user, Cart $cart)
    {
        //
    }

    public function forceDelete(User $user, Cart $cart)
    {
        //
    }
}
