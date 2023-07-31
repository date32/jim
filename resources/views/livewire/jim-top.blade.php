<div class="wi12 ccenter3 sp1 jim-img1">
    @if ($login === null)
        <div class="tcenter f2 pt20">My JIM life</div>
        <div class="wi5 ccenter3 mb20">ver.2</div>
            
        <form wire:submit.prevent="login">

            <div class="b wi5 ccenter3 sp1 p10 ra10">
                <div class="dis mb10 ccenter2">
                    <div class="wi1 ccenter4">
                        <label for="name">ユーザー名</label>
                    </div>
                    <input type="text" id="name" wire:model="name" required>
                </div>

                <div class="dis mb10 ccenter2">
                    <div class="wi1 ccenter4">
                        <label class="wi1 ccenter4" for="pass">パスワード</label>
                    </div>
                    <input type="password" id="pass" wire:model="pass" required>
                </div>

                <div class="custum-he">
                    <p class="c3 tcenter">{{ $errorMessage }}</p>
                </div>

                <div>
                    <button type="submit" class="original-button ccenter3">ログイン</button>
                </div>
            </div>

        </form>
    @else
        <livewire:header />
    @endif
    <div class="tcenter mt20">since2023.7.30</div>
    
</div>