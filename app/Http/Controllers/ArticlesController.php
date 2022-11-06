<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{


    public function create($id)
    {
        //el formulario donde
        return view('user/vendedor/agregar', compact('id'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:1'
        ]);
        $articles = new Articles();
        $articles->name = $request->post('name');
        $articles->price = $request->post('price');
        $articles->id_user = $id;
        $articles->buyed = false;
        $articles->save();

        return redirect()->route('showVendedor', $id)->with("success", "Articulo agregado con exito!");
    }

    public function show($id_article, $id_user)
    {
        $article = Articles::find($id_article);
        return view('user/vendedor/eliminar', compact('article', 'id_user'));
    }

    public function edit($id_article, $id_user)
    {
        $article = Articles::find($id_article);
        return view('user/vendedor/actualizar', compact('article', 'id_user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:1'
        ]);
        $article = Articles::find($id);
        $article->name = $request->post('name');
        $article->price = $request->post('price');
        $article->save();

        return redirect()->route('showVendedor', $article->id_user)->with("success", "Articulo Actualizado con exito!");
    }

    public function destroy($id_article)
    {
        $article = Articles::find($id_article);
        $article->delete();
        return redirect()->route('showVendedor', $article->id_user)->with("success", "Articulo Actualizado con exito!");
    }
}
