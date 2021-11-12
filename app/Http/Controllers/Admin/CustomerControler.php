<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Customer\WelcomeMail;
use App\Models\Customer;
use App\Notifications\Welcome;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Cart;
use Exception;

class CustomerControler extends Controller
{
    public function __construct()
    {
        $this->middleware('customer.middleware', [
            'except' => [
                'register_form',
                'register',
                'login',
                'logout',
            ]
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('Customer Dahsboard');
    }


    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function register_form()
    {
        return view('frontend.customer.register');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return array
     */
    public function register(Request $request)
    {
        $request->validate([
            "name"     => 'required',
            "email"    => 'required|unique:customers',
            "mobile"   => 'required|unique:customers',
            "password" => 'required'
        ]);
        try {
            $customer = Customer::create([
                "name"     => $request->name,
                "email"    => $request->email,
                "mobile"   => $request->mobile,
                "password" => bcrypt($request->password)
            ]);
            set_message('success', '', 'Customer has been created.');

            $token = randomString(35);
            $customer->update([
                'email_verified_token' => $token,
            ]);
            // $customer->notify(new Welcome($customer));
             Mail::to($customer->email)->send(new WelcomeMail($customer));
            set_message('success', '', 'You have sent an email to ' . $customer->email);
        } catch (Exception $e) {
            set_message('success', $e->getMessage());
        }
        return redirect()->route('register');
    }

    /**
     * @param $token
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify($token)
    {
        if ($token) {
            $customer = Customer::where('email_verified_token', $token)->first();
            if ($customer) {
                $customer->update([
                    'email_verified'       => 1,
                    'email_verified_at'    => Carbon::now(),
                    'email_verified_token' => null,
                ]);
                set_message('success', '', 'Customer verified successfully.');
            }
        }
        return redirect()->route('register');
    }

    /**
     * @param Request $request
     * @return array
     */
    public function login(Request $request)
    {
        $request->validate([
            "username" => 'required',
            "password" => 'required'
        ]);
        try {
            $customer = Customer::where('email', $request->username)->orWhere('mobile', $request->username)->first();
            if ($customer) {
                if (password_verify($request->password, $customer->password)) {
                    if ($customer->email_verified == 1) {
                        session()->put([
                            'customer_id'   => $customer->id,
                            'customer_name' => $customer->name,
                        ]);

                        if (!Cart::isEmpty()) {
                            return redirect()->route('checkout');
                        } else {
                            return redirect()->route('customer.dashboard');
                        }
                    } else {
                        set_message('danger', '', 'Your account is not active.');
                    }
                } else {
                    set_message('danger', '', 'These credentials do not match our records.');
                }
            } else {
                set_message('danger', '', 'These credentials do not match our records.');
            }
        } catch (Exception $e) {
            set_message('danger', $e->getMessage());
        }
        return redirect()->route('register');
    }


    public function logout()
    {
        session()->forget('customer_id');
        return redirect()->route('register');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
