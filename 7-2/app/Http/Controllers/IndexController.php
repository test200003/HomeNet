<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use App\Models\Contract;

use App\Models\Admin;
use Illuminate\Auth\EloquentUserProvider;

use App\Http\Requests\LoginFormRequest;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use DateTime;

use Illuminate\Validation\Rules\Password;
use LDAP\Result;

class IndexController extends Controller
{


    public function top(Request $request)
    {
        $request->session()->flush();
        return view('main/top');
    }

    public function signup(Request $request)
    {
        $session['username'] = $request->session()->get('username', '');
        $session['mail'] = $request->session()->get('mail', '');
        $session['password'] = $request->session()->get('password', '');

        return view('main/signup', compact('session'));
    }

    public function signup_confirm(Request $request)
    {
        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = $request->input('password');

        $request->validate([
            'username' => 'required | max:10',
            'mail' => 'required | email',
            'password' =>
            ['required', Password::min(8)->numbers()],
        ]);

        $request->session()->put('username', $request->username);
        $request->session()->put('mail', $request->mail);
        $request->session()->put('password', $request->password);


        return view('/main/signup_confirm', $request);
    }

    public function signup_complete(Request $request)
    {
        $username = $request->session()->get('username');
        $mail = $request->session()->get('mail');
        $password = $request->session()->get('password');


        $insert = new Customer();

        $insert->create([
            'username' => $username,
            'mail' => $mail,
            'password' => Hash::make($password),

        ]);
        return view('/main/signup_complete', $request);
    }

    /**
     * 認証を処理する
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */

    public function login1(Request $request)
    {
        $request->session()->put('mail', $request->mail);
        $request->session()->put('password', $request->password);

        $session['mail'] = $request->session()->get('mail', '');
        $session['password'] = $request->session()->get('password', '');

        return view('main/login1', compact('request'));
    }
    public function admin_login(Request $request)
    {
        $request->session()->put('mail', $request->mail);
        $request->session()->put('password', $request->password);

        return view('main/admin_login');
    }

    public function login2(Request $request)
    {
        $mail = $request->input('mail');
        $password = $request->input('password');


        //dd($mail, $password);
        if (Auth::guard('customer')->attempt(['mail' => $mail, 'password' => $password])) {

            return view('main/login2', $request);
        }

        $err = 'メールアドレスまたはパスワードが間違っています。';

        return view('main/login1', ['err' => $err],);
    }



    public function admin_login2(Request $request)
    {
        $mail = $request->input('mail');
        $password = $request->input('password');

        if (Auth::guard('admin')->attempt(['mail' => $mail, 'password' => $password])) {
            return view('main/admin_login2', $request);
        }
        $err = 'メールアドレスまたはパスワードが間違っています。';
        return view('main/admin_login', ['err' => $err]);
    }

    public function main(Request $request)
    {
        // $products = Product::all();
        // $sorts = Product::sortable()->orderBy('id', 'desc')->get();
        //dd($sorts);

        $select = $request->sort;
        switch ($select) {
            case '1':
                $products =
                    Product::where('del_flg', '0')->get();
                break;
            case '2':
                $products = Product::orderBy('speed', 'desc')->where('del_flg', '0')->get();
                break;
            case '3':
                $products = Product::orderBy('cost', 'asc')->where('del_flg', '0')->get();
                break;
            case '4':
                $products =
                    Product::orderBy('apart_price', 'asc')->where('del_flg', '0')->get();
                break;

            default:
                // デフォルトはID順
                $products = Product::where('del_flg', '0')->get();
                break;
        }
        // dd($products);

        $customer = Auth::guard('customer')->user();
        //dd($customer);
        return view('/main/main', compact('products', 'select', 'customer'));
    }

    public function admin_main(Request $request)
    {
        $products = Product::all();
        //dd($del_flg);
        // dd($products);

        $customer = Auth::guard('customer')->user();
        //dd($customer);
        return view('/main/admin_main', compact('products', 'customer'));
    }


