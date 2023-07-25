<div>
    <livewire:header />
    <div>トレーニングエリア変更</div>
    <div class="dis">
        <div>
            <div>ID: {{ $area->id }}</div>
            <div class="dis">
                <div>トレーニングエリア名: {{ $area->training_area }}</div>
                <div><img src="{{ $area->area_img }}" alt=""></div>
            </div>
           
        </div>
        <div>→</div>
        <div>
            <form wire:submit.prevent="trainingAreaUpdate({{ $area->id }})">
                <div>ID: {{ $area->id }}</div>
                <div>トレーニングエリア名:<input type="text" wire:model="training_area"></div>
                @error('training_area')
                    <div>{{ $message }}</div>
                @enderror
                <div><input type="file" wire:model="area_img"></div>              
                <div>
                    <button type="submit">変更</button>
                </div>
            </form>
        </div>
    </div>

    <div><a href="/admin/machine">戻る</a></div>
</div>

<style>
    img {
        width: 100px;
    }

    .dis {
        display: flex;
    }
</style>
