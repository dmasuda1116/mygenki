@extends('stresscheck.template')

@section('content')

@php
$page_list = [];

// ページ１
array_push($page_list, [
'category' => 'category_society',
'title' => '笑顔であいさつをしている',
'choices' => [
['value' => '40', 'label' => 'はい'],
['value' => '30', 'label' => 'まあ<br class="d-sm-none" />そうだ'],
['value' => '20', 'label' => 'やや<br class="d-sm-none" />ちがう'],
['value' => '10', 'label' => 'いいえ'],
],
]);

// ページ２
array_push($page_list, [
'category' => 'category_mental',
'title' => '愚痴がよく出る',
'choices' => [
['value' => '10', 'label' => 'はい'],
['value' => '20', 'label' => 'まあ<br class="d-sm-none" />そうだ'],
['value' => '30', 'label' => 'やや<br class="d-sm-none" />ちがう'],
['value' => '40', 'label' => 'いいえ'],
],
]);

// ページ３
array_push($page_list, [
'category' => 'category_life',
'title' => '実現したい夢・目標がある',
'choices' => [
['value' => '40', 'label' => 'はい'],
['value' => '30', 'label' => 'まあ<br class="d-sm-none" />そうだ'],
['value' => '20', 'label' => 'やや<br class="d-sm-none" />ちがう'],
['value' => '10', 'label' => 'いいえ'],
],
]);

// ページ４
array_push($page_list, [
'category' => 'category_physical',
'title' => 'おいしく食べられていない',
'choices' => [
['value' => '10', 'label' => 'はい'],
['value' => '20', 'label' => 'まあ<br class="d-sm-none" />そうだ'],
['value' => '30', 'label' => 'やや<br class="d-sm-none" />ちがう'],
['value' => '40', 'label' => 'いいえ'],
],
]);

// ページ５
array_push($page_list, [
'category' => 'category_society',
'title' => '仕事に集中できている',
'choices' => [
['value' => '40', 'label' => 'はい'],
['value' => '30', 'label' => 'まあ<br class="d-sm-none" />そうだ'],
['value' => '20', 'label' => 'やや<br class="d-sm-none" />ちがう'],
['value' => '10', 'label' => 'いいえ'],
],
]);

// ページ６
array_push($page_list, [
'category' => 'category_mental',
'title' => '気分が沈んでいる',
'choices' => [
['value' => '10', 'label' => 'はい'],
['value' => '20', 'label' => 'まあ<br class="d-sm-none" />そうだ'],
['value' => '30', 'label' => 'やや<br class="d-sm-none" />ちがう'],
['value' => '40', 'label' => 'いいえ'],
],
]);

// ページ７
array_push($page_list, [
'category' => 'category_life',
'title' => '公私ともに楽しめている',
'choices' => [
['value' => '40', 'label' => 'はい'],
['value' => '30', 'label' => 'まあ<br class="d-sm-none" />そうだ'],
['value' => '20', 'label' => 'やや<br class="d-sm-none" />ちがう'],
['value' => '10', 'label' => 'いいえ'],
],
]);

// ページ８
array_push($page_list, [
'category' => 'category_physical',
'title' => 'よく眠れていない',
'choices' => [
['value' => '10', 'label' => 'はい'],
['value' => '20', 'label' => 'まあ<br class="d-sm-none" />そうだ'],
['value' => '30', 'label' => 'やや<br class="d-sm-none" />ちがう'],
['value' => '40', 'label' => 'いいえ'],
],
]);

// ページ９
array_push($page_list, [
'category' => 'category_society',
'title' => '自他との約束を守っている',
'choices' => [
['value' => '40', 'label' => 'はい'],
['value' => '30', 'label' => 'まあ<br class="d-sm-none" />そうだ'],
['value' => '20', 'label' => 'やや<br class="d-sm-none" />ちがう'],
['value' => '10', 'label' => 'いいえ'],
],
]);

// ページ10
array_push($page_list, [
'category' => 'category_mental',
'title' => 'イライラしている',
'choices' => [
['value' => '10', 'label' => 'はい'],
['value' => '20', 'label' => 'まあ<br class="d-sm-none" />そうだ'],
['value' => '30', 'label' => 'やや<br class="d-sm-none" />ちがう'],
['value' => '40', 'label' => 'いいえ'],
],
]);

