<div class="wi12 ccenter3 sp1 jim-img23">
    <livewire:header />
    <div class="sp-he1rem"></div>
    <livewire:menu-list />
    <div class="f2 tcenter mt30 mb30">トレーニングエリア変更</div>

    <div class="dis mb30 ccenter3">
        <div class="wi-40 sp1">
            <div>ID: {{ $area->id }}</div>
            <div class="mb10">トレーニングエリア: {{ $area->training_area }}</div>
            <div><img src="{{ $area->area_img }}" alt=""></div>
        </div>

        <div class="ccenter4 tcenter f2 wi-20 sp-none">⇒<br>⇒<br>⇒</div>
        <div class="pc-none">
            <div class="tcenter f2">↓↓↓</div>
        </div>
        

        <div class="wi-40 sp1">
            <form wire:submit.prevent="trainingAreaUpdate({{ $area->id }})">
                <div>ID: {{ $area->id }}</div>
                <div class="he5rem">
                    <div>トレーニングエリア名: <span class="mr30"></span><input type="text" wire:model="training_area"></div>
                    @error('training_area')
                        <div class="c3">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb30"><input type="file" wire:model="area_img"></div>
                <div>
                    <button type="submit" class="original-button">変更</button>
                </div>
            </form>
        </div>
    </div>
</div>
