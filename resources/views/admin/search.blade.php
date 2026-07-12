@extends('admin.layouts.main')
@section('title', 'Hasil Pencarian')

@section('content')
<div class="max-w-4xl mx-auto space-y-lg">
    
    <div class="bg-white rounded-2xl p-lg shadow-sm">
        <form action="{{ route('admin.search') }}" method="GET">
            <div class="flex gap-sm">
                <input type="text" name="q" value="{{ $query }}" placeholder="Cari artikel, user, rute..." 
                       class="flex-1 px-md py-sm border border-outline-variant rounded-lg outline-none focus:border-secondary text-lg" autofocus>
                <button type="submit" class="bg-gradient-to-r from-secondary-fixed to-secondary text-primary-container px-lg py-sm rounded-lg font-label-md shadow-md flex items-center gap-xs">
                    <span class="material-symbols-outlined">search</span> Cari
                </button>
            </div>
        </form>
    </div>

    @if($query)
    <div class="space-y-md">
        
        @if($results['articles']->count() > 0)
        <div class="bg-white rounded-2xl p-md shadow-sm">
            <h3 class="font-headline-sm text-primary-container mb-sm flex items-center gap-xs">
                <span class="material-symbols-outlined">article</span> Artikel ({{ $results['articles']->count() }})
            </h3>
            <div class="space-y-sm">
                @foreach($results['articles'] as $article)
                <a href="{{ route('admin.articles.edit', $article) }}" class="block p-sm rounded-lg hover:bg-surface-container-low transition-colors">
                    <h4 class="font-label-md text-on-surface">{{ $article->title }}</h4>
                    <p class="text-sm text-on-surface-variant">{{ Str::limit($article->excerpt, 100) }}</p>
                </a>
                @endforeach
            </div>
        </div>
        @endif

        @if($results['users']->count() > 0)
        <div class="bg-white rounded-2xl p-md shadow-sm">
            <h3 class="font-headline-sm text-primary-container mb-sm flex items-center gap-xs">
                <span class="material-symbols-outlined">people</span> Pengguna ({{ $results['users']->count() }})
            </h3>
            <div class="space-y-sm">
                @foreach($results['users'] as $user)
                <div class="flex items-center gap-sm p-sm rounded-lg hover:bg-surface-container-low transition-colors">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-secondary-fixed to-secondary flex items-center justify-center text-white font-bold">
                        {{ substr($user->name, 0, 1) }}
                    </div>
                    <div>
                        <h4 class="font-label-md text-on-surface">{{ $user->name }}</h4>
                        <p class="text-sm text-on-surface-variant">{{ $user->email }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        @if($results['articles']->count() === 0 && $results['users']->count() === 0)
        <div class="text-center py-lg text-on-surface-variant">
            <span class="material-symbols-outlined text-[48px] text-outline-variant">search_off</span>
            <p class="mt-sm">Tidak ada hasil untuk "{{ $query }}"</p>
        </div>
        @endif
    </div>
    @endif
</div>
@endsection