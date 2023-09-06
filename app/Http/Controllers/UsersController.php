<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsersRequest $request)
    {

        $data = $request->all();
        $user = User::create($data);
        $user->save();
        return ['message' => "Stored  {$data['name']} User!", 'data' => $user];
    }

    /**
     * Display the specified resource.
     */
    public function show(User $users, $id)
    {
        $user = $users->find($id);
        if (empty($user)) {
            return ['message' => "User with id: $id does not exist."];
        }
        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsersRequest $request, $id)
    {
        $exist = User::find($id);
        if (empty($exist)) {
            return ['message' => 'User does not exist'];
        }
        $data = $request->all();
        $exist->update($data);
        $new = User::find($id);
        return ['message' => 'Updated! ' . $new['name'] . ' User', 'data' => $new];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (empty($user)) {
            return ['message' => 'User does not exist'];
        }
        $name = $user['name'];
        $user->destroy($id);

        return ['message' => 'User ' . $name . ' deleted!'];
    }
}
