import './bootstrap';

import Alpine from 'alpinejs';
import axios from 'axios';

// Mengatur axios global jika perlu
window.axios = axios;
axios.defaults.baseURL = 'http://tesdesa.test/api';  // Sesuaikan dengan URL API Anda

// Set Axios Header jika diperlukan (misalnya untuk token autentikasi)
axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token'); // Atau dari cookie

window.Alpine = Alpine;

Alpine.start();
