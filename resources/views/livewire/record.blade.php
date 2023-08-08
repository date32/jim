<div class="wi12 ccenter3 sp1 jim-img3">
    <livewire:header />
    <div class="f2 tcenter mt30 mb20">トレーニングの記録</div>


    @if (!count($areaWithTraining) == 0)

        <div class="wrapper b">
            <ul class="tab">
                <li><a href="#total">今までの累計数</a></li>
                <li><a href="#monthTotal">今月の累計数</a></li>
                <li><a href="#machineTotal">マシーン別</a></li>
            </ul>

            {{-- 今までの累計数 --}}
            <div id="total" class="sp1 area">
                <div class="f1-5 tcenter">今までの累計数</div>
                <div class="tcenter mb10">消費カロリー:{{ $calorie }}cal</div>

                <div class="grid3 sp-grid2">
                    @foreach ($areaWithTraining as $area)
                        @php
                            $weight = 0; // 重さの合計を初期化
                            $distance = 0; // 距離の合計を初期化
                            $count = 0; // 回数の合計を初期化
                        @endphp

                        {{-- カード --}}
                        <div class="dis p10 mb10 original-box-shadow flex">
                            {{-- 鍛えるエリアを表示 --}}
                            <div class="wi-60">
                                <div>【{{ $area->training_area }}】</div>

                                @foreach ($area->machineForTrainingAreas as $m_for_ts)
                                    @foreach ($m_for_ts->machine->trainings as $training)
                                        @if ($training->user_id === $loginUserId)
                                            @php
                                                // 合計値を計算
                                                $weight += ($training->weight * $training->count) / 1000;
                                                $distance += $training->distance;
                                                $count += $training->count;
                                            @endphp
                                        @endif
                                    @endforeach
                                @endforeach

                                <div>
                                    @if ($m_for_ts->machine->type === '筋力')
                                        <div>合計: {{ $weight }}t</div>
                                        <div>合計: {{ $count }}回</div>
                                    @endif
                                    @if ($m_for_ts->machine->type === '持久力')
                                        <div>合計: {{ $distance }}km</div>
                                    @endif
                                </div>
                            </div>

                            <div class="wi-40"><img src="{{ $area->area_img }}" alt=""></div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- 今月の累計 --}}
            <div id="monthTotal" class="sp1 area">

                <div class="f1-5 tcenter">{{ $monthNumber }}月の累計数</div>
                <div class="tcenter mb10">消費カロリー:{{ $monthCalorie }}cal</div>
                <div class="grid3 sp-grid2">
                    @foreach ($areaWithTraining as $area)
                        @php
                            $weight = 0; // 重さの合計を初期化
                            $distance = 0; // 距離の合計を初期化
                            $count = 0; // 距離の合計を初期化
                        @endphp

                        {{-- カード --}}
                        <div class="dis p10 mb10 original-box-shadow flex">
                            {{-- 鍛えるエリアを表示 --}}
                            <div class="wi-60">
                                <div>{{ $area->training_area }}</div>

                                @foreach ($area->machineForTrainingAreas as $m_for_ts)
                                    @foreach ($m_for_ts->machine->trainings as $training)
                                        {{-- トレーニング者とログイン者が一緒ならば --}}
                                        @if ($training->user_id === $loginUserId)
                                            {{-- ここで今月だけのif文 今月とデータが作られた月が一緒ならば --}}
                                            @if ($monthNumber == $training->created_at->format('n'))
                                                @php
                                                    // 合計値を計算
                                                    $weight += ($training->weight * $training->count) / 1000;
                                                    $distance += $training->distance;
                                                    $count += $training->count;
                                                @endphp
                                            @endif
                                        @endif
                                    @endforeach
                                @endforeach

                                <div>
                                    @if ($m_for_ts->machine->type === '筋力')
                                        <div>合計: {{ $weight }}t</div>
                                        <div>合計: {{ $count }}回</div>
                                    @endif
                                    @if ($m_for_ts->machine->type === '持久力')
                                        <div>合計: {{ $distance }}km</div>
                                    @endif
                                </div>
                            </div>

                            <div class="wi-40"><img src="{{ $area->area_img }}" alt=""></div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- マシーン別 --}}
            <div id="machineTotal" class="area">
                <div class="f1-5 tcenter mb10">マシーン別<br>トレーニング軌跡</div>

                <div class="grid5 sp-grid3">
                    @foreach ($machines as $machine)
                        <div class="p10 original-box-shadow">
                            <div class="mb10"><a class="a"
                                    href="/record/machine/{{ $machine->id }}">{{ $machine->machine_name }}</a></div>
                            <div class="zoomIn"><a href="/record/machine/{{ $machine->id }}"><span class="mask"><img
                                            src="{{ $machine->img }}"></span></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    @else
        <div class="ccenter3">トレーニングエリア・マシーン名を登録しよう</div>
    @endif

