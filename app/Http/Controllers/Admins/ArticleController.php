<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Article::all();
        $category = new Category();
        return view("admins/articles/index", compact("data", "category"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("admins/articles/create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ten_the_loai' => 'required',
            'tieu_de' => 'required',
            'ten_bai_hat' => 'required',
            'tom_tat' => 'required',
            'hinh_anh' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);

        $file_name = null;
        if (!empty($request->hinh_anh)) {
            //đặt tên file
            $file_name = time() . '.' . request()->hinh_anh->getClientOriginalExtension();

            //lưu ảnh vào máy
            request()->hinh_anh->move(public_path('images'), $file_name);
        }

        $category = Category::where("ten_tloai", $request->ten_the_loai)->get();
        $article = new Article;

        $article->ma_tloai = $category[0]->id;
        $article->tieude = $request->tieu_de;
        $article->ten_bhat = $request->ten_bai_hat;
        $article->tomtat = $request->tom_tat;
        $article->noidung = $request->noi_dung;
        $article->hinhanh = $file_name;

        $article->save();

        return redirect()->route('articles.index')->with('success', 'article Added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $ten_the_loai = Category::find($article->ma_tloai)->ten_tloai;
        return view("admins/articles/show", compact("article","ten_the_loai"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        return view("admins/articles/edit", compact("article", "categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'ten_the_loai' => 'required',
            'tieu_de' => 'required',
            'ten_bai_hat' => 'required',
            'tom_tat' => 'required',
            'hinh_anh' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);

        $name_image = $request->hidden_article_image;

        //thay đổi ảnh mới
        if ($request->hinh_anh != '') {
            $name_image = time() . '.' . request()->hinh_anh->getClientOriginalExtension();

            request()->hinh_anh->move(public_path('images'), $name_image);
        }

        $category = Category::where("ten_tloai", $request->ten_the_loai)->get();

        $article->ma_tloai = $category[0]->id;
        $article->tieude = $request->tieu_de;
        $article->ten_bhat = $request->ten_bai_hat;
        $article->tomtat = $request->tom_tat;
        $article->noidung = $request->noi_dung;
        $article->hinhanh = $name_image;
        $article->save();

        return redirect()->route('articles.index')->with('success', 'Article Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article Data has been delete successfully');
    }
}