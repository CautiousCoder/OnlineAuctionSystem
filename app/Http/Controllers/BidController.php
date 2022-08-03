<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BidController extends Controller
{
    //
    public function bidnow(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'username' => 'required|unique:users,username',
            'phone' => 'nullable|max:15|min:8',
            'password' => 'required|min:6|max:15',
            'cpassword' => 'required|same:password',
        ], [
            'cpassword.required' => 'The Confirm Password field is required.',
            'username.unique' => 'Already Exists. Please try again.',
            'username.required' => 'The Username field is required.',
            'cpassword.same' => 'The Confirm Password and Password must match.'
        ]);
    }
    public function bid(Request $request, $slug)
    {
        //dd($request->all());
        $user = User::find(Auth::guard('web')->user()->id);
        $userbit = Bid::where('user_id', Auth::guard('web')->user()->id)->first();
        $product = Post::with('categories', 'tags', 'user')->where(['slug' => $slug])->first();

        $ptotal_balance = $product->regular_prize;
        $total_balance = $user->balance->total_bal;

        $this->validate($request, [
            'regular_prize' => 'required|numeric|min:10',
        ], [
            'regular_prize.required' => 'This feild must be required',
            'regular_prize.min' => 'A minimum Deposit of 10 is required.',
        ]);

        if (!$userbit) {
            $newbid = new Bid();
            $newbid->user_id = Auth::guard('web')->user()->id;
            $newbid->bid_id = 'BidID-' . rand(00001, 99999);
            $newbid->bit_status = $total_balance;
            $newbid->post_id = $product->id;

            $product->sale_prize = $ptotal_balance;
            $product->regular_prize = $ptotal_balance + $request->regular_prize;

            $user->balance->old_bal = $total_balance;
            $user->balance->total_bal = $total_balance - $request->regular_prize;
            $newbid->save();
            $product->save();
            $user->balance->save();
        } else {
            $userbit->bit_status = $total_balance;
            $userbit->post_id = $product->id;

            $product->sale_prize = $ptotal_balance;
            $product->regular_prize = $ptotal_balance + $request->regular_prize;

            $user->balance->old_bal = $total_balance;
            $user->balance->total_bal = $total_balance - $request->regular_prize;
            $userbit->save();
            $product->save();
            $user->balance->save();
        }
        return redirect()->back();
    }
}
