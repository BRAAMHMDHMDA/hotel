<li class="nav-item dropdown dropdown-large">
    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" data-bs-toggle="dropdown">
        @if($newCount != 0)
            <span class="alert-count">{{$newCount}}</span>
        @endif
        <i class='bx bx-bell'></i>
    </a>
    <div class="dropdown-menu dropdown-menu-end">
        <a href="javascript:;">
            <div class="msg-header">
                <p class="msg-header-title">Notifications</p>
                <p class="msg-header-badge">{{$newCount}} New</p>
            </div>
        </a>
        <div class="header-notifications-list">
            @foreach($notifications as $notification)
                <a class="dropdown-item @if($notification->unread()) bg-secondary-subtle @endif"
                   href="{{$notification->data['url']}}?notification_id={{$notification->id}}" style="margin-bottom: 2px"
                >
                    <div class="d-flex align-items-center">
                        <div class="notify bg-light-success text-success">
                            <i class='{{$notification->data['icon']}}'></i>
                        </div>
                        <div class="notification-body" style="word-wrap: break-word; overflow-wrap: break-word;">
                            <div class="notification-body" style="word-wrap: break-word; overflow-wrap: break-word;">

                            {!! $notification->data['body'] !!}
                            </div>
{{--                            <p class="msg-info">{{$notification->created_at->diffForHumans()}}</p>--}}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
{{--        <a href="javascript:;">--}}
{{--            <div class="text-center msg-footer">--}}
{{--                <button class="btn btn-primary w-100">View All Notifications</button>--}}
{{--            </div>--}}
{{--        </a>--}}
    </div>
</li>
