
                    <div class="grid grid-cols-1 md:grid-cols-[70%_30%] bg-white p-6 border border-default rounded-base shadow-xs mb-8">

                        <!-- LEFT: Text -->
                        <div class="flex flex-col justify-between md:p-4">
                            <a href="{{ route('post.show', ['username'=> $post->user->username, 'post'=> $post->slug]) }}">
                            <h5 class="mb-3 text-2xl font-bold tracking-tight text-heading">
                                {{ $post->title }}
                            </h5></a>

                            <div class="mb-5 text-body">
                                {{ Str::words($post->content, 15) }}
                            </div>
                            <div class="flex flex-col gap-2">

    <!-- Top Row -->
    <div class="flex items-center gap-5">

        <!-- Read More -->
        <a href="{{ route('post.show', ['username'=> $post->user->username, 'post'=> $post->slug]) }}">
        <button type="button"
            class="inline-flex items-center w-fit text-white bg-black border border-default-medium hover:bg-neutral-700 hover:text-neutral-200 focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium rounded-base text-sm px-4 py-2.5">
            Read more
            <svg class="w-4 h-4 ms-1.5" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M19 12H5m14 0-4 4m4-4-4-4" />
            </svg>
        </button>
        </a>
        <!-- Claps -->
        <div class="flex items-center gap-2 text-sm text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-5 h-5">
                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
            </svg>

            <span>{{ $post->claps_count }}</span>
        </div>

    </div>

    <!-- Date -->
    <div class="flex items-center gap-3 mt-3">
      <a href="{{ route('profile.show', $post->user->username) }}">
    <img src="{{ $post->user->imageUrl('avatar') }}" 
         alt="Profile Picture"
         class="w-10 h-10 rounded-full object-cover" /></a> 

    <div class="flex items-center gap-4 text-sm text-gray-500">
        <a href="{{ route('profile.show', $post->user->username) }}" class="text-gray-900 hover:underline text-bold">{{ $post->user->name }}</a>
        <span>{{ $post->created_at->format('M d, Y') }}</span>
    </div>
</div>

</div>
                        </div>

                        <!-- RIGHT: Image -->
                        <a href="{{ route('post.show', ['username'=> $post->user->username, 'post'=> $post->slug]) }}">
                        <div class="h-48 md:h-48">
                            <img src="{{ $post->imageUrl() }}" alt=""
                                class="w-full h-full pl-1 object-cover rounded-r-lg" />
                        </div>
                        </a>
                    </div>