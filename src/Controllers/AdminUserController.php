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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * Get the view to create an user.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', User::class);

        $roles = Role::all();

        $user = null;

        return view('oxygencms::admin.users.create', compact('user', 'roles'));
    }

    /**
     * Store a new user.
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(UserRequest $request)
    {
        $this->authorize('create', User::class);

        $user_data = $request->validated();

        $user_data['password'] = bcrypt($request->password);

        $user = User::create($user_data);

        $user->syncRoles($request->roles);

        return redirect()->route('admin.user.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(User $user)
    {
        $this->authorize('update', User::class);

        $roles = Role::all();

        $user->mapMediaUrls();

        return view('oxygencms::admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User        $user
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UserRequest $request, User $user)
    {
        $this->authorize('update', User::class);

        $user->update($request->validated());

        $user->syncRoles($request->roles);

        notification("$user->model_name successfully updated.");

        return redirect()->back();
    }
}
