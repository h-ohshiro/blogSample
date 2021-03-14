<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Http\Requests\BlogRequest;

class BlogController extends Controller
{
    //ブログ一覧を表示する
    public function showList()
    {
        $blogs = Blog::all();
        return view('blog.list',['blogs' => $blogs]);
    }
    // @param int $id
    // ブログ詳細を表示する
    public function showDetail($id)
    {
        $blog = Blog::find($id);
        if(is_null($blog)){
            \Session::flash('err_msg','データがありません。');
            return redirect(route('blogs'));
        }
        return view('blog.detail',['blog' => $blog]);
    }
    // ブログ投稿内容を表示する
    public function showCreate(){
        return view('blog.form');

    }
    // ブログを新規作成する
    public function exeStore(BlogRequest $request){
        $input = $request -> all();

        \DB::beginTransaction();
        try {
            Blog::create($input);
            \DB::commit();

        } catch (\Throwable $e) {

            \DB::rollback();
            abort(500);
        }
        \Session::flash('err_msg','ブログを登録しました。');
        return redirect(route('blogs'));
    }
    // ブログを編集する
    public function showEdit($id)
    {
        $blog = Blog::find($id);
        if(is_null($blog)){
            \Session::flash('err_msg','データがありません。');
            return redirect(route('blogs'));
        }
        return view('blog.edit',['blog' => $blog]);
    }
    // ブログの削除画面を表示する
    public function checkDelete($id)
    {
        $blog = Blog::find($id);
        if(is_null($blog)){
            \Session::flash('err_msg','データがありません。');
            return redirect(route('blogs'));
        }
        return view('blog.delete',['blog' => $blog]);
    }
    // ブログを削除する
    public function exeDelete(BlogRequest $request)
    {
        if(empty($request)){
            \Session::flash('err_msg','データがありません。');
            return redirect(route('blogs'));
        }
        try {
            Blog::destroy($request->id);
        } catch (\Throwable $e) {
            abort(500);
        }
        \Session::flash('err_msg','ブログを削除しました。');
        return redirect(route('blogs'));
    }
    // ブログを更新する
    public function exeUpdate(BlogRequest $request){
        // ブログのデータを受け取る
        $inputs = $request -> all();
        \DB::beginTransaction();
        try {

            $blog = Blog::find($inputs['id']);
            $blog->fill([
                'title' => $inputs['title'],
                'content' => $inputs['content'],
            ]);
            $blog->save();
            \DB::commit();

        } catch (\Throwable $e) {

            \DB::rollback();
            abort(500);
        }
        \Session::flash('err_msg','ブログを更新しました。');
        return redirect(route('blogs'));
    }

}
