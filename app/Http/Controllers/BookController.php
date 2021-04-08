<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    public function index()
    {
        // DBよりBookテーブルの値を全て取得
        $books = Book::all();

        // 取得した値をbooks変数に格納してbook/indexに渡す
        return view('book/index', compact('books'));
    }

    public function edit($id)
    {
        //  DBよりURIパラメータと同じIDを持つBookの情報を取得
        $book = Book::findOrFail($id);

        // eval(\Psy\sh());

        //  取得した値をビューに「book/edit」に渡す
        return view('book/edit', compact('book'));
    }

    public function create() //入力画面の生成（新規作成）storeへのデータの送信
    {
        $book = new Book();
        return view('book/create', compact('book'));
    }

    public function store(BookRequest $request) //create からリクエストされたデータを受け取り保存
    {
        $book = new Book();
        $book->name = $request->name;
        $book->price = $request->price;
        $book->author = $request->author;
        $book->save();

        return redirect("/book");
    }

    public function update(BookRequest $request, $id) //book/{book}の{book}が入る
    {
        $book = Book::findOrFail($id);
        $book->name = $request->name;
        $book->price = $request->price;
        $book->author = $request->author;
        $book->save();

        return redirect('/book');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect("/book");
    }

}
