@props(['user', 'size'=> 'w-12 h-12'])
 
 @if ($user->image)
                    <img src="{{$user->imageUrl() }}" alt="{{ $user->name }}" class=" {{ $size }} rounded-full">
                @else
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSHTecWVG03Q76l1-z24nS61GOBn9Rq-7DSkw&s" alt="{{ $user->name }}" class="{{ $size }} rounded-full">    
                @endif