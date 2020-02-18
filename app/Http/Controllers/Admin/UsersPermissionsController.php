<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersPermissionsController extends Controller
{
    public function update(Request $request, User $user)
    {
        $user->permissions()->detach();

        $user->givePermissionTo($request->permission);

        return back()->withFlash('Los roles han sido actualizados');
    }
}
