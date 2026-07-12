@extends('admin.layouts.main')
@section('title', 'Notifikasi')

@section('content')
<div class="max-w-3xl mx-auto space-y-lg">
    
    <div class="flex items-center justify-between mb-md">
        <div class="flex items-center gap-sm">
            <a href="{{ route('admin.dashboard') }}" class="p-2 hover:bg-surface-container rounded-lg">
                <span class="material-symbols-outlined">arrow_back</span>
            </a>
            <h1 class="font-display-lg text-display-lg text-primary-container">Notifikasi</h1>
        </div>
        
        @if($unreadCount > 0)
        <form action="{{ route('admin.notifications.mark-all-read') }}" method="POST">
            @csrf
            <button type="submit" class="text-secondary font-label-md hover:underline">
                Tandai semua dibaca
            </button>
        </form>
        @endif
    </div>

    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
        @forelse($notifications as $notif)
        <div class="p-md border-b border-outline-variant/20 hover:bg-surface-container-low transition-colors {{ !$notif['read'] ? 'bg-secondary-container/20' : '' }}">
            <div class="flex items-start gap-sm">
                <div class="w-10 h-10 rounded-lg bg-{{ $notif['color'] }}-100 flex items-center justify-center flex-shrink-0">
                    <span class="material-symbols-outlined text-{{ $notif['color'] }}-600">{{ $notif['icon'] }}</span>
                </div>
                <div class="flex-1">
                    <h4 class="font-label-md text-on-surface">{{ $notif['title'] }}</h4>
                    <p class="text-sm text-on-surface-variant mt-xs">{{ $notif['message'] }}</p>
                    <p class="text-xs text-on-surface-variant mt-sm">{{ $notif['time']->diffForHumans() }}</p>
                </div>
                @if(!$notif['read'])
                <div class="w-2 h-2 rounded-full bg-secondary flex-shrink-0 mt-sm"></div>
                @endif
            </div>
        </div>
        @empty
        <div class="p-lg text-center text-on-surface-variant">
            <span class="material-symbols-outlined text-[48px] text-outline-variant">notifications_none</span>
            <p class="mt-sm">Tidak ada notifikasi</p>
        </div>
        @endforelse
    </div>
</div>
@endsection