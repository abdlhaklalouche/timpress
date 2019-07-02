/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window._                  = require('lodash');
    window.Popper             = require('popper.js').default;
    window.$ = window.jQuery  = require('jquery');
    require('bootstrap');
} catch (e) {
  console.error('Error to import javascript libraries or not fully intalled package.json dependencies');
}