// ページ11
array_push($page_list, [
'category' => 'category_life',
'title' => '自分の意思で行動している',
'choices' => [
['value' => '40', 'label' => 'はい'],
['value' => '30', 'label' => 'まあ<br class="d-sm-none" />そうだ'],
['value' => '20', 'label' => 'やや<br class="d-sm-none" />ちがう'],
['value' => '10', 'label' => 'いいえ'],
],
]);

// ページ12
array_push($page_list, [
'category' => 'category_physical',
'title' => '頭痛・腰痛など、<br class="d-sm-none" />痛い所がある',
'choices' => [
['value' => '10', 'label' => 'はい'],
['value' => '20', 'label' => 'まあ<br class="d-sm-none" />そうだ'],
['value' => '30', 'label' => 'やや<br class="d-sm-none" />ちがう'],
['value' => '40', 'label' => 'いいえ'],
],
]);

// ページ13
array_push($page_list, [
'category' => 'category_society',
'title' => '家族との関係を<br class="d-sm-none" />大切にしている',
'choices' => [
['value' => '40', 'label' => 'はい'],
['value' => '30', 'label' => 'まあ<br class="d-sm-none" />そうだ'],
['value' => '20', 'label' => 'やや<br class="d-sm-none" />ちがう'],
['value' => '10', 'label' => 'いいえ'],
],
]);

// ページ14
array_push($page_list, [
'category' => 'category_mental',
'title' => 'やる気が出ない',
'choices' => [
['value' => '10', 'label' => 'はい'],
['value' => '20', 'label' => 'まあ<br class="d-sm-none" />そうだ'],
['value' => '30', 'label' => 'やや<br class="d-sm-none" />ちがう'],
['value' => '40', 'label' => 'いいえ'],
],
]);

// ページ15
array_push($page_list, [
'category' => 'category_life',
'title' => 'リラックスする時間がある',
'choices' => [
['value' => '40', 'label' => 'はい'],
['value' => '30', 'label' => 'まあ<br class="d-sm-none" />そうだ'],
['value' => '20', 'label' => 'やや<br class="d-sm-none" />ちがう'],
['value' => '10', 'label' => 'いいえ'],
],
]);

// ページ16
array_push($page_list, [
'category' => 'category_physical',
'title' => '便秘や下痢をする',
'choices' => [
['value' => '10', 'label' => 'はい'],
['value' => '20', 'label' => 'まあ<br class="d-sm-none" />そうだ'],
['value' => '30', 'label' => 'やや<br class="d-sm-none" />ちがう'],
['value' => '40', 'label' => 'いいえ'],
],
]);

// ページ17
array_push($page_list, [
'category' => 'category_society',
'title' => '人づきあいが<br class="d-sm-none" />うまくいっている',
'choices' => [
['value' => '40', 'label' => 'はい'],
['value' => '30', 'label' => 'まあ<br class="d-sm-none" />そうだ'],
['value' => '20', 'label' => 'やや<br class="d-sm-none" />ちがう'],
['value' => '10', 'label' => 'いいえ'],
],
]);

// ページ18
array_push($page_list, [
'category' => 'category_mental',
'title' => 'ネガティブな考え方に<br class="d-sm-none" />よくなる',
'choices' => [
['value' => '10', 'label' => 'はい'],
['value' => '20', 'label' => 'まあ<br class="d-sm-none" />そうだ'],
['value' => '30', 'label' => 'やや<br class="d-sm-none" />ちがう'],
['value' => '40', 'label' => 'いいえ'],
],
]);

// ページ19
array_push($page_list, [
'category' => 'category_life',
'title' => '朝を迎えるのがうれしい',
'choices' => [
['value' => '40', 'label' => 'はい'],
['value' => '30', 'label' => 'まあ<br class="d-sm-none" />そうだ'],
['value' => '20', 'label' => 'やや<br class="d-sm-none" />ちがう'],
['value' => '10', 'label' => 'いいえ'],
],
]);

// ページ20
array_push($page_list, [
'category' => 'category_physical',
'title' => '運動の習慣がない',
'choices' => [
['value' => '10', 'label' => 'はい'],
['value' => '20', 'label' => 'まあ<br class="d-sm-none" />そうだ'],
['value' => '30', 'label' => 'やや<br class="d-sm-none" />ちがう'],
['value' => '40', 'label' => 'いいえ'],
],
]);