</div>


<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/5-4-1/js/5-4-1.js"></script>
<script>
    //任意のタブにURLからリンクするための設定
    function GethashID(hashIDName) {
        if (hashIDName) {
            //タブ設定
            $('.tab li').find('a').each(function() { //タブ内のaタグ全てを取得
                var idName = $(this).attr('href'); //タブ内のaタグのリンク名（例）#lunchの値を取得 
                if (idName ==
                    hashIDName
                ) { //リンク元の指定されたURLのハッシュタグ（例）http://example.com/#lunch←この#の値とタブ内のリンク名（例）#lunchが同じかをチェック
                    var parentElm = $(this).parent(); //タブ内のaタグの親要素（li）を取得
                    $('.tab li').removeClass("active"); //タブ内のliについているactiveクラスを取り除き
                    $(parentElm).addClass("active"); //リンク元の指定されたURLのハッシュタグとタブ内のリンク名が同じであれば、liにactiveクラスを追加
                    //表示させるエリア設定
                    $(".area").removeClass("is-active"); //もともとついているis-activeクラスを取り除き
                    $(hashIDName).addClass("is-active"); //表示させたいエリアのタブリンク名をクリックしたら、表示エリアにis-activeクラスを追加 
                }
            });
        }
    }

    //タブをクリックしたら
    $('.tab a').on('click', function() {
        var idName = $(this).attr('href'); //タブ内のリンク名を取得  
        GethashID(idName); //設定したタブの読み込みと
        return false; //aタグを無効にする
    });


    // 上記の動きをページが読み込まれたらすぐに動かす
    $(window).on('load', function() {
        $('.tab li:first-of-type').addClass("active"); //最初のliにactiveクラスを追加
        $('.area:first-of-type').addClass("is-active"); //最初の.areaにis-activeクラスを追加
        var hashName = location.hash; //リンク元の指定されたURLのハッシュタグを取得
        GethashID(hashName); //設定したタブの読み込み
    });
</script>
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

    /*========= レイアウトのためのCSS ===============*/


    /*tabの形状*/
    .tab {
        display: flex;
        flex-wrap: wrap;
    }

    .tab li a {
        display: block;
        background: #dddddd7f;
        margin: 0 2px;
        padding: 10px 20px;
    }

    /*liにactiveクラスがついた時の形状*/
    .tab li.active a {
        background: #ffffff26;
    }


    /*エリアの表示非表示と形状*/
    .area {
        display: none;
        /*はじめは非表示*/
        opacity: 0;
        /*透過0*/
        background: #ffffff26;
        padding: 50px 20px;
    }

    /*areaにis-activeというクラスがついた時の形状*/
    .area.is-active {
        display: block;
        /*表示*/
        animation-name: displayAnime;
        /*ふわっと表示させるためのアニメーション*/
        animation-duration: 2s;
        animation-fill-mode: forwards;
    }

    @keyframes displayAnime {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }



    /*========= レイアウトのためのCSS ===============*/

    .wrapper {
        width: 100%;
        max-width: 960px;
        margin: 30px auto;
        background: #ffffff26;
    }

    .area h2 {
        font-size: 1.3rem;
        margin: 0 0 20px 10px;
    }

    .area li {
        padding: 10px;
        border-bottom: 1px solid #dddddd7f;
    }
</style>
