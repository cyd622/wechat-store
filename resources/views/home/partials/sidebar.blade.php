
<div class="sidebar bg-white">
    <div class="user-nav">
        <ul>
            <li><a href="">{{ getTa($currentUser->id, $user->id) }}的小程序</a> </li>

            @if(isMe($user->id, $currentUser->id))
                <li><a href="">账户设置</a> </li>
            @endif
        </ul>
    </div>
</div>