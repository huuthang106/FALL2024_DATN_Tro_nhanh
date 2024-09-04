<div wire:poll="updateUnreadCount">
    @if($unreadCount > 0)
  {{ $unreadCount }}
  @else
  0
    @endif
</div>