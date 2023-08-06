<div class="wi12 ccenter3 sp1 jim-img2">
    <livewire:header />
    <div class="f2 tcenter mt50 mb10">体重登録</div>
    <div class="tcenter mb20">筋力トレーニングのカロリー計算に使用します</div>

    <div class="he5rem">
        @if (!$open)
            <div><button wire:click="weightOpen" class="original-button5 ccenter3">体重表示</button></div>
        @endif

        @if ($open)
            <div><button wire:click="weightOpen" class="original-button5 ccenter3">体重非表示</button></div>
            <div class="tcenter">現在の体重:{{ $userWeight }}kg</div>
        @endif
    </div>

    <form wire:submit.prevent="weightStore">
        <div class="dis flex ccenter2">
            <div class="mr10"><input type="text" wire:model="weight" required></div>
            <div class="ccenter4">kg</div>
        </div>

        <div class="he2rem c3 tcenter">
            @error('weight')
                {{ $message }}
            @enderror
        </div>

        <button type="submit" class="original-button ccenter3">登録</button>
    </form>

</div>