// ページ21
array_push($page_list, [
'category' => 'category_society',
'title' => '職場に信頼できる人がいる',
'choices' => [
['value' => '40', 'label' => 'はい'],
['value' => '30', 'label' => 'まあ<br class="d-sm-none" />そうだ'],
['value' => '20', 'label' => 'やや<br class="d-sm-none" />ちがう'],
['value' => '10', 'label' => 'いいえ'],
],
]);

// ページ22
array_push($page_list, [
'category' => 'category_mental',
'title' => '不安・不満を引きずる',
'choices' => [
['value' => '10', 'label' => 'はい'],
['value' => '20', 'label' => 'まあ<br class="d-sm-none" />そうだ'],
['value' => '30', 'label' => 'やや<br class="d-sm-none" />ちがう'],
['value' => '40', 'label' => 'いいえ'],
],
]);

// ページ23
array_push($page_list, [
'category' => 'category_life',
'title' => 'ものを大事に扱っている',
'choices' => [
['value' => '40', 'label' => 'はい'],
['value' => '30', 'label' => 'まあ<br class="d-sm-none" />そうだ'],
['value' => '20', 'label' => 'やや<br class="d-sm-none" />ちがう'],
['value' => '10', 'label' => 'いいえ'],
],
]);

// ページ24
array_push($page_list, [
'category' => 'category_physical',
'title' => '体重管理ができていない',
'choices' => [
['value' => '10', 'label' => 'はい'],
['value' => '20', 'label' => 'まあ<br class="d-sm-none" />そうだ'],
['value' => '30', 'label' => 'やや<br class="d-sm-none" />ちがう'],
['value' => '40', 'label' => 'いいえ'],
],
]);

// ページ25
array_push($page_list, [
'category' => 'category_society',
'title' => '人から感謝されることがある',
'choices' => [
['value' => '40', 'label' => 'はい'],
['value' => '30', 'label' => 'まあ<br class="d-sm-none" />そうだ'],
['value' => '20', 'label' => 'やや<br class="d-sm-none" />ちがう'],
['value' => '10', 'label' => 'いいえ'],
],
]);

// ページ26
array_push($page_list, [
'category' => 'category_mental',
'title' => '決められないことが増えた',
'choices' => [
['value' => '10', 'label' => 'はい'],
['value' => '20', 'label' => 'まあ<br class="d-sm-none" />そうだ'],
['value' => '30', 'label' => 'やや<br class="d-sm-none" />ちがう'],
['value' => '40', 'label' => 'いいえ'],
],
]);

// ページ27
array_push($page_list, [
'category' => 'category_life',
'title' => 'なんとかなる！と思えている',
'choices' => [
['value' => '40', 'label' => 'はい'],
['value' => '30', 'label' => 'まあ<br class="d-sm-none" />そうだ'],
['value' => '20', 'label' => 'やや<br class="d-sm-none" />ちがう'],
['value' => '10', 'label' => 'いいえ'],
],
]);

// ページ28
array_push($page_list, [
'category' => 'category_physical',
'title' => '疲れがとれない',
'choices' => [
['value' => '10', 'label' => 'はい'],
['value' => '20', 'label' => 'まあ<br class="d-sm-none" />そうだ'],
['value' => '30', 'label' => 'やや<br class="d-sm-none" />ちがう'],
['value' => '40', 'label' => 'いいえ'],
],
]);

if(!Auth::check()) {
// 性別
/*
array_push($page_list, [
'category' => 'category_gender',
'title' => '性別を選択してください',
'choices' => [
['value' => 'male', 'label' => '男性'],
['value' => 'female', 'label' => '女性'],
],
]);
*/

// 年代
array_push($page_list, [
'category' => 'category_generation',
'title' => '年代を選択してください',
'choices' => [
['value' => '10', 'label' => '19才<br class="d-sm-none" />以下'],
['value' => '20', 'label' => '20代'],
['value' => '30', 'label' => '30代'],
['value' => '40', 'label' => '40代'],
['value' => '50', 'label' => '50代'],
['value' => '60', 'label' => '60代'],
['value' => '70', 'label' => '70代'],
['value' => '80', 'label' => '80才<br class="d-sm-none" />以上'],
],
]);
}

@endphp

