<?php

namespace Oxygencms\Users\Controllers;

use JavaScript;
use App\Models\User;
use Oxygencms\Users\Models\Role;
use Oxygencms\Core\Controllers\Controller;
use Oxygencms\Users\Contracts\Admin\UserRequestInterface as UserRequest;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('index', User::class);

        $models = User::allWithAccessors(['edit_url', 'model_name'], 'roles');

        JavaScript::put(['models' => $models]);

        return view('oxygencms::admin.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(User $user)
    {
        $this->authorize('update', User::class);

        $roles = Role::all();

        return view('oxygencms::admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User        $user
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UserRequest $request, User $user)
    {
        $this->authorize('update', User::class);

        $data = $request->validated();

        unset($data['roles']);

        $user->update($data);

        $user->syncRoles($request->roles);

        notification("$user->model_name successfully updated.");

        return redirect()->back();
    }
}
