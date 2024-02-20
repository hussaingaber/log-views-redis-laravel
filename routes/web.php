<?php

declare(strict_types=1);

use App\Models\Article;
use Illuminate\Support\Facades\Route;

request()->server->add(['REMOTE_ADDR' => '127.0.0.2']);

Route::get('/', function () {
    return view('articles.index', [
        'articles' => Article::query()
            ->orderBy('view_count', 'desc')
            ->get(),
    ]);
})->name('articles.index');

Route::get('/{article}', function (Article $article) {
    $article->logView();

    return view('articles.show', [
        'article' => $article
    ]);
})->name('articles.show');
