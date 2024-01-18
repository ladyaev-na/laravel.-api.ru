<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){

        $roles = Role::all();
        return response()->json($roles)->setStatusCode(200, 'Успешно');

    }
    public function create(Request $request){

        $role = new Role($request->all());
        $role->save();
        return response()->json($role)->setStatusCode(200, 'Успешно');

        /*$role->name = $request->name;
        $role->code = $request->code;*/

    }
    public function show($id){

        $role = Role::find($id);
        if ($role){
            return response()->json($role)->setStatusCode(200, 'Успешно');
        }else{
            return response()->json('Роль не найдена')->setStatusCode(404, 'Не найдено');
        }


    }
    public function update(Request $request, $id){

        $role = Role::find($id);
        if ($role){
            $role->update($request->all());
            return response()->json($role)->setStatusCode(200, 'Успешно');
        }else{
            return response()->json('Роль не найдена')->setStatusCode(404, 'Не найдено');
        }
    }
    public function destroy($id){

        $role = Role::find($id);
        if ($role){
            Role::destroy($id);
            return response()->json('Роль удалена')->setStatusCode(200, 'Успешно');
        }else{
            return response()->json('Роль не удален')->setStatusCode(404, 'Не найдено');
        }

    }
}
