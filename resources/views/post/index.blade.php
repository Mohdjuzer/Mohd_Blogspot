<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg pt-4 pb-[0.2rem]">
                <x-category-tabs>
                    No Category Found
                </x-category-tabs>
            </div>

        </div>
    </div>
    <div class="pt-3 text-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg pt-4 pb-[0.2rem]"> --}}
                @forelse ($posts as $post)
                <x-post-item :post="$post"></x-post-item>
                @empty
                    <div class="text-center text-gray-400 py-16">No Post Found</div>
                @endforelse
                {{ $posts->onEachSide(1)->links() }}
            </div>

        </div>
    </div>
</x-app-layout>