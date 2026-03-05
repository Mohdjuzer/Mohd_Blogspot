<ul class="flex text-sm font-medium border-b border-border-default justify-center">
    
                    <li class="me-2">
                        <a href="/" aria-current="page" class="{{ request('category')?'inline-block p-4 rounded-t-base text-fg-heading
                                   hover:bg-neutral-secondary-soft hover:text-fg-heading':'inline-block p-4 -mb-px
         text-fg-brand
         bg-neutral-secondary-soft
         rounded-t-base
         border border-border-default border-b-white' }}">
                            All
                        </a>

                    </li>
                    @forelse($categories as $categoriess)
                        <li class="me-2">
                            <a href="{{ route('category.posts', $categoriess) }}" class="{{ Route::currentRouteNamed('category.posts') && request('category')->id == $categoriess->id ? 'inline-block p-4 -mb-px
         text-fg-brand
         bg-neutral-secondary-soft
         rounded-t-base
         border border-border-default border-b-white' : 'inline-block p-4 rounded-t-base text-fg-heading
                                   hover:bg-neutral-secondary-soft hover:text-fg-heading' }}">
                                {{ $categoriess->name }}
                            </a>
                        </li>
                        @empty {{ $slot }}
                    @endforelse
                    <li>
                        <span class="inline-block p-4 text-fg-disabled rounded-t-base
                   cursor-not-allowed select-none">
                            Coming soon
                        </span>
                    </li>
</ul>