<!-- //////////////////////////////////////////////////////////////////////////////// -->
<div class="container-fluid px-1">
  <div class="row">
    <div class="col mt-1">

      <div id="checkCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- インジケーター -->
        <div class="carousel-indicators">
          @foreach ($page_list as $page)
          <button type="button" data-bs-target="#checkCarousel" data-bs-slide-to="{{$loop->index}}"
            aria-label="Slide {{$loop->index+1}}" class="custom-main-button {{ ($loop->first)? 'active':'' }}"
            aria-current="true"></button>
          @endforeach
        </div>

        <!-- カルーセル -->
        <div class="carousel-inner">
          @foreach ($page_list as $page)
          <!-- ページ{{sprintf('%02d', $loop->index+1)}} -->
          <div class="carousel-item page-class {{ ($loop->first)? 'active':'' }}" data-category="{{$page['category']}}">

            <div class="carousel-caption">
              <h1 class="custom-font-color" style="height:2em; vertical-align: middle;">{!!$page['title']!!}</h1>

              <fieldset class="flex-container-class">
                @foreach ($page['choices'] as $index => $choice)
                <input type="radio" name="item{{sprintf('%02d', $loop->parent->index+1)}}" value="{{$choice['value']}}"
                  id="item{{sprintf('%02d', $loop->parent->index+1)}}-{{$loop->index+1}}">
                <label class="flex-item-class flex-center-class custom-radio m-1"
                  for="item{{sprintf('%02d', $loop->parent->index+1)}}-{{$loop->index+1}}">{!!$choice['label']!!}</label>
                @endforeach
              </fieldset>

            </div>
          </div>
          @endforeach

          <!-- 左右ボタン -->
          <button class="carousel-control-prev" type="button" data-bs-target="#checkCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: #31b56a;"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#checkCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: #31b56a"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>

      </div>
    </div>
  </div>

  <div class="row px-3 justify-content-end">
    <a class="col-4 btn btn-primary m-1 px-0 text-nowrap custom-button" href="{{ route('stresscheck.index') }}">トップへ<br
        class="d-sm-none" />戻る</a>
    <button id="show_result_button" class="col-4 btn btn-primary m-1 px-0 text-nowrap custom-main-button"
      style="display:none;">結果を<br class="d-sm-none" />表示する</button>
  </div>

</div>

