// import './bootstrap';
import './antikor';

import.meta.glob([
    '../images/**',
    '../fonts/**',
  ]);

// import Alpine from 'alpinejs';
// import collapse from '@alpinejs/collapse';
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import focus from '@alpinejs/focus'
// import Alpine from 'alpinejs';
// Alpine.plugin(collapse);
// window.Alpine = Alpine;
Alpine.plugin(focus)
// Alpine.start();
Livewire.start();
