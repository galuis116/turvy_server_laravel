<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdmin;
use Spatie\Permission\Models\Role;

class SubAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:subadmin-list|subadmin-create|subadmin-edit|subadmin-delete', ['only' => ['adminList']]);
        $this->middleware('permission:subadmin-create', ['only' => ['addAdmin','storeAdmin']]);
        $this->middleware('permission:subadmin-edit', ['only' => ['editAdmin','updateAdmin', 'approveAdmin']]);
        $this->middleware('permission:subadmin-delete', ['only' => ['deleteAdmin']]);

        $this->middleware('permission:superadmin-list|superadmin-create|superadmin-edit|superadmin-delete', ['only' => ['adminList']]);
        $this->middleware('permission:superadmin-create', ['only' => ['addAdmin','storeAdmin']]);
        $this->middleware('permission:superadmin-edit', ['only' => ['editAdmin','updateAdmin', 'approveAdmin']]);
        $this->middleware('permission:superadmin-delete', ['only' => ['deleteAdmin']]);
    }
    public function adminList()
    {
        $admins = Admin::all()->reject(function ($user, $key) {
            return !$user->hasRole('admin');
        });
        return view('admin.admin.index')
            ->with('admins', $admins)
            ->with('page', 'user')
            ->with('subpage', 'admin');
    }
    public function addAdmin()
    {
        $roles = Role::orderBy('id','DESC')->get();
        return view('admin.admin.add')
            ->with('page', 'user')
            ->with('roles', $roles)
            ->with('subpage', 'admin');
    }
    public function storeAdmin(StoreAdmin $request)
    {
        $request->validated();
        $admin = new Admin();
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->email = $request->email;
        $admin->mobile = $request->mobile;
        $admin->password = bcrypt($request->password);
        if($request->hasFile('avatar'))
            $admin->avatar = upload_file($request->file('avatar'), 'user/admin');
        $admin->save();
        $admin->assignRole([$request->role]);
        return redirect()->back()->with('message', 'It has been saved successfully.');
    }
    public function editAdmin($id)
    {
        $admin = Admin::find($id);
        $roles = Role::orderBy('id','DESC')->get();
        return view('admin.admin.add')
            ->with('admin', $admin)
            ->with('page', 'user')
            ->with('roles', $roles)
            ->with('subpage', 'admin');
    }
    public function updateAdmin(StoreAdmin $request, $id)
    {
        $request->validated();
        $admin = Admin::find($id);
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->email = $request->email;
        $admin->mobile = $request->mobile;
        if($request->has('password') && $request->password != "")
            $admin->password = bcrypt($request->password);
        if($request->hasFile('avatar'))
            $admin->avatar = upload_file($request->file('avatar'), 'user/admin');
        $admin->save();
        $admin->removeRole($admin->roles->first());
        $admin->assignRole([$request->role]);

        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
    public function approveAdmin($id)
    {
        $admin = Admin::find($id);
        $admin->is_approved = !$admin->is_approved;
        $admin->save();
        return redirect()->back()->with('message', 'It has been changed successfully.');
    }
    public function deleteAdmin($id)
    {
        $admin = Admin::find($id);
        remove_file($admin->avatar);
        $admin->delete();

        return redirect()->back()->with('message', 'It has been deleted successfully.');
    }
}
