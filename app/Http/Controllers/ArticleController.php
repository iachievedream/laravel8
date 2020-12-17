<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::all();
        return view('article.index')->with('articles', $article);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');

        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $article = Validator::make($request->all(), [
        //     'title' => 'required|max:25',
        //     'content' => 'required|max:255',
        // ]);
        // if ($article->fails())
        // {
        //     return redirect('/create');
        // }
        // // $this->articleService->storeService($request->all());
        $data = $request->all();

        Article::create([
			'title' => $data['title'],
			'content' => $data['content'],
			'author' => Auth::user()->name,
		]);
        return Redirect('/');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        // $article = $this->articleService->showService($id);
        return view('article.show')->with('articles', $article);
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
        $article = Article::find($id);

        // $article = $this->articleService->editService($id);
        return view('article.edit')->with('articles', $article);
        //
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

        $article = Validator::make($request->all(), [
            'title' => 'required|max:25',
            'content' => 'required|max:255',
        ]);
        if ($article->fails())
        {
            return redirect('/show/edit/'. "$id");
        }
        $data = $request->all();
        Article::find($id)->update([
			'title' => $data['title'],
			'content' => $data['content'],
		]);
        // $this->articleService->updateService($request->all(), $id);
        return redirect('/');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::find($id)->delete();
        // $this->articleService->deleteService($id);
        return redirect('/');
        //
    }
}
