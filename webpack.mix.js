let mix = require('laravel-mix');

mix.webpackConfig({
  externals: {
    jquery: 'jQuery'
  }
});

mix.sass('src/scss/style.scss', 'assets/css/main.css')
   .sass('src/scss/style-editor.scss', 'assets/css/editor.css')
   .sass('src/scss/style-login.scss', 'assets/css/login.css');

mix.js('src/js/main.js', 'assets/js/main.js')
   .js('src/js/editor.js','assets/js/editor.js');