<div class="wi12 ccenter3 sp1 jim-img1">
    @if ($login === null)
        <div class="tcenter f2 ft1 pt20">My JIM life</div>
        <div class="wi5 ccenter3 tr ft1 mb20">ver.4</div>

        <form wire:submit.prevent="login">

            <div class="b wi5 ccenter3 sp1 p10 ra10 mb50">
                <div class="dis mb10 ccenter2">
                    <div class="ccenter4 mr10">
                        <label for="name"><i class="fa-solid fa-user mr10"></i>ユーザー名</label>
                    </div>
                    <input type="text" id="name" wire:model="name" required>
                </div>

                <div class="dis mb10 ccenter2">
                    <div class="ccenter4 mr10">
                        <label class="wi1 ccenter4" for="pass"><i class="fa-solid fa-key mr10"></i>パスワード</label>
                    </div>
                    <input type="password" id="pass" wire:model="pass" required>
                </div>

                <div class="custum-he">
                    <p class="c3 tcenter">{{ $errorMessage }}</p>
                </div>

                <div>
                    <button type="submit" class="original-button ccenter3"><i class="fa-solid fa-arrow-right-to-bracket mr10"></i>ログイン</button>
                </div>
            </div>

            <div class="b wi5 ccenter3 sp1 p10 ra10">
                <div class="p10">
                    <button class="original-button4 ccenter3 cursor mb20" onclick="location.href='#'"><i class="fa-solid fa-pen-nib mr10"></i>一言掲示板</button>
                    <button class="original-button4 ccenter3 cursor mb20" onclick="location.href='#'">工事中</button>
                    <button class="original-button4 ccenter3 cursor" onclick="location.href='#'">工事中</button>
                </div>
            </div>

        </form>
    @else
        <livewire:header />
    @endif
    <div class="wi5 ccenter3 tr mt20 ft1">since2023.7.30</div>
</div>
