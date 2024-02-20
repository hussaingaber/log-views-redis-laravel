<div>
    <h1>Articles</h1>
    <ul>
        @foreach ($articles as $article)
            <li>
                <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a> ({{ $article->getViewCount() }})
            </li>
        @endforeach
    </ul>
</div>