<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function index()
    {
        $coupon = Coupon::all();
        return view('admin.coupons.index', compact('coupon'));
    }


    public function add(CouponRequest $request)
    {
        if ($request->isMethod('post')) {
            $params = $request->post();
            unset($params['_token']);


            $coupon = new Coupon();

            $coupon->name = $request->name;
            $coupon->type = $request->type;
            $coupon->discount = $request->discount;
            $coupon->start_date = $request->start_date;
            $coupon->end_date = $request->end_date;

            $coupon->save();

            if ($coupon->save()) {
                $notification = array(
                    "message" => "Add coupon successfully",
                    "alert-type" => "success",
                );
                return redirect()->route('coupon.index')->with($notification);
            }
        }

        return view('admin.coupons.add');
    }

    public function edit(CouponRequest $request, $id)
    {
        $detail = Coupon::findOrFail($id);

        if ($request->isMethod('post')) {
            $params = $request->except('_token');

            $update = Coupon::where('id', $id)->update($params);

            if ($update) {
                $notification = array(
                    "message" => "Update coupon successfully",
                    "alert-type" => "success",
                );
                return redirect()->route('coupon.index')->with($notification);
            } else {
                $notification = array(
                    "message" => "Update coupon unsuccessful",
                    "alert-type" => "error",
                );
                return redirect()->route('coupon.index')->with($notification);
            }
        }

        return view('admin.coupons.edit', compact('detail'));
    }

    public function delete($id)
    {
        if ($id) {
            $coupon = Coupon::where('id', $id);
            $deleted = $coupon->delete();
            if ($deleted) {
                $notification = array(
                    "message" => "Deleted coupon successfully",
                    "alert-type" => "success",
                );
            } else {
                $notification = array(
                    "message" => "Delete coupon unsuccessful",
                    "alert-type" => "error",
                );
            }
        }
        return redirect()->back()->with($notification);
    }

    public function active($id)
    {
        $activeCoupon = Coupon::findOrFail($id);
        $activeCoupon->update([
            'status' => 'inactive'
        ]);

        $notification = array(
            "message" => "Coupon Inactive",
            "alert-type" => "success",
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id)
    {
        $inactiveCoupon = Coupon::findOrFail($id);
        $inactiveCoupon->update([
            'status' => 'active'
        ]);

        $notification = array(
            "message" => "Coupon Active",
            "alert-type" => "success",
        );
        return redirect()->back()->with($notification);
    }

    public function deleted()
    {
        $coupon = Coupon::onlyTrashed()->get();
        return view('admin.coupons.delete', compact('coupon'));
    }

    public function restore($id)
    {
        $softDeletedCoupon = Coupon::onlyTrashed()->find($id);

        if ($softDeletedCoupon) {
            $softDeletedCoupon->restore();
            $notification = array(
                "message" => "Coupon restore successfully",
                "alert-type" => "success",
            );
        } else {
            $notification = array(
                "message" => "Coupon restore unsuccessful",
                "alert-type" => "error",
            );
        }

        return redirect()->back()->with($notification);
    }

    public function permanentlyDelete($id)
    {
        if ($id) {
            $coupon = Coupon::where('id', $id);
            $deleted = $coupon->forceDelete();
            if ($deleted) {
                $notification = array(
                    "message" => "Deleted coupon successfully",
                    "alert-type" => "success",
                );
            } else {
                $notification = array(
                    "message" => "Delete coupon unsuccessful",
                    "alert-type" => "error",
                );
            }
        }
        return redirect()->back()->with($notification);
    }
}
