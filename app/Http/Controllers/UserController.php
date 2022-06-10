<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    User
};

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $user = User::create([$request->all()]);

            \Session::flash("flash_message", ["msg"   => 'Usuario criado com sucesso', "class" => "success"]);

        } catch (\Throwable $th) {
            \Session::flash("flash_message", [
                "msg"   => 'Algo de errado aconteceu. Por favor verifique a sua conexão e tente novamente.',
                "class" => "red"
            ]);
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact(['user']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact(['user']));
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
        try {
            $user = User::find($id);
            $user->update([$request->all()]);

            \Session::flash("flash_message", ["msg"   => 'Perfil alterado com sucesso', "class" => "success"]);

        } catch (\Throwable $th) {
            \Session::flash("flash_message", [
                "msg"   => 'Algo de errado aconteceu. Por favor verifique a sua conexão e tente novamente.',
                "class" => "danger"
            ]);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::find($id);
            $user->delete();

            \Session::flash("flash_message", ["msg"   => 'Perfil apagado com sucesso', "class" => "success"]);

        } catch (\Throwable $th) {
            \Session::flash("flash_message", [
                "msg"   => 'Algo de errado aconteceu. Por favor verifique a sua conexão e tente novamente.',
                "class" => "danger"
            ]);
        }
        return back();
    }

    /**
     * Restore element
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        try {
            $post = $post->find($id)->restore();

            \Session::flash("flash_message", ["msg"   => 'Perfil restaurado com sucesso', "class" => "success"]);

        } catch (\Throwable $th) {
            \Session::flash("flash_message", [
                "msg"   => 'Algo de errado aconteceu. Por favor verifique a sua conexão e tente novamente.',
                "class" => "danger"
            ]);
        }
        return back();
    }

    /**
     * Delete Element
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forceDelete($id)
    {
        try {
            $post = $post->find($id)->forceDelete();

            \Session::flash("flash_message", ["msg"   => 'Perfil apagado com sucesso', "class" => "success"]);

        } catch (\Throwable $th) {
            \Session::flash("flash_message", [
                "msg"   => 'Algo de errado aconteceu. Por favor verifique a sua conexão e tente novamente.',
                "class" => "danger"
            ]);
        }
        return back();
    }
}
