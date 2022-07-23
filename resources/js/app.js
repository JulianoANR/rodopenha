

require('./bootstrap');

import Alpine from 'alpinejs';

import mask from '@alpinejs/mask'

import App from './components/Layout';
import ToggleFullScreen from './components/ToggleFullScreen.js'
import SlideOver from './components/SlideOver.js'
import SelectUser from './components/selects/SelectUser.js'
import SelectAsync from './components/selects/SelectAsync';
import CreateVehicle from "./components/vehicle/CreateVehicle";

window.Alpine = Alpine;

Alpine.plugin(mask);
Alpine.data('App', App);
Alpine.data('ToggleFullScreen', ToggleFullScreen);
Alpine.data('SlideOver', SlideOver);
Alpine.data('SelectAsync', SelectAsync);
Alpine.data('SelectUser', SelectUser);
Alpine.data('CreateVehicle', CreateVehicle);

Alpine.start();
