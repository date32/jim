<div class="wi12 ccenter3 sp1 head-sp-he">
    <div class="tcenter f2 pt20 pb20">My JIM life</div>
    <div class="dis">
        <div>
            <div>{{ $today }}</div>
            <div>ようこそ{{ $userName }}さん</div>
            <div>{{$message}}</div>
        </div>

        <div class="dis mr">       
            @if ($admin)
                <button onclick="location.href='/admin'" class="mr20"><span class="a">管理者トップへ</span></button>
            @endif
            <button onclick="location.href='/dashboard'" class="mr20"><span class="a">ダッシュボードへ</span></button>
            <button onclick="location.href='/record'" class="mr20"><span class="a">記録</span></button>
            <button onclick="location.href='/weight'" class="mr20"><span class="a">体重登録</span></button>
            <button onclick="location.href='#'" class="mr20"><span class="a">一言掲示板</span></button>
            <button wire:click="logout" class=""><span class="a">ログアウト</span></button>
        </div>

    </div>
</div>
