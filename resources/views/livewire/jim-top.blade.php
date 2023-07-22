<div>
    <div>My JIM life</div>
    <p>{{$errorMessage}}</p>
    <form wire:submit.prevent="login">
        <div>
            <label for="name">ユーザー名</label>
            <input type="text" id="name" wire:model="name" required>
        </div>
        <div>
            <label for="pass">パスワード</label>
            <input type="password" id="pass" wire:model="pass" required>
        </div>
        <div>
            <button type="submit">ログイン</button>
        </div>
    </form>
</div>
