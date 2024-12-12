@if (session()->has('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 justify-content-center">
            <form class="form" wire:submit='store'>
                <div class="flex-column">
                    <label for="title">{{ __('ui.Title') }}:</label>
                </div>
                <div class="inputForm">
                    <input type="text" placeholder="{{ __('ui.InsertTitle') }}"
                        class="input @error('title') is-invalid @enderror" id="title" wire:model.blur="title">
                </div>
                @error('title')
                    <p class="fst-italic text-danger">{{ $message }}</p>
                @enderror

                <div class="flex-column">
                    <label for="description">{{ __('ui.InsertDescription') }}:</label>
                </div>
                <div class="inputForm">
                    <textarea id="description" placeholder="{{ __('ui.SelectCategories') }}" cols="200" rows="6"
                        class="input @error('description') is-invalid @enderror" wire:model.blur="description"></textarea>
                </div>
                @error('description')
                    <p class="fst-italic text-danger">{{ $message }}</p>
                @enderror

                <div class="flex-column">
                    <label for="price">{{ __('ui.Price') }}:</label>
                </div>
                <div class="inputForm">
                    <input type="text" placeholder="{{ __('ui.InsertPrice') }}"
                        class="input @error('price') is-invalid @enderror" id="price" wire:model.blur="price">
                </div>
                @error('price')
                    <p class="fst-italic text-danger">{{ $message }}</p>
                @enderror
                <div class="mb-3">
                    <div class="flex-column">
                        <label for="category" class="form-label">{{ __('ui.Category') }}:</label>
                    </div>
                    <div class="inputForm">
                        <select id="category" wire:model.blur="category" placeholder="{{ __('ui.ChooseCategory') }}"
                            class="input @error('category') is-invalid @enderror">
                            <option value="" disabled>{{ __('ui.SelectCategories') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ __('ui.' . $category->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category')
                        <p class="fst-italic text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="button-submit rounded-pill reviewer-btn">{{ __('ui.Publish') }}</button>
            </form>
        </div>
    </div>
</div>
