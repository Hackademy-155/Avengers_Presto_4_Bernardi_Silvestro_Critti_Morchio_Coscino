<div class="col-8 col-sm-6 col-md-10 col-lg-10 my-5 d-flex justify-content-center card-w mx-auto">
    <div class="card">
        <span class="premium-label"></span>
        <div class="card-img"
            style="height: 200px; background-image: url('/media/default/default.jpg'); background-size: cover; background-position: center;">
        </div>
        <div class="card-info">
            <h3 class="text-title">{{ $article->title }}</h3>
            <h4 class="text-body pt-3">
                <a href="{{ route('byCategory', ['category' => $article->category]) }}">{{ $article->category->name }}</a>
            </h4>
        </div>
        <div class="card-footer">
            <span class="text-title">${{ $article->price }}</span>
            <a href="{{ route('article.show', compact('article')) }}" class="card-button">
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</div>
