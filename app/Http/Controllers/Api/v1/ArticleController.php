<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $PostService;

    // public function __construct(PostService $postService)
    // {
    //     $this->postService = $postService;
    // }

    public function index()
    {
        $post = Article::all();
        if (empty($post)) {
            return response()->json([
                'success' => false,
                'message' => '未有文章',
                'data' => '',
            ],400);
        } else {
            return response()->json([
                'success' => true,
                'message' => '取得文章列表成功',
                'data' => $post,
            ],200);
        }
    }

    public function store()
    {
        $post = $this->postService->stores(request()->only('title', 'content'));
        // $article = $this->articleService->stores($request->all());
        if (!$post) {
            return response()->json([
                    'success' => false,
                    'message' => '新增文章失敗',
                    'data' => '',
            ],400);
        }

        return response()->json([
            'success' => true,
            'message' => '新增文章成功',
            'data' => $post,
        ],200);
    }

    public function show($id)
    {
        $post = $this->postService->shows($id);
        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => '無此文章',
                'data' => '',
            ], 404);
        } else {
            return response()->json([
                'success' => true,
                'message' => '顯示文章成功',
                'data' => $post,
            ],200);
        }
    }

    public function update(Request $request, $id)
    {
        dd($request);die;//沒有抓到資料
        // $result = $this->postService->updates(request()->only('title', 'content'), $id);
        $result = $this->postService->updates($request->all(), $id);
        if (!$result) {
            return response()->json([
                'success' => false,
                'message' => '更新文章失敗',
                'data' => '',
                ], 400);
        }

        return response()->json([
            'success' => true,
            'message' => '更新文章成功',
            'data' => $result,
        ],200);
    }

    public function destroy($id)
    {
        $result = $this->postService->destroys($id);

        if (!$result) {
            return response()->json([
                'success' => false,
                'message' => '刪除文章失敗',
                'data' => '',
                ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => '刪除文章成功',
            'data' => '',
        ],200);
    }
}