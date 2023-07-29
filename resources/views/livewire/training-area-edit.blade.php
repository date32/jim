<div class="wi12 ccenter3 sp1">
    <livewire:header />
    <div class="f2 tcenter mt30 mb30">トレーニングエリア変更</div>

    <div class="dis mb30">
        <div class="wi5">
            <div>ID: {{ $area->id }}</div>
            <div class="dis sp-none">
                <div>トレーニングエリア:</div>
                <div>
                    <div class="mb10">{{ $area->training_area }}</div>
                    <div><img src="{{ $area->area_img }}" alt="" class="wi3"></div>
                </div>
            </div>
            {{-- スマホ用 --}}
            <div class="dis pc-none">
                <div>トレーニングエリア: {{ $area->training_area }}</div>
                <div><img src="{{ $area->area_img }}" alt="" class="wi3"></div>
            </div>

        </div>


        <div class="ccenter4 tcenter f2 wi2 sp-none">⇒</div>
        <div class="ccenter4 tcenter f2 wi2 pc-none mt20 mb20">↓↓↓↓↓↓↓↓↓↓</div>


        <div class="wi5">
            <form wire:submit.prevent="trainingAreaUpdate({{ $area->id }})">
                <div>ID: {{ $area->id }}</div>
                <div class="mb30">トレーニングエリア名: <span class="mr30"></span><input type="text"
                        wire:model="training_area"></div>
                @error('training_area')
                    <div class="c3">{{ $message }}</div>
                @enderror
                <div class="mb30"><input type="file" wire:model="area_img"></div>
                <div>
                    <button type="submit" class="original-button">変更</button>
                </div>
            </form>
        </div>
    </div>


    <livewire:menu-list />

</div>
