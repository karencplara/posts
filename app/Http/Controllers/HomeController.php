<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Posts;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $usuario_id = Auth::user()->id;
        $posts = Posts::where('user_id', '=', $usuario_id)->get();

        return view('home', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'required',
        ]);

        if (Auth::check()){
            $usuario_id = Auth::user()->id;
            $request['user_id'] = $usuario_id;

            Posts::create($request->all());
        }
        
        return redirect('/home')->with('mensagem', 'Post cadastrado com sucesso!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::findOrFail($id);

        return view('edit_post', compact('post'));
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
       
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'required',
        ]);
        Posts::whereId($id)->update($validated);

        return redirect('/home')->with('mensagem', 'Post alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Posts::findOrFail($id);
        $posts->delete();

        return redirect('/home')->with('mensagem', 'Post removido com sucesso!');
    }
}
