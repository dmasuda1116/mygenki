@extends('stresscheck.template')

@section('content')

@php
if(!isset($preview)) {
$preview = false;
}
@endphp

<div class="container-fluid">

    @if($preview)
    <!-- プレビューモード -->
    @isset($user_name)
    <div class="custom-font-color">[{{ $user_name }}]さんの記録です。</div>
    @endisset
    <div class="custom-error-font-color">管理者のみ閲覧できます。</div>
    @endif

    <div class="row">
        <div class="col text-center custom-font-color">
            30日間の「{{ config('app.name') }}」
        </div>
    </div>

    <div class="row">
        <div class="col border border-secondary chart-container mx-1"
            style="position: relative; width: 100vw; height:40vmax;">
            <!-- 散布図 -->
            <x-custom-scatter-chart :records="$records" />
        </div>
    </div>

    <div class="row m-3"></div>

    <!-- Session Status -->
    @if (session('status'))
    <div class="row m-3 custom-info-font-color">{{ session('status') }}</div>
    @endif

    <!-- Validation Errors -->
    @if ($errors->any())
    <ul class="row">
        @foreach ($errors->all() as $error)
        <li class="custom-error-font-color">{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <!-- 新規追加 -->
    @unless($preview)
    <div class="row">
        <div class="col">
            <span class="fw-bold custom-font-color">[メモを記録する]</span>
            <button type="button" class="btn btn-primary p-0 mx-1 custom-button" data-bs-toggle="modal"
                data-bs-target="#modalUpdate" data-bs-memo_id="id_XXX">記録</button>
            <br />
            <span class="custom-font-color">☛メモするほど、自分の傾向がわかるようになります。</span><br />
            例えば、何があったのか？ 誰が関係しているのか？<br />
            今の気持ちは？ 状況は？ 理想は？ 改善策は？<br />
        </div>
    </div>
    @endunless

    <!-- メモの更新、削除 -->
    @foreach ($memos as $memo)
    <div class="row">
        <hr class="custom-line-color" />
    </div>
    <div class="row">
        <div class="col">
            <span class="custom-font-color">[{{ date('Y/m/d H:i', strtotime($memo['created_at'])) }}]</span>
            @unless($preview)
            <button type="button" class="btn btn-primary p-0 mx-1 custom-button" data-bs-toggle="modal"
                data-bs-target="#modalUpdate" data-bs-memo_id="{{ $memo['id'] }}">更新</button>
            <button type="button" class="btn btn-primary p-0 mx-1 custom-button" data-bs-toggle="modal"
                data-bs-target="#modalDelete" data-bs-memo_id="{{ $memo['id'] }}">削除</button>
            <br />
            @endunless
            <div id="{{ $memo['id'] }}" class="custom-font-color">{{ $memo['memo'] }}</div>
        </div>
    </div>
    @endforeach

    @unless($preview)

    <div class="row">
        <hr class="custom-line-color" />
    </div>

    <!-- ボタン -->
    <div class="row justify-content-end">
        @if($should_check)
        <!-- 12時間経過 -->
        <a id="return_top_button" class="col-3 btn btn-primary m-1 px-0 text-nowrap custom-button"
            href="{{ route('stresscheck.index') }}">トップへ<br class="d-sm-none" />戻る</a>
        <a id="start_check_button" class="col-3 btn btn-primary m-1 px-0 text-nowrap custom-button"
            href="{{ route('stresscheck.result') }}">結果を<br class="d-sm-none" />表示する</a>
        <a id="start_check_button" class="col-3 btn btn-primary m-1 px-0 text-nowrap custom-main-button"
            href="{{ route('stresscheck.check') }}">チェックを<br class="d-sm-none" />開始する</a>
        @else
        <a id="return_top_button" class="col-3 btn btn-primary m-1 px-0 text-nowrap custom-main-button"
            href="{{ route('stresscheck.index') }}">トップへ<br class="d-sm-none" />戻る</a>
        <a id="start_check_button" class="col-3 btn btn-primary m-1 px-0 text-nowrap custom-button"
            href="{{ route('stresscheck.result') }}">結果を<br class="d-sm-none" />表示する</a>
        <a id="start_check_button" class="col-3 btn btn-primary m-1 px-0 text-nowrap custom-button"
            href="{{ route('stresscheck.check') }}">チェックを<br class="d-sm-none" />開始する</a>
        @endif
    </div>

    <div class="row">
        <hr class="custom-line-color" />
    </div>

    <!-- メールでのお問い合わせ -->
    <form method="POST" id="update_form" action="{{ route('stresscheck.sendmail') }}">
        @csrf

        <div class="row mx-0">
            <div class="col p-0">
                <label for="inquiry" class="col-form-label  custom-font-color">メールフォームでのお問い合わせ</label>
                <ul>
                    <li class="custom-font-color">本システムへのご感想、ご質問をおよせください。</li>
                    <li class="custom-font-color">個別の回答はできませんが、改良の参考にさせていただきます。</li>
                </ul>
                <textarea class="form-control p-0 custom-font-color" id="inquiry" name="inquiry"
                    style="height: calc( 1.3em * 5 ); line-height: 1.3;" maxlength="1024" required></textarea>
                <!-- 高さは５行分 -->
            </div>
        </div>

        <div class="row justify-content-end m-1 p-0">
            @unless(Auth::check())
            <div class="col-2 p-0 align-self-center">
                <label class="form-label custom-font-color m-0 w-100 h-100" for="email">e-Mail(*)</label>
            </div>
            <div class="col p-0">
                <input class="form-control" id="email" type="email" name="email" placeholder="name@example.com" value=""
                    required />
            </div>
            @endunless
            <div class="col-2 p-0">
                <button type="submit" class="btn btn-primary p-0 mx-1 custom-button w-100 h-100">送信</button>
            </div>
        </div>
    </form>

    @endunless

</div>

<!-- //////////////////////////////////////////////////////////////////////////////// -->
<!-- モーダルダイアログ（更新用、追加用） -->
<div class="modal fade" id="modalUpdate" tabindex="-1" data-bs-backdrop="static" aria-labelledby="modalUpdateLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" id="update_form" action="{{ route('stresscheck.record') }}">
                @csrf
                <input type="hidden" id="update_id" name="id" value="">

                <div class="modal-header custom-item-sub-color">
                    <h5 class="modal-title custom-font-color" id="modalUpdateLabel">メモ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="message-memo custom-font-color" class="col-form-label">メモ:</label>
                        <textarea class="form-control p-0 custom-font-color" id="message-memo" name="memo"
                            style="height: calc( 1.3em * 5 ); line-height: 1.3;" maxlength="255" required
                            autofocus></textarea> <!-- ５行 -->
                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary custom-button flex-modal-item-class"
                        data-bs-dismiss="modal">キャンセル</button>
                    <button type="submit" id="update_button"
                        class="btn btn-primary custom-main-button flex-modal-item-class">追加/更新</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // モーダルダイアログ制御（更新用、追加用）
    var modalUpdate = document.getElementById('modalUpdate');
    modalUpdate.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget;
        // Extract info from data-bs-* attributes
        var memoId = button.getAttribute('data-bs-memo_id');
        console.log('Selected(Update/Insert) ID:[' + memoId + ']');
        var element = document.getElementById(memoId);

        var modalTitle = modalUpdate.querySelector('.modal-title');
        var modalBodyInput = modalUpdate.querySelector('.modal-body textarea');

        // Update the modal's content.
        if(element) {
            // 更新
            modalTitle.textContent = 'メモの変更';
            modalBodyInput.value = element.innerText;
            document.getElementById('update_button').innerText = '更新';
            document.getElementById('update_id').value = memoId;
        }
        else {
            // 新規作成
            modalTitle.textContent = 'メモの追加';
            modalBodyInput.value = '';
            document.getElementById('update_button').innerText = '追加';
            document.getElementById('update_id').value = '';
        }
    });
</script>

<!-- モーダルダイアログ（削除用） -->
<div class="modal fade" id="modalDelete" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="modalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" id="delete_form" action="{{ route('stresscheck.record') }}">
                @method('DELETE')
                @csrf
                <input type="hidden" id="delete_id" name="id" value="">

                <div class="modal-header custom-item-sub-color">
                    <h5 class="modal-title custom-font-color" id="staticBackdropLabel">メモの削除</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body custom-font-color">
                    メモを削除します。
                </div>

                <div class="modal-footer d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary custom-button flex-modal-item-class"
                        data-bs-dismiss="modal">キャンセル</button>
                    <button type="submit" id="delete_button"
                        class="btn btn-primary custom-main-button flex-modal-item-class">削除</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // モーダルダイアログ制御（削除用）
    var modalDelete = document.getElementById('modalDelete');
    modalDelete.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget;
        // Extract info from data-bs-* attributes
        var memoId = button.getAttribute('data-bs-memo_id');
        console.log('Selected(Delete) ID:[' + memoId + ']');
        document.getElementById('delete_id').value = memoId;
    });
</script>

@endsection