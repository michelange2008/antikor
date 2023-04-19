// import './bootstrap';
import './antikor';

import.meta.glob([
    '../images/**',
    '../fonts/**',
  ]);

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus'
// import collapse from '@alpinejs/collapse';

// Alpine.plugin(collapse);
window.Alpine = Alpine;
Alpine.plugin(focus)
Alpine.start();

