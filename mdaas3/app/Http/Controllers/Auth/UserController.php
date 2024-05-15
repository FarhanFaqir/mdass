<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use App\Models\Location;

class UserController extends Controller
{
    function index(Request $req) {
        $data = User::get();
        return view('admin/user/index',['data' => $data]);
    }
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $req)
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        event(new Registered($user));

        if ($user) {
            Alert::success('Congrats', 'User created successfully. Thanks');
            return redirect('/admin/users');
        } else {
            Alert::error('Error', 'Something wrong. Please retry');
            return redirect()->back();
        }
    }

    function update(Request $request){
        $request->validate([
            'fullname' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        $user = User::where('id', $request->id)->update([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if ($user) {
            $user = User::find($request->id);
            Alert::success('Congrats', 'User updated successfully. Thanks');
            return redirect('/admin/users');
        } else {
            Alert::error('Error', 'Something wrong. Please retry');
            return redirect()->back();
        }
    }

    function delete(Request $req) {

        DB::table("users")->where('id',$req->id)->delete();
        
        Alert::success('Congrats', 'Data deleted successfully. Thanks');
        return redirect()->back();   
    }
}
