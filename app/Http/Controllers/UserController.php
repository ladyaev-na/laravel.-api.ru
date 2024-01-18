<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        $users = User::all();
        return response()->json($users)->setStatusCode(200, 'Успешно');

    }
    public function create(Request $request){

        $users = new User($request->all());
        $users->save();
        return response()->json($users)->setStatusCode(200, 'Успешно');

    }
    public function show($id){

        $users = User::find($id);
        if ($users){
            return response()->json($users)->setStatusCode(200, 'Успешно');
        }else{
            return response()->json('Пользователь не найден')->setStatusCode(404, 'Не найдено');
        }

    }
    public function update(Request $request, $id){

        $users = User::find($id);
        if ($users){
            $users->update($request->all());
            return response()->json($users)->setStatusCode(200, 'Успешно');
        }else{
            return response()->json('Пользователь не найден')->setStatusCode(404, 'Не найдено');
        }

    }
    public function destroy($id){

        $users = User::find($id);
        if ($users){
            User::destroy($id);
            return response()->json('Пользователь не удален')->setStatusCode(200, 'Успешно');
        }else{
            return response()->json('Пользователь не удален')->setStatusCode(404, 'Не найдено');
        }

    }
}
