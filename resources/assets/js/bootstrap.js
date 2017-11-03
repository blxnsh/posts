import VueRouter from 'vue-router';
import Crud from './core/crud';
import swal from 'sweetalert';
import Vue from 'vue';
import VueQuillEditor from 'vue-quill-editor';

window.Vue = require('vue');
window.axios = require('axios');
window.Crud = Crud;
Vue.use(VueRouter);
Vue.use(VueQuillEditor);

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
