<div wire:poll="updateUnreadCount">
  @if(Auth::check() && $unreadCount > 0)
      {{ $unreadCount }}
  @else
      0
  @endif
</div>