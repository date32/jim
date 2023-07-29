<div class="wi12 ccenter3 sp1">
    @if ($login === null)
    <div class="tcenter f2 pt20 pb20">My JIM life</div>
        <form wire:submit.prevent="login">
            <div class="wi5 ccenter3 sp1">
                <div class="dis mb10">
                    <div class="wi1 ccenter4">
                        <label for="name">ユーザー名</label>
                    </div>
                    <input type="text" id="name" wire:model="name" required>
                </div>

                <div class="dis mb10">
                    <div class="wi1 ccenter4">
                        <label class="wi1 ccenter4" for="pass">パスワード</label>
                    </div>
                    <input type="password" id="pass" wire:model="pass" required>
                </div>

                <div class="custum-he">
                    <p class="c3">{{ $errorMessage }}</p>
                </div>

                <div>
                    <button type="submit" class="original-button">ログイン</button>
                </div>
            </div>

        </form>
    @else
        <livewire:header />
    @endif
</div>
<style>
    .custum-he {
        height: 30px;
    }
</style>
