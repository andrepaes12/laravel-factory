<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();

        return view('trashed', ['posts' => $posts]);
    }

    public function restore($post)
    {
        $post = Post::onlyTrashed()->where(['id' => $post])->first();
        if ($post->trashed()){
            $post->restore();
        }

        return redirect()->route('posts.trashed');
    }

    public function forceDelete($post)
    {
        Post::onlyTrashed()->where(['id' => $post])->forceDelete();

        return redirect()->route('posts.trashed');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * Listagem de um coletivo de artigos.
         * where = condição
         * orderBy = ordenação
         * take = limite de registros
         * get = obter a consulta
         */
//        $posts = Post::where('created_at', '>=', date('Y-m-d H:i:s'))->orderBy('title', 'desc')->get();
//        foreach($posts as $post){
//            echo "<h1>{$post->title}</h1>";
//            echo "<h2>{$post->subtitle}</h2>";
//            echo "<p>{$post->description}</p>";
//            echo "<hr>";
//        }

        /**
         * Listagem de um único artigo, o primeiro da listagem retornada.
         * Não é necessário utilizar o método get
         * Por se tratar de um único objeto, não é necessário laço de repetição
         * where = condição
         */
//        $post = Post::where('created_at', '>=', date('Y-m-d H:i:s'))->first();
//        echo "<h1>{$post->title}</h1>";
//        echo "<h2>{$post->subtitle}</h2>";
//        echo "<p>{$post->description}</p>";
//        echo "<hr>";

        /**
         * Listagem de um único artigo, o primeiro da listagem retornada.
         * Não é necessário utilizar o método get
         * Por se tratar de um único objeto, não é necessário laço de repetição
         * Caso não seja retornado registro, é redirecionado para a 404
         * where = condição
         */
//        $post = Post::where('created_at', '>=', date('2020-m-d H:i:s'))->firstOrFail();
//        echo "<h1>{$post->title}</h1>";
//        echo "<h2>{$post->subtitle}</h2>";
//        echo "<p>{$post->description}</p>";
//        echo "<hr>";

        /**
         * Listagem de um único artigo, o primeiro da listagem retornada.
         * Não é necessário utilizar o método get
         * Por se tratar de um único objeto, não é necessário laço de repetição
         * Esse método faz a busca do elemento de acordo com a chave primária.
         * Caso o atributo $primaryKey seja sobrescrito no modelo, a alteração reflete nesse método.
         */
//        $post = Post::find(1);
//        echo "<h1>{$post->title}</h1>";
//        echo "<h2>{$post->subtitle}</h2>";
//        echo "<p>{$post->description}</p>";
//        echo "<hr>";

        /**
         * Listagem de um único artigo, o primeiro da listagem retornada.
         * Não é necessário utilizar o método get
         * Por se tratar de um único objeto, não é necessário laço de repetição
         * Esse método faz a busca do elemento de acordo com a chave primária.
         * Caso o atributo $primaryKey seja sobrescrito no modelo, a alteração reflete nesse método.
         * Caso não seja retornado registro, é redirecionado para a 404
         */
//        $post = Post::findOrFail(99);
//        echo "<h1>{$post->title}</h1>";
//        echo "<h2>{$post->subtitle}</h2>";
//        echo "<p>{$post->description}</p>";
//        echo "<hr>";

        /**
         * Verificação de existência:
         * exists() = Se existe retorna true, se não existe retorna false
         * doesntExists() = Se existe retorna false, se não existe retorna true
         *
         * Métodos agregadores
         * max = Qualquer tipo de campo e retorna de acordo com a ordem alfabética ou numérica
         * min = Qualquer tipo de campo e retorna de acordo com a ordem alfabética ou numérica
         * sum = Faz a soma de campos numerais (inteiros, double, decimal)
         * count = Retorna a quantidade de registros encontrados
         * avg = Média aritmética de campos numerais (inteiros, double, decimal)
         */
        // max - min - sum - count - avg
//        $posts = Post::where('created_at', '>=', date('Y-m-d H:i:s'))->max('title');
//        foreach($posts as $post){
//            echo "<h1>{$post->title}</h1>";
//            echo "<h2>{$post->subtitle}</h2>";
//            echo "<p>{$post->description}</p>";
//            echo "<hr>";
//        }

        /**
         * Retorna todos os registros do modelo
         */
        $posts = Post::all();
        return view('index', ['posts' => $posts]);

        // ver todos, inclusive os deletados (coluna ref softDeletes)
        // $posts = Post::withTrashed()->get();
        // return view('index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Método 1
        // $post = new Post();
        // $post->title = $request->title;
        // $post->subtitle = $request->subtitle;
        // $post->description = $request->description;
        // $post->save();

        // Método 2
        // Model Post => incluir $fillable
        // Post::create([
        //     'title' => $request->title,
        //     'subtitle' => $request->subtitle,
        //     'description' => $request->description
        // ]);

        // Método 3
        // se houver dado repetido, não salva
        // $post = Post::firstOrNew([
        //     'title' => $request->title,
        // ], [
        //         'subtitle' => $request->subtitle,
        //         'description' => $request->description
        // ]);
        // $post->save();

        // Método 4
        $post = Post::firstOrCreate([
            'title' => $request->title,
        ], [
                'subtitle' => $request->subtitle,
                'description' => $request->description
        ]);

        // return view('create');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // método 1
        // $post = Post::find($post->id);
        // $post->title = $request->title;
        // $post->subtitle = $request->subtitle;
        // $post->description = $request->description;
        // $post->save();

        // // método 2
        // $post = Post::updateOrCreate([
        //     // procurar o título
        //     'title' => $request->title
        // ], [
        //     // se encontrar: update()
        //     'subtitle' => $request->subtitle,
        //     'description' => $request->description
        //     // se não: create()
        // ]);

        // método 3
        Post::where('id', '=', $post->id)->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //cria a instância e deleta o registro
        // Post::find($post->id)->delete();

        Post::destroy($post->id);

        // Post::where('id', '=', $post->id)->delete();

        return redirect()->route('posts.index');
    }
}
