<?php

namespace App\Http\Controllers\Web\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\AccountRequest;
use App\Http\Requests\Account\EditAccountRequest;
use App\Http\Requests\Account\EditChangePassRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Order\OrderRepository;
use App\Repositories\User\UserRepository;
use App\Slug\Slug;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{

    protected $orderRepository;
    protected $categoryRepository;
    protected $userRepository;

    public function __construct(
        OrderRepository $orderRepository,
        CategoryRepository $categoryRepository,
        UserRepository $userRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->categoryRepository = $categoryRepository;
        $this->userRepository = $userRepository;
    }

    public function login()
    {
        $categories = $this->categoryRepository->all();
        
        return view('FrontEnd.account.login', ['categories' => $categories]);
    }

    public function checkLogin(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 2,
        ];

        $remember = $request->remember;
        if (Auth::attempt($credentials, $remember)) {
            return redirect('/');
        } else {
            return back()->with("alert", "Email or mật khẩu bị nhập sai");
        }
    }

    public function logout()
    {
        Auth::logout();

        return back();
    }

    public function register()
    {
        $categories = $this->categoryRepository->all();

        return view('FrontEnd.account.register', ['categories' => $categories]);
    }

    public function postRegister(AccountRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = 2;  
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('account/login')->with('noti', 'Đăng ký thành công ! Vui lòng đăng nhập');
    }

    public function myOrderIndex()
    {
        $categories = $this->categoryRepository->all();
        $user_id = Auth::id();
        $orders = $this->orderRepository->getOrdersByUserId($user_id);

        return view('FrontEnd.account.my-order.index', ['categories' => $categories, 'orders' => $orders]);
    }
    public function myOrderShow($id)
    {
        $categories = $this->categoryRepository->all();
        $order = $this->orderRepository->getOrderById($id);

        return view('FrontEnd.account.my-order.show', ['categories' => $categories, 'order' => $order]);
    }

    public function myOrderCancel(Request $request)
    {
        $id = $request->id;
        $order = $this->orderRepository->find($id);
        $order->status = Constant::order_status_Cancel;
        $order->save();
        dd($order->orderDetails);
    }

    public function profile()
    {
        $user = $this->userRepository->find(Auth::id());
        $categories = $this->categoryRepository->all();

        return view('FrontEnd.account.profile.index', ['user' => $user, 'categories' => $categories]);
    }

    public function editProfile(EditAccountRequest $request)
    {
        $user = $this->userRepository->find(Auth::id());

        $slug = Slug::getSlug($request->name);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile("image")) {
            $file = $request->image;

            $fileExtension = $file->getClientOriginalExtension();

            $filename = $slug . "." . $fileExtension;

            $file->move("admin/assets/images/user", $filename);
            $user->avatar = $filename;
        }

        $user->save();

        return redirect("/account/profile")->with("alert", "Đã sửa thành công");
    }

    public function changePass()
    {
        $user = $this->userRepository->find(Auth::id());
        $categories = $this->categoryRepository->all();

        return view('FrontEnd.account.changepass.index', ['user' => $user, 'categories' => $categories]);
    }

    public function editchangePass(EditChangePassRequest $request)
    {
        $user = $this->userRepository->find(Auth::id());
        if (!Hash::check($request->get('password'), $user->password)) {
            return back()->with('alert', 'ERROR: Bạn nhập sai mật khẩu cũ');
        }
        if ($request->get('new_password') != $request->get('cf_password')) {
            return back()->with('alert', 'ERROR: Xác nhận mật khẩu không khớp');
        }

        $newPassword = bcrypt($request->get('new_password'));
        $user->password = $newPassword;
        $user->save();
        $categories = $this->categoryRepository->all();

        return view('FrontEnd.account.changepass.index', ['user' => $user, 'categories' => $categories]);
    }
}
