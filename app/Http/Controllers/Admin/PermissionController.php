<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Http\Requests\PermissionRequest;

class PermissionController extends Controller
{
    public function index()
    {
        $permission = Permission::all();
        return view('admin.permissions.index', compact('permission'));
    }


    public function add(PermissionRequest $request)
    {
        if ($request->isMethod('post')) {
            $params = $request->post();
            unset($params['_token']);


            $permission = new Permission();

            $permission->name = $request->name;
            $permission->group_name= $request->group_name;

            $permission->save();

            if ($permission->save()) {
                $notification = array(
                    "message" => "Add permission successfully",
                    "alert-type" => "success",
                );
                return redirect()->route('permission.index')->with($notification);
            }
        }

        return view('admin.permissions.add');
    }

    public function edit(PermissionRequest $request, $id)
    {
        $detail = Permission::findOrFail($id);

        if ($request->isMethod('post')) {
            $params = $request->except('_token');

            $update = Permission::where('id', $id)->update($params);

            if ($update) {
                $notification = array(
                    "message" => "Update permission successfully",
                    "alert-type" => "success",
                );
                return redirect()->route('permission.index')->with($notification);
            } else {
                $notification = array(
                    "message" => "Update permission unsuccessful",
                    "alert-type" => "error",
                );
                return redirect()->route('permission.index')->with($notification);
            }
        }

        return view('admin.permissions.edit', compact('detail'));
    }

    public function delete($id)
    {
        if ($id) {
            $permission = Permission::where('id', $id);
            $deleted = $permission->delete();
            if ($deleted) {
                $notification = array(
                    "message" => "Deleted permission successfully",
                    "alert-type" => "success",
                );
            } else {
                $notification = array(
                    "message" => "Delete permission unsuccessful",
                    "alert-type" => "error",
                );
            }
        }
        return redirect()->back()->with($notification);
    }

    public function deleted()
    {
        $permission = Permission::onlyTrashed()->get();
        return view('admin.permissions.delete', compact('permission'));
    }

    public function restore($id)
    {
        $softDeletedPermission = Permission::onlyTrashed()->find($id);

        if ($softDeletedPermission) {
            $softDeletedPermission->restore();
            $notification = array(
                "message" => "Permission restore successfully",
                "alert-type" => "success",
            );
        } else {
            $notification = array(
                "message" => "Permission restore unsuccessful",
                "alert-type" => "error",
            );
        }

        return redirect()->back()->with($notification);
    }

    public function permanentlyDelete($id)
    {
        if ($id) {
            $permission = Permission::where('id', $id);
            $deleted = $permission->forceDelete();
            if ($deleted) {
                $notification = array(
                    "message" => "Deleted permission successfully",
                    "alert-type" => "success",
                );
            } else {
                $notification = array(
                    "message" => "Delete permission unsuccessful",
                    "alert-type" => "error",
                );
            }
        }
        return redirect()->back()->with($notification);
    }

    public function changeStatus(Request $request)
    {

        $permission = Permission::find($request->permission_id);
        $permission->status = $request->status;
        $permission->save();

        return response()->json(['success' => 'Status Change Successfully']);
    }
}
