let mix = require('laravel-mix');

const dependencies = () => {
  return [
    'lodash',
    'chart.js',
    'feather-icons',
    'popper.js',
    'jquery',
    'bootstrap',
    'select2',
    'axios',
    'vue',
  ];
};

mix.js('resources/assets/js/app.js', 'public/js')
  .extract(dependencies())
  .sass('resources/assets/sass/app.scss', 'public/css');
