<div>
    <div>
        ユーザー登録
    </div>
    @error('name')
        <div>{{$message}}</div>
    @enderror
    <form wire:submit.prevent="UserStore">
        <div>
            <label for="name">ユーザー名</label>
            <input type="text" id="name" wire:model="name" required>
        </div>
        <div>
            <label for="pass">パスワード</label>
            <input type="text" id="pass" wire:model="pass" required>
        </div>
        <div>
            <button type="submit">登録</button>
        </div>
    </form>
    
</div>
