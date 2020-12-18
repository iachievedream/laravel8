<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Article;

class Authority
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // return $next($request);
        //網址回傳ID
        $id = $request->route('id');
        //文章作者
        $article = Article::find($id);
        $author = $article->author;
        //登入使用者
        $user = Auth::user()->name;
        //管理員判斷
        $role = Auth::user()->role;
        if ($author == $user || $role == "admin") {
            return $next($request);
        }
        return redirect('/');
    }
}
