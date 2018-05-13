
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});

((document) => {
  const toggler = document.querySelector('[data-toggle="push"]');
  const target = toggler.dataset.target || toggler.attribute.href || '#sidebar';
  const direction = toggler.dataset.direction || 'right';
  const body = toggler.dataset.canvas || document.getElementsByTagName('main')[0];

  body.classList.add('push-canvas');

  const toggleClass = (element, direction) => {

    if (element.classList) {
      element.classList.toggle(`pushed-${direction}`);
    }

    const classes = element.className.split(' ');
    const index = classes.indexOf(direction);

    if (index >= 0) {
      classes.splice(index, 1);
    }

    element.className = classes.join(' ');
  };

  const toggleExpanded = (selector, closed, open) => {
    const element = document.querySelector(selector);

    element.setAttribute('aria-expanded', element.getAttribute('aria-expanded') === closed ? open : closed);
  };

  toggler.addEventListener('click', (event) => {
    event.preventDefault();
    toggleClass(body, direction);
    toggleExpanded('#sidebar', 'false', 'true');
  }, false);

})(document);
