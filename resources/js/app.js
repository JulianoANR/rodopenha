require('./bootstrap');

import Alpine from 'alpinejs';
import mask from '@alpinejs/mask'
import collapse from '@alpinejs/collapse'

/**
 * Components alpine
 */
import App from './components/Layout';
import ToggleFullScreen from './components/ToggleFullScreen.js'
import SlideOver from './components/SlideOver.js'
import SelectUser from './components/selects/SelectUser.js'
import SelectAsync from './components/selects/SelectAsync';

window.Alpine = Alpine;

Alpine.plugin(mask);
Alpine.plugin(collapse);
Alpine.data('App', App);
Alpine.data('ToggleFullScreen', ToggleFullScreen);
Alpine.data('SlideOver', SlideOver);
Alpine.data('SelectAsync', SelectAsync);
Alpine.data('SelectUser', SelectUser);

Alpine.start();
