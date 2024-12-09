@if (session()->has('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 justify-content-center">
            <form class="form" wire:submit.prevent="store">
                <div class="flex-column">
                    <label for="title">Title:</label>
                </div>
                <div class="inputForm">
                    <input 
                        type="text" 
                        placeholder="Insert title" 
                        class="input @error('title') is-invalid @enderror" 
                        id="title" 
                        wire:model.blur="title">
                </div>
                @error('title')
                    <p class="fst-italic text-danger">{{ $message }}</p>
                @enderror

                <div class="flex-column">
                    <label for="description">Description:</label>
                </div>
                <div class="inputForm">
                    <textarea 
                        id="description" 
                        placeholder="Insert description" 
                        cols="200" 
                        rows="6" 
                        class="input @error('description') is-invalid @enderror" 
                        wire:model.blur="description"></textarea>
                </div>
                @error('description')
                    <p class="fst-italic text-danger">{{ $message }}</p>
                @enderror

                <div class="flex-column">
                    <label for="price">Price:</label>
                </div>
                <div class="inputForm">
                    <input 
                        type="text" 
                        placeholder="Insert price" 
                        class="input @error('price') is-invalid @enderror" 
                        id="price" 
                        wire:model.blur="price">
                </div>
                @error('price')
                    <p class="fst-italic text-danger">{{ $message }}</p>
                @enderror

                <div class="mb-3">
                    <div class="flex-column">
                        <label for="category" class="form-label">Category:</label>
                    </div>
                    <div class="inputForm">
                        <select 
                            id="category" 
                            wire:model.blur="category" 
                            placeholder="Choose Category"
                            class="input @error('category') is-invalid @enderror">
                            <option value="" disabled selected>Seleziona una categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category')
                        <p class="fst-italic text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="button-submit">Pusblish</button>
            </form>
        </div>
    </div>
</div>
