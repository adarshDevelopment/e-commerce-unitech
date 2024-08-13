<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use App\Models\Role;
use Closure;
use Illuminate\Http\Request;

class CheckUserPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
//        dd('inside check permission middleware hello world');


        //finding what role the logged in user has
        $role = Role::find(auth()->user()->role_id);
        //finding the route of the page currently logged in
        $current_route = $request->route()->getName();
        //fetching the first row from the database with matching routes from permissions table to use its id
        $permission = Permission::where('route', $current_route)->first();
        //checking if the current route is set in the permissions table
        if($permission){
            //checking if the such permission is granted to the role of the current user in  the permission_roles table
            $permission_grant = $role->permissions()->where('permission_id', $permission->id)->first();
            if(!$permission_grant){
//                dd('You do not have permission to access this page!');
                abort(403);
                //if no such permission is granted, letting user know that they do not have access to the current page
            }
        }else{
            //letting the user know that the permission for the current route does not exist in the permissions table
//            dd('No such permission defined');
        }
        return $next($request);
    }
}
