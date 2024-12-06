<x-layout>
    <div class="col-12 col-sm-6 col-md-5 col-lg-4 my-5 d-flex justify-content-center card-w mx-auto">
        <div class="console-card console-card-container">
            <img class="console-card-img" src="#">
            <div class="console-card-info">
                <p class="console-text-title">{{$article->title}}</p>
                <p class="console-text-body">${{$article->price}}</p>
            </div>
            <a href="{{route('article.show', compact('article'))}}">
                <button class="console-card-button">More info</button> 
            </a>
            <a href="{{ route('byCategory', ['category' => $article->category]) }}"class="btn btn-outline-info">{{ $article->category->name }}</a>
        </div>
    </div>                    
</x-layout>    