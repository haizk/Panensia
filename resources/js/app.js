import './bootstrap'

import { createApp } from 'vue'

import App from './App.vue'
import router from './router'
// require('../../public/assets/css/aos.css');
// require('../../public/assets/img/fav-icon.png');
// require('../../public/assets/css/color.css');
// require('../../public/assets/css/jquery.fancybox.min.css');
// require('../../public/assets/css/nice-select.css');
// require('../../public/assets/css/owl.carousel.min.css');
// require('../../public/assets/css/owl.theme.default.min.css');
// require('../../public/assets/css/responsive.css');
// require('../../public/assets/css/style.css');
// require('https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css');
// require('https://kit.fontawesome.com/27a041baf1.js');


const app = createApp(App)

app.use(router)

alert('app.js is working!')

app.mount('#app')
