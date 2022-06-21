require('./bootstrap');

import Alpine from 'alpinejs';

import mask from '@alpinejs/mask'
import toggleFullScreen from './components/toggleFullScreen.js'
import slideOver from './components/slideOver.js'

window.Alpine = Alpine;

Alpine.plugin(mask);
Alpine.data('toggleFullScreen', toggleFullScreen);
Alpine.data('slideOver', slideOver);

Alpine.start();
