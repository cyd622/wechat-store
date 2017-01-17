
<div class="sidebar bg-white">
    <div class="user-nav">
        <ul>
            <li><a href="">{{ getTa($currentUser, $user) }}的小程序</a> </li>

            @if(isMe($user, $currentUser))
                <li><a href="">账户设置</a> </li>
            @endif
        </ul>
    </div>
</div>