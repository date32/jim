<div class="wi12 ccenter3 sp1 jim-img16">
    <livewire:header />
    <div class="f2 tcenter mt30 mb20">マシーンサーチ</div>

    <div class="p10 original-box-shadow wi4 ccenter3 mb20">
        <div>【{{ $serchMachine[0]->training_area }}】を鍛えることが出来るマシーン一覧</div>
        <div><img src="{{ $serchMachine[0]->area_img }}" alt=""></div>
    </div>

    <div class="grid5 sp-grid3">
        @foreach ($serchMachine[0]->machineForTrainingAreas as $m_f_t)
            <div class="p10 original-box-shadow">
                <div><a class="a"
                        href="/record/machine/{{ $m_f_t->machine->id }}">{{ $m_f_t->machine->machine_name }}</a></div>
                <div class="mb10">{{ $m_f_t->machine->type }}</div>
                <div class="zoomIn"><a href="/record/machine/{{ $m_f_t->machine->id }}"><span class="mask"><img
                                src="{{ $m_f_t->machine->img }}"></span></a>
                </div>
            </div>
        @endforeach
    </div>

</div>

<style>
    .zoomIn img {
        transform: scale(1);
        transition: .3s ease-in-out;
        /*移り変わる速さを変更したい場合はこの数値を変更*/
    }

    .zoomIn a:hover img {
        /*hoverした時の変化*/
        transform: scale(1.2);
        /*拡大の値を変更したい場合はこの数値を変更*/
    }

    /*　画像のマスク　*/

    .mask {
        display: block;
        line-height: 0;
        /*行の高さを0にする*/
        overflow: hidden;
        /*拡大してはみ出る要素を隠す*/
    }
</style>
