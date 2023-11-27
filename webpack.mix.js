const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

// JavaScript/CSSのコンパイル（resourceフォルダから、コンパイルし、publicフォルダへコピーされる。）
mix.js("resources/js/app.js", "public/js")
    // JavaScript
    .scripts(
        "resources/js/bootstrap.bundle.js",
        "public/js/bootstrap.bundle.js"
    ) // 追加（バニラJS）
    .copy("resources/js/bootstrap.bundle.js.map", "public/js")
    .js("resources/js/Chart.bundle.js", "public/js") // 追加
    .js("resources/js/custom.js", "public/js") // 追加

    // CSS
    .postCss("resources/css/app.css", "public/css", [
        require("postcss-import"),
        require("tailwindcss"),
        require("autoprefixer"),
    ])
    .copy("resources/css/bootstrap.css.map", "public/css")
    .postCss("resources/css/bootstrap.css", "public/css") // 追加
    .postCss("resources/css/Chart.css", "public/css") // 追加
    .postCss("resources/css/custom.css", "public/css"); // 追加

// 変更後は、必ずコンパイルすること。
// [sail npm run dev] or [sail npm run prod]
// <https://readouble.com/laravel/8.x/ja/mix.html>

/*
// 初期設定
mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
*/
