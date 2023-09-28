<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex gap-10 py-12">
    <div class="w-64">
        <a href="" class="block w-full py-4 mb-10 bg-gradient-to-r from-blue-600 to-blue-700
         hover:to-blue-600 text-white/90 font-bold text-xs text-center rounded-md">
            Preguntar
        </a>
        <ul>
            @foreach ( $categories as $category )
                
            
            <li class="mb-2">
                <a href="#" wire:click.prevent="filterByCategory('{{$category->id}}')" class="p-2 rounded-md flex bg-slate-800 items-center gap-2 
                text-white/60 hover:text-white font-semibold text-xs capitalize">
                    <span class="w-2 h-2 rounded-full" style="background-color: {{$category->color}}"></span>
                    {{$category->name}}
                </a>
            </li>
            @endforeach
            <li>
                <a href="#" wire:click.prevent="filterByCategory('')" class="p-2 rounded-md flex bg-slate-800 items-center gap-2 
                text-white/60 hover:text-white font-semibold text-xs capitalize">
                    <span class="w-2 h-2 rounded-full" style="background-color: #000000"></span>
                    todos los resultado
                </a>
            </li>
        </ul>
    </div>
    <div class="w-full">
        {{-- Formulario --}}
        <form action="" class="mb-4">
            <input type="text" placeholder="// ..."
            class="bg-slate-800 border-0 rounded-md w-1/3 p-3 text-white/60 text-xs"
            wire:model="search"
            >
        </form>

        @foreach ($threads as $thread)
            <div class="rounded-md bg-gradient-to-r from-slate-800 to-slate-900 hover:to-slate-800 mb-4">
                <div class="p-4 flex gap-4">
                    <div>
                        <img src="{{$thread->user->avatar()}}" alt="{{$thread->user->name}}" class="rounded-md">
                    </div>
                    <div class="w-full">
                        <h2 class="mb-4 flex items-start justify-between">
                            <a href="" class="text-xl font-semibold text-white/90">
                                {{$thread->title}}
                            </a>
                            <span class="rounded-full text-xs py-2 px-2 capitalize"
                            style="color: {{ $thread->category->color}}; border:1px solid {{ $thread->category->color}};">
                                {{ $thread->category->name}}
                            </span>
                        </h2>
                        <p class="flex items-center justify-between w-full text-xs">
                            <span class="text-blue-600 font-semibold ">
                                {{ $thread->user->name}}
                                <span class="text-white/90">{{ $thread->created_at->diffForHumans() }}</span>
                            </span>
                            <span class="flex items-center gap-1 text-slate-700">
                                <svg fill="currentColor" class="h-4" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 2c-2.236 0-4.43.18-6.57.524C1.993 2.755 1 4.014 1 5.426v5.148c0 1.413.993 2.67 2.43 2.902 1.168.188 2.352.327 3.55.414.28.02.521.18.642.413l1.713 3.293a.75.75 0 001.33 0l1.713-3.293a.783.783 0 01.642-.413 41.102 41.102 0 003.55-.414c1.437-.231 2.43-1.49 2.43-2.902V5.426c0-1.413-.993-2.67-2.43-2.902A41.289 41.289 0 0010 2zM6.75 6a.75.75 0 000 1.5h6.5a.75.75 0 000-1.5h-6.5zm0 2.5a.75.75 0 000 1.5h3.5a.75.75 0 000-1.5h-3.5z"></path>
                                </svg>
                                {{ $thread->replies_count }}
                                Respuesta{{ $thread->replies_count !=1 ? 's': ''}}
                                |
                                <a href="" class="hover:text-white">Editar</a>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
