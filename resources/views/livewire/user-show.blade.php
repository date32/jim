<div>
    <livewire:header />
    ユーザー一覧
    <table>
        <tr>
            <th>ID</th>
            <th>ユーザー名</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td><button wire:click="confirmUserDelete({{$user->id}})">削除</button></td>
        </tr>
        @endforeach
    </table>
    @if($delete_yes_no)
    <div>
        <p>本当に{{ $name }}を削除しますか？</p>
        <p class="cursor" wire:click="delete_yes">はい</p>
        <p class="cursor" wire:click="delete_no">いいえ</p>
    </div>
    @endif
    
</div>

<style>
    .cursor {
        display: inline;
        margin: 0 50px 0 20px;
        cursor: pointer;
        /* background-color: aqua */
    }
</style>
