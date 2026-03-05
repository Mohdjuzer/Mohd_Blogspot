<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-4">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                
               <h1 class="text-2xl mb-4 text-center">{{ $post->title }}</h1>
               {{-- user avatar --}}
               <div class="flex gap-4">
               <x-user-avatar :user="$post->user" />
                
                <div>

                    <x-follow-ctr :user="$post->user" class="flex gap-2"><a href="{{ route('profile.show', $post->user) }}" class="hover:underline">
                    {{ $post->user->name }}    
                    </a>
                   
                   @auth
                        &middot;
                    <button x-text="following? 'unfollow':'follow' " :class="following ? 'text-red-600' : 'text-emerald-600' " @click="follow()"> </button>
                    @endauth
                    </x-follow-ctr>
                    <div class="flex gap-2 text-sm text-gray-500">
                      
                            {{ $post->readTime() }} min read
                        
                        &middot;
                       
                            {{ $post->created_at->format('M d,Y') }}
                               
                    </div>
                </div>
                

               </div>
               {{-- user avatar --}}
               @if ($post->user_id === Auth::id())
                   
               
               <div class="mt-5">
                <x-primary-button href="{{ route('post.edit', $post->slug) }}">
                    Edit Post
                </x-primary-button>
                <form class="inline-block"action="{{ route('post.destroy', $post) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <x-danger-button>
                    Delete Post
                </x-danger-button>
                </form>
                
               </div>
               @endif
{{-- interaction avatar --}}
<x-clap-button :post="$post"/>
{{-- content --}}

<div class="mt-4">
    <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}" class="w-full">
    <div class="mt-4">
        {{ $post->content }}
    </div>
</div>
<div class="mt-8">
    <span class="px-4 py-2 bg-gray-300 rounded-2xl">{{ $post->category->name }}</span>
    <x-clap-button :post="$post"/>
</div>
            </div>

        </div>
    </div>
</x-app-layout>