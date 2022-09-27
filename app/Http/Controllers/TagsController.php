<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class TagsController extends Controller
{
    //index para mostrar todos los tag
    //store para guardar un tag en este caso
    //update para actualizar un tag
    //destroy para destruir un tag
    //edit para mostrar form de edicion

    public function index(){

        if(!Auth::check()){
            return view('auth.login');
        }





        $tags = Tag::all();
        return view('tag.tag_main', ['tags' => $tags]);


        return view('tag.tag_main');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|max:20|min:3',
        ]);
        $tag = new Tag;
        $tag -> name = $request->name;
        $tag->save();

        return redirect()->route('tag_save')->with('success', 'tag creada correctamente');
    }

    public function destroy($id){
        $tag = Tag::find($id);
        $tag->delete();

        return redirect()->route('tag_main')->with('success', 'tag eliminada correctamente');
    }
}