<script>
  ////////////////////////////////////////////////////////////////////////////////
  // 定義部
  ////////////////////////////////////////////////////////////////////////////////
  // ButtonGroupクラス
  // １ページ内に表示される選択ボタン群(RadioButton)のクラス。RadioButtonを配列にもつ。
  class ButtonGroup {
      constructor(domButtonList, category) {
          // 質問の分類
          // 性別：data-category='category_gender'（ユーザー登録が未の場合）
          // 年齢：data-category='category_generation'（ユーザー登録が未の場合）
          // 心理：data-category='category_mental'
          // 身体：data-category='category_physical'
          // 生活：data-category='category_life'
          // 社会：data-category='category_society'
          this.category = category || 'category_none';

          // RadioButton(Inputタグ)の配列
          this.buttons = [];

          domButtonList.forEach((domButton) => {
              // クリックイベント
              var onClicked = function (event) {
                  console.log('Clicked Button:[' + domButton.value + ']');
                  //StressCheck.pageGroup.dump();

                  // 結果表示可能か判定
                  if (pageGroup.isCompleted()) {
                      resultButton.show();
                  } else {
                      resultButton.hide();
                  }

                  // 次画面へ
                  carousel.next();
              };
              domButton.addEventListener('click', onClicked.bind(domButton));

              this.buttons.push(domButton);
          });
      }

      // 選択されている値取得する（未選択の場合はnull）
      getValue() {
          var value = null;
          this.buttons.forEach((domButton) => {
              if (domButton.checked) {
                  value = domButton.value;
              }
          });
          return value;
      }
      hasValue() {
          if (this.getValue() != null) {
              return true;
          } else {
              return false;
          }
      }
      findButton(value) {
        for (var index = 0; index < this.buttons.length; index++) {
          var domButton = this.buttons[index];
          if(domButton.value == value) {
            return domButton;
          }
        }
        return null;
      }
      toString() {
          var text = '';
          for (var index = 0; index < this.buttons.length; index++) {
              var domButton = this.buttons[index];
              if (text.length > 0) {
                  text += ', ';
              }
              text += '[' + domButton.value + ']:[' + domButton.checked + ']';
          }
          return text;
      }
  }

  ////////////////////////////////////////////////////////////////////////////////
  // PageGroupクラス
  // 全ての質問結果を保持するクラス。ButtonGroupクラスのインスタンスを配列に持つ。
  class PageGroup {
      constructor(domCarouselItemList) {
          this.buttonGroups = [];

          domCarouselItemList.forEach((domCarouselItem) => {
              var domButtonList = domCarouselItem.querySelectorAll(
                'input[type=radio]'
              ); // domのラジオボタン
              var category = domCarouselItem.getAttribute('data-category');
              this.buttonGroups.push(
                  new ButtonGroup(domButtonList, category)
              );
          });
      }

      getTotalValue() {
          var total = 0;
          this.buttonGroups.forEach((buttonGroup) => {
              if (buttonGroup.hasValue()) {
                var value = Number(buttonGroup.getValue());
                if(!isNaN(value)) {
                  // 数値のみ加算
                  total += value;
                }
              }
          });
          return total;
      }

      // チェック結果をカテゴリごとに分類してMap<string, List<intger>>で戻す。
      // { category_society:[10, 20, 40, 40], category_physical:[40, 30, 20, 10] }
      createClassifiedMap() {
          var map = {};
          this.buttonGroups.forEach((buttonGroup) => {
              map[buttonGroup.category] = map[buttonGroup.category] || [];
              var list = map[buttonGroup.category];
              list.push(buttonGroup.getValue() || 0);
          });
          return map;
      }

      // Json形式の文字列に変換する。
      // [ { value:40, category:"category_physical" }, { value:20, category:"category_society" } ]
      createClassifiedList() {
          var list = [];
          this.buttonGroups.forEach((buttonGroup) => {
              var map = {};
              map['value'] = buttonGroup.getValue() || 0;
              map['category'] = buttonGroup.category;
              list.push(map);
          });
          return list;
      }

      isCompleted() {
          return this.buttonGroups.every((buttonGroup) => {
              return buttonGroup.hasValue();
          });
      }

      isMovable(position) {
          if (position == 0) {
              return true;
          } else if (0 < position && position < this.buttonGroups.length) {
              // ひとつ前が選択済ならOK
              if (this.buttonGroups[position - 1].hasValue()) {
                  return true;
              }
          }
          return false;
      }

      // デバッグ用
      dump() {
          for (var index = 0; index < this.buttonGroups.length; index++) {
              var buttonGroup = this.buttonGroups[index];
              console.log('[' + index + ']: ' + buttonGroup.toString());
          }
      }
      // 指定したレベルで選択する
      setLevel(level) {
        level = level || 0;

        // レベルにあった選択肢
        var choiceArray = {
          0:[ // Total:280
            10, 10, 10, 10, 10, 10, 10, 10, 10, 10,
            10, 10, 10, 10, 10, 10, 10, 10, 10, 10,
            10, 10, 10, 10, 10, 10, 10, 10,
          ],
          1:[ // Total:280
            10, 10, 10, 10, 10, 10, 10, 10, 10, 10,
            10, 10, 10, 10, 10, 10, 10, 10, 10, 10,
            10, 10, 10, 10, 10, 10, 10, 10,
          ],
          2:[ // Total:350
            40, 40, 20, 10, 10, 10, 10, 10, 10, 10,
            10, 10, 10, 10, 10, 10, 10, 10, 10, 10,
            10, 10, 10, 10, 10, 10, 10, 10,
          ],
          3:[ // Total:470
            40, 40, 40, 40, 40, 40, 20, 10, 10, 10,
            10, 10, 10, 10, 10, 10, 10, 10, 10, 10,
            10, 10, 10, 10, 10, 10, 10, 10,
          ],
          4:[ // Total:580
            40, 40, 40, 40, 40, 40, 40, 40, 40, 40,
            10, 10, 10, 10, 10, 10, 10, 10, 10, 10,
            10, 10, 10, 10, 10, 10, 10, 10,
          ],
          5:[ // Total:690
            40, 40, 40, 40, 40, 40, 40, 40, 40, 40,
            40, 40, 40, 30, 10, 10, 10, 10, 10, 10,
            10, 10, 10, 10, 10, 10, 10, 10,
          ],
          6:[ // Total:800
            40, 40, 40, 40, 40, 40, 40, 40, 40, 40,
            40, 40, 40, 40, 40, 40, 40, 20, 10, 10,
            10, 10, 10, 10, 10, 10, 10, 10,
          ],
          7:[ // Total:910
            40, 40, 40, 40, 40, 40, 40, 40, 40, 40,
            40, 40, 40, 40, 40, 40, 40, 40, 40, 40,
            40, 10, 10, 10, 10, 10, 10, 10,
          ],
          8:[ // Total:1120
            40, 40, 40, 40, 40, 40, 40, 40, 40, 40,
            40, 40, 40, 40, 40, 40, 40, 40, 40, 40,
            40, 40, 40, 40, 40, 40, 40, 40,
          ],
        };

        var categoryKeyList = {
          'category_mental':true,
          'category_physical':true,
          'category_life':true,
          'category_society':true,
        };

        var current = 0;
        for (var index = 0; index < this.buttonGroups.length; index++) {
            var buttonGroup = this.buttonGroups[index];

            var button = null;
            if(categoryKeyList[buttonGroup.category]) {
              // 性別、年齢以外なら
              button = buttonGroup.findButton(choiceArray[level][current]);
              current++;
            }
            else {
              button = buttonGroup.buttons[0]; // 最初のボタン
            }

            if(button) {
              button.click();
            }
            else {
              console.error('button is null. Value:[' + choiceArray[level][index] + ']');
              break;
            }
        }
      }
  }

  ////////////////////////////////////////////////////////////////////////////////
  // 処理部
  // インスタンス作成
  var pageGroup = new PageGroup(window.document.querySelectorAll('.carousel-item'));

  ////////////////////////////////////////////////////////////////////////////////
  // カルーセル
  var checkCarousel = window.document.querySelector('#checkCarousel');
  var carousel = new bootstrap.Carousel(checkCarousel, {
    interval: false, // 自動スクロールをoffにする（HTML部のdata-bs-interval属性でintervalをfalseに指定することはできない）
    wrap: false // 循環スクロール不可にする
  });
  // カレント位置取得
  carousel.getCurrentPosition = function () {
    var itemList = carousel._items || [];
    for (var index = 0; index < itemList.length; index++) {
      if (itemList[index].classList.contains('active')) {
        return index;
      }
    }
    return 0;
  };
  // Hook
  // 左スライド、左矢印
  var orgPrev = carousel.prev;
  carousel.prev = function () {
    console.log('← Position:[' + carousel.getCurrentPosition() + ']');

    var currentPosition = carousel.getCurrentPosition();
    if (pageGroup.isMovable(currentPosition - 1)) {
      return orgPrev.apply(carousel, arguments);
    }
  };
  // 右スライド、右矢印
  var orgNext = carousel.next;
  carousel.next = function () {
    console.log('→ Position:[' + carousel.getCurrentPosition() + ']');

    var currentPosition = carousel.getCurrentPosition();
    if (pageGroup.isMovable(currentPosition + 1)) {
      return orgNext.apply(carousel, arguments);
    }
  };
  // インジケーター
  var orgTo = carousel.to;
  carousel.to = function (index) {
    console.log('To Index:[' + index + '], Position:[' + carousel.getCurrentPosition() + ']');

    if (pageGroup.isMovable(index)) {
      return orgTo.apply(carousel, arguments);
    }
  };

  // イベントリスナー登録
  checkCarousel.addEventListener('slide.bs.carousel', function (event) {
    try {
      console.log('Slide Direction:[' + event.direction + '], RelatedTarget:[' + event.relatedTarget.id + '], From:[' + event.from + '], To:[' + event.to + '], Position:[' + carousel.getCurrentPosition() + '], Date:[' + StressCheck.formatDate() + ']');
    }
    catch (error) {
      console.error(error);
    }
  });

  checkCarousel.addEventListener('slid.bs.carousel', function (event) {
    try {
      console.log('Slid Direction:[' + event.direction + '], RelatedTarget:[' + event.relatedTarget.id + '], From:[' + event.from + '], To:[' + event.to + '], Position:[' + carousel.getCurrentPosition() + '], Date:[' + StressCheck.formatDate() + ']');
    }
    catch (error) {
      console.error(error);
    }
  });

  ////////////////////////////////////////////////////////////////////////////////
  // 結果表示ボタン
  var resultButton = StressCheck.createBootstrapButton(window.document.getElementById('show_result_button'));
  resultButton._element.addEventListener('click', function (event) {
    try {
      console.log('Result Button is clicked.');
      var list = pageGroup.createClassifiedList();

      // JSON形式でPOST
      document.getElementById('form_data').value = JSON.stringify(list);
      document.getElementById('form').submit();
    }
    catch (error) {
      console.error(error);
    }
  });
</script>

<form method="POST" action="{{ route('stresscheck.result') }}" id="form">
  @csrf
  <input type="hidden" id="form_data" name="form_data" value="">
</form>

@endsection