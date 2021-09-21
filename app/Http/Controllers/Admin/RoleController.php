<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $emails = Role::where('name', '<>', 'admin')->orderBy('id','DESC')->pluck('name');
        $admins = Admin::whereIn('email', $emails)->get();
        
        return view('admin.role.index',compact('admins'))
            ->with('page', 'adminRole')
            ->with('admins', $admins);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        $page = 'adminRole';
        return view('admin.role.create',compact('permission', 'page'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:admins,email',
            'mobile' => 'required',
            'password' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('email')]);
        $role->syncPermissions($request->input('permission'));
        
        $admin = new Admin();
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->email = $request->email;
        $admin->mobile = $request->mobile;
        $admin->password = bcrypt($request->password);
        if($request->hasFile('avatar'))
            $admin->avatar = upload_file($request->file('avatar'), 'user/admin');
        $admin->save();
        $admin->assignRole([$role->id]);

        return redirect()->route('admin.roles.index')
                        ->with('success','Sub admin created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        $page = "adminRole";
        return view('admin.role.show',compact('role','rolePermissions', 'page'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        $role = Role::where('name', $admin->email)->first();
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$role->id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        $page = "adminRole";

        return view('admin.role.edit',compact('role','permission','rolePermissions', 'page', 'admin'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:admins,email,'.$request->admin_id,
            'mobile' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('email');
        $role->save();

        $role->syncPermissions($request->input('permission'));
        
        $admin = Admin::find($request->admin_id);
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->email = $request->email;
        $admin->mobile = $request->mobile;
        if($request->hasFile('avatar')){
            $admin->avatar = upload_file($request->file('avatar'), 'user/admin');
        }
            
            //$admin->avatar = upload_file($request->file('avatar'), 'user/admin');
        $admin->save();
        $admin->removeRole($admin->roles->first());
        $admin->assignRole([$request->role]);

        return redirect()->route('admin.roles.index')
                        ->with('success','Sub admin updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        DB::table("roles")->where('name',$admin->email)->delete();
        $admin->delete();
        return redirect()->route('admin.roles.index')
                        ->with('success','Role deleted successfully');
    }
}
