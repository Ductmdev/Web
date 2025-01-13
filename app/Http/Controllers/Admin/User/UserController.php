<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AddUserRequest;
use App\Http\Requests\User\EditUserRequest;
use App\Services\User\IUserService;
use App\Slug\Slug;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $perPage = 5; 
        $currentPage = request()->query('page', 1); 

        $search = $request->has('search') ? $request->input('search') : null;
        $userData = $this->userService->getUsersWithPagination($search, $perPage, $currentPage);

        return view('Admin.user.index', [
            "users" => $userData['users'],
            "startResult" => $userData['startResult'],
            "endResult" => $userData['endResult'],
            "totalResults" => $userData['totalResults'],
        ]);
    }

    public function create()
    {
        return view('Admin.user.user-create');
    }

    public function store(AddUserRequest $request)
    {
        $slug = Slug::getSlug($request->name);
        $file = $request->image;

        if ($file) {
            $fileExtension = $file->getClientOriginalExtension();
            $filename = $slug . "." . $fileExtension;
            $file->move("admin/assets/images/user", $filename);
        }

        $userData = $request->only([
            'name', 'email', 'level', 'password', 'description', 'company_name', 'country', 
            'street_address', 'postcode_zip', 'town_city', 'phone'
        ]);
        $userData['password'] = bcrypt($request->password);
        $userData['avatar'] = isset($filename) ? $filename : null;

        $this->userService->storeUser($userData);

        return redirect("/quantri/user")->with("alert", "Đã thêm thành công");
    }

    public function show(Request $request)
    {
        $user = $this->userService->getUserById($request->id);
        return view('Admin.user.user-show', ['user' => $user]);
    }

    public function edit(Request $request)
    {
        $user = $this->userService->getUserById($request->id);
        return view('Admin.user.user-edit', ["user" => $user]);
    }

    public function update(EditUserRequest $request)
    {
        $slug = Slug::getSlug($request->name);
        $user = $this->userService->getUserById($request->id);

        $userData = $request->only([
            'name', 'email', 'level', 'description', 'company_name', 'country', 'street_address',
            'postcode_zip', 'town_city', 'phone'
        ]);
        $userData['password'] = bcrypt($request->password);

        if ($request->hasFile("image")) {
            $file = $request->image;
            $fileExtension = $file->getClientOriginalExtension();
            $filename = $slug . "." . $fileExtension;
            $file->move("admin/assets/images/user", $filename);
            $userData['avatar'] = $filename;
        }

        $this->userService->updateUser($request->id, $userData);

        return redirect("/quantri/user")->with("alert", "Đã sửa thành công");
    }

    public function destroy(Request $request)
    {
        $this->userService->deleteUser($request->id);
        return redirect("/quantri/user")->with("alert", "Đã xóa thành công");
    }
}
