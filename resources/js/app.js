require('./bootstrap');

import Alpine from 'alpinejs';

import mask from '@alpinejs/mask'
import toggleFullScreen from './components/ToggleFullScreen.js'
import slideOver from './components/SlideOver.js'

import select from './components/selects/Select.js'
import selectUser from './components/selects/SelectUser.js'

window.Alpine = Alpine;

Alpine.plugin(mask);
Alpine.data('toggleFullScreen', toggleFullScreen);
Alpine.data('slideOver', slideOver);
Alpine.data('select', select);
Alpine.data('selectUser', selectUser);

Alpine.start();
