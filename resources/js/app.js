import PerfectScrollbar from 'perfect-scrollbar';
window.PerfectScrollbar = PerfectScrollbar;

const requirejs = require('requirejs');
const jquery = require('jquery');

require('./bootstrap');
require('./custom');
require('summernote');
require('summernote/dist/summernote-bs5.css');
require('summernote/dist/summernote-bs5.js');
