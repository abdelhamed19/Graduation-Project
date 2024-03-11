<?php

namespace App\Http\Controllers\Doctor;

use App\Helpers\BaseResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctor=Auth::guard("doctors")->user();
        $coupon=$doctor->coupons;
        if ($coupon->isEmpty())
        {
            return BaseResponse::MakeResponse(null, false, ["errorMessage" => "No Coupons yet"]);
        }
        return BaseResponse::MakeResponse(["coupons"=>$coupon], true, ["successMessage" => "Coupon Created successfully"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CouponRequest $request)
    {
        $validated=$request->validated();
        $doctor=Auth::guard("doctors")->user();
        if ( $doctor->subscription->coupon_remaining == 0)
        {
            return BaseResponse::MakeResponse(null, false, ["errorMessage" => "Coupons exhausted"]);
        }
        $coupon =$doctor->coupons()->create($validated);
        $doctor->subscription()->decrement("coupon_remaining",1);
        return BaseResponse::MakeResponse(["coupon"=>$coupon], true, ["successMessage" => "Coupon Created successfully"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return BaseResponse::MakeResponse(null, true, ["successMessage" => "Coupon Deleted successfully"]);
    }
}
