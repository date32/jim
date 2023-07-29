<div class="wi8 ccenter3 sp1 head-sp-he">
    <div class="tcenter f2 pt20 pb20">My JIM life</div>
    <div class="dis">
        <div>
            <div>{{ $today }}</div>
            <div>ようこそ{{ $userName }}さん</div>
        </div>

        <div class="dis mr">
            <button wire:click="logout" class="a mr20">ログアウト</button>
            @if ($admin)
                <button onclick="location.href='/admin'" class="a mr20">管理者トップへ</button>
            @endif
            <button onclick="location.href='/dashboard'" class="a">ダッシュボードへ</button>
        </div>

    </div>
</div>