    public function detail(Request $request)
    {
        $products = Product::find($request->Id);
        //dd($request->Id);
        $customer = Auth::guard('customer')->user();

        return view('/main/detail', ["products" => $products, 'customer' => $customer]);
    }

    public function contracts(Request $request)
    {
        $customer = Auth::guard('customer')->user();

        return view('main/contracts', ['customer' => $customer]);
    }

    public function con_confirm(Request $request)
    {
        $name = $request->input('name');
        $tel = $request->input('tel');
        $post = $request->input('post');
        $address = $request->input('address');
        $type = $request->input('type');

        $request->session()->put('name', $request->name);
        $request->session()->put('tel', $request->tel);
        $request->session()->put('post', $request->post);
        $request->session()->put('address', $request->address);
        $request->session()->put('type', $request->type);

        $request->validate([
            'name' => 'required | max:10',
            'tel' => 'required | numeric | digits_between:8,11',
            'post' => 'required | integer | digits:7',
            'address' => 'required | max:255',
            'type' => 'required',


        ]);

        $customer = Auth::guard('customer')->user();


        return view('/main/con_confirm', $request, ['customer' => $customer]);
    }

    public function con_complete(Request $request)
    {

        $name = (string) $request->session()->get('name');
        $tel = $request->session()->get('tel');
        $post = $request->session()->get('post');
        $address = $request->session()->get('address');
        $type = $request->session()->get('type');

        $inserts = new Contract();

        $inserts->create([
            'name' => $name,
            'tel' => $tel,
            'post' => $post,
            'address' => $address,
            'type' => $type,

        ]);

        $customer = Auth::guard('customer')->user();


        return view('/main/con_complete', $request, ['customer' => $customer]);
    }

    public function admin_top(Request $request)
    {
        $customer = Customer::all();
        return view('/main/admin_top', compact('customer'));
    }

    public function update(Request $request)
    {
        $customer = Auth::guard('customer')->user();

        return view('/main/update', ['customer' => $customer]);
    }

    public function update_com(Request $request)
    {

        $customer = Auth::guard('customer')->user();
        //   $customer->username = $request->username;
        // $customer->main = $request->mail;
        //$customer->password = $request->password;
        //$customer->save();


        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = $request->input('password');

        $request->validate([
            'username' => 'required | max:10',
            'mail' => 'required | email',
            'password' =>
            ['required', Password::min(8)->numbers()],
        ]);

        $customer->update([
            'username' => $username,
            'mail' => $mail,
            'password' => Hash::make($password),

        ]);
        return view('/main/update_com', ['customer' => $customer]);
    }

    public function delete(Request $request)
    {
        $customer = Auth::guard('customer')->user();
        $customer->delete();

        return view('/main/top', ['customer' => $customer]);
    }

    public function admin_delete(Request $request)
    {
        $delete = Product::find($request->Id);
        //  dd($request->Id);

        $delete->update([
            'del_flg' => 1
        ]);
        $products = Product::all();

        return view('/main/admin_main', ['delete' => $delete, 'products' => $products]);
    }

    public function admin_display(Request $request)
    {
        $delete = Product::find($request->Id);
        //  dd($request->Id);

        $delete->update([
            'del_flg' => 0
        ]);
        $products = Product::all();

        return view('/main/admin_main', ['delete' => $delete, 'products' => $products]);
    }

    public function password_reset(Request $request)
    {


        return view('/main/password_reset');
    }


    public function reset_com(Request $request)
    {
        $mail = $request->input('mail');
        $password = $request->input('password');


        if (isset(Customer::where('mail', $mail)->first()->mail)) {
            $user = Customer::where('mail', $mail)->first()->mail;
            $id = Auth::loginUsingId($mail);


            $request->validate([
                'password' =>
                ['required', Password::min(8)->numbers()],
            ]);
            $customer = Customer::where('mail', $mail);
            $customer->update([
                'password' => Hash::make($password),
            ]);
            // dd($customer);
            return view('/main/reset_com', ['request' => $request, 'customer' => $customer]);
        }
        $err = 'メールアドレスが間違っています。';
        return view('main/password_reset', ['err' => $err]);
    }
}
