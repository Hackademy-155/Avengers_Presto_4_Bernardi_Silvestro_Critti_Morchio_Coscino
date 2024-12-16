<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="my-5 text-center auth-spacing">{{ __('ui.PublicAnArticle') }}</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 justify-content-center">
                <livewire:create-article-form />
            </div>
        </div>
    </div>
</x-layout>
