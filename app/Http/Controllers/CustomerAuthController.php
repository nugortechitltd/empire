<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CustomerAuth;
use App\Models\OrderProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class CustomerAuthController extends Controller
{
    //customer_auth_register
    function customer_auth_register(Request $request) {
        if($request->customer_password_reg == $request->customer_password_reg_confirmation) {
            CustomerAuth::create([
                'name' => $request->customer_name_reg,
                'email' => $request->customer_email_reg,
                'password' => bcrypt($request->customer_password_reg),
                'created_at' => Carbon::now(),
            ]);
            return back()->withSuccess('Customer register successfully now please login.');
        } else {
            return back()->withError('Cutomer password credentials do not matched.');
        }
        
    }

    // customer_auth_login
    function customer_auth_login(Request $request) {
        if(Auth::guard('customerauth')->attempt(['email' => $request->customer_email_signin, 'password' => $request->customer_password_signin])) {
            return back()->withSuccess('Customer logged in successfully');
        } else {
            return back()->withError('Please create an account');
        }
    }

    // customer_auth_logout
    function customer_auth_logout() {
        Auth::guard('customerauth')->logout();
        return back()->withSuccess('Customer successfully logout');
    }

    // customer_profile
    function customer_profile() {
        $categories = Category::all();
        $orders = OrderProduct::where('customer_id', Auth::guard('customerauth')->id())->get();
        // $totalrevenue = Order::where('status', 4)->sum('total');
        return view('frontend.customer_dashboard.customer_dashboard', [
            'categories' => $categories,
            'orders' => $orders,
        ]);
    }

    // customer profile update
    function customer_profile_update(Request $request) {
        // if($request->password == null) {
        //     if($request->image == null) {
        //         Customerauth::find(Auth::guard('customerauth')->id())->update([
        //             'name' => $request->name,
        //             'email' => $request->email,
        //             'country' => $request->country,
        //             'address' => $request->address,
        //         ]);
        //         return back()->withSuccess('Updated successfully without password or image.');
        //     } else {
        //         if(Auth::guard('customerauth')->user()->image != null) {
        //             $delete_from = public_path('uploads/customer/'.Auth::guard('customerauth')->user()->image);
        //             unlink($delete_from);
        //         }
        //         $uploaded_image = $request->image;
        //         $ext = $uploaded_image->getClientOriginalExtension();
        //         $file_name = Auth::guard('customerauth')->id().'.'.$ext;
        //         Image::make($uploaded_image)->resize(300, 200)->save(public_path('uploads/customer/'.$file_name));
        //         Customerauth::find(Auth::guard('customerauth')->id())->update([
        //             'name' => $request->name,
        //             'email' => $request->email,
        //             'country' => $request->country,
        //             'address' => $request->address,
        //             'image' => $file_name,
        //         ]);
        //         return back()->withSuccess('Updated successfully without password.');
        //     }
        // } else {
        //    if($request->password == $request->password_confirmation) {
        //     if($request->image == null) {
        //         Customerauth::find(Auth::guard('customerauth')->id())->update([
        //             'name' => $request->name,
        //             'email' => $request->email,
        //             'country' => $request->country,
        //             'address' => $request->address,
        //             'password' => bcrypt($request->password),
        //         ]);
        //         return back()->withSuccess('Updated successfully without image');
        //     } else {
        //         if(Auth::guard('customerauth')->user()->image != null) {
        //             $delete_from = public_path('uploads/customer/'.Auth::guard('customerauth')->user()->image);
        //             unlink($delete_from);
        //         }
        //         $uploaded_image = $request->image;
        //         $ext = $uploaded_image->getClientOriginalExtension();
        //         $file_name = Auth::guard('customerauth')->id().'.'.$ext;
        //         Image::make($uploaded_image)->resize(300, 200)->save(public_path('uploads/customer/'.$file_name));
        //         Customerauth::find(Auth::guard('customerauth')->id())->update([
        //             'name' => $request->name,
        //             'email' => $request->email,
        //             'country' => $request->country,
        //             'address' => $request->address,
        //             'image' => $file_name,
        //             'password' => bcrypt($request->password),
        //         ]);
        //         return back()->withSuccess('Updated successfully.');
        //     }
        //    } else {
        //     return back()->withError('Passwords do not matched');
        //    }
        // }
        if($request->password != null) {
            if($request->password == $request->password_confirmation) {
                CustomerAuth::find(Auth::guard('customerauth')->id())->update([
                    'password' => bcrypt($request->password),
                    'updated_at' => Carbon::now(),
                ]);
                return back()->withSuccess('Profile updated successfully.');
            } else {
                return back()->withError('Passwords do not matched.');
            }
        }
        if($request->image != null) {
            if(Auth::guard('customerauth')->user()->image != null) {
                $delete_from = public_path('uploads/customer/'.Auth::guard('customerauth')->user()->image);
                unlink($delete_from);
            }
            $uploaded_image = $request->image;
            $ext = $uploaded_image->getClientOriginalExtension();
            $file_name = Auth::guard('customerauth')->id().'.'.$ext;
            Image::make($uploaded_image)->save(public_path('uploads/customer/'.$file_name));
            CustomerAuth::find(Auth::guard('customerauth')->id())->update([
                'image' => $file_name,
                'updated_at' => Carbon::now(),
            ]);
            return back()->withSuccess('Profile updated successfully.');
        }

        CustomerAuth::find(Auth::guard('customerauth')->id())->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'updated_at' => Carbon::now(),
        ]);

        return back()->withSuccess('Profile updated successfully.');


    }
}
