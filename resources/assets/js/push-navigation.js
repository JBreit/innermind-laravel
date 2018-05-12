const toggler = document.querySelector('[data-toggle="push"]');
const target = toggler.dataset.target || toggler.attribute.href || '#sidebar';
const direction = toggler.dataset.direction || 'right';
const body = toggler.dataset.canvas || document.getElementsByTagName('body')[0];

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
