<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-3xl">Update Post: <strong class="font-bold">{{ $post->title }}</strong></h1>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
               <form action={{ route('post.update', $post->id) }} enctype="multipart/form-data" method="post">
                @csrf
                @method('put')
  <div>
           
<label class="block mb-2.5 text-sm font-medium text-heading" for="image" :value="__('Image')">Upload Image</label>
<input class="cursor-pointer bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full shadow-xs placeholder:text-body" id="image" type="file" name="image" :value="old('image')"/>
<x-input-error :messages="$errors->get('image')" class="mt-2" />

        </div>                


                 <div>
            <x-input-label for="title" :value="__('Title')" class="mt-4" />
            <x-text-input id="title" class="block p-2 mt-1 w-full" type="title" name="title" :value="old('title', $post->title)" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

          <div>
            <x-input-label for="category_id" :value="__('Category')" class="mt-4" />
            <select id="category_id" name="category_id" class="block p-2 mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:ring-brand focus:border-brand">
                <option value="">Select a Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id) == $category->id)>{{ $category->name }}</option>
                    
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
        </div>

         <div class="mt-4">
            <x-input-label for="content" :value="__('Content')" />
            <x-text-inputarea id="content" class="block mt-1 w-full" name="content">{{ old('content', $post->content) }}</x-text-inputarea>
            <x-input-error :messages="$errors->get('content')" class="mt-2" />
        </div>
        <x-primary-button class="mt-4">
            Submit
        </x-primary-button>
               </form>
            </div>

        </div>
    </div>
</x-app-layout>