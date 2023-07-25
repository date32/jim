<div>
    <div class="dis">
        <div>ようこそ{{$userName}}さん</div>
        <div>{{ $today }}</div>
        <button wire:click="logout">ログアウト</button>
        @if ($admin)
        <div><a href="/admin">管理者トップへ</a></div>
        @endif
        <div><a href="/dashboard">ダッシュボードへ</a></div>
    </div>
</div>

<style>
    .dis {
        display: flex;
    }
</style>