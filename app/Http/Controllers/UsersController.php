<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Articles;
use App\Models\Cupons;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function showComprador($id)
    {
        $Articles = Articles::all();
        $user = User::find($id);
        return view('user/comprador/index', compact('user', 'Articles'));
    }
    public function buy($id_article, $id_user)
    {
        $article = Articles::find($id_article);
        $user = User::find($id_user);
        return view('user/comprador/preOrder', compact('user', 'article'));
    }

    public function buyed($id_article, $id_user)
    {
        $article = Articles::find($id_article);
        $article->buyed = true;
        $article->save();

        return redirect()->route('showComprador', $id_user)->with("success", "Articulo Actualizado con exito!");
    }

    public function cupon(Request $request, $id_article, $id_user)
    {
        $cupon = Cupons::where("name", $request->cupon)->get();
        $article = Articles::find($id_article);
        $user = User::find($id_user);
        return view('user/comprador/preOrder', compact('user', 'article'))->with("discount", $cupon);
    }

    public function showVendedor($id)
    {
        $Articles = Articles::where('id_user', $id)->get();
        $user = User::find($id);
        return view('user/vendedor/index', compact('user', 'Articles'));
    }
}
