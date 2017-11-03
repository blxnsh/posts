import VueRouter from 'vue-router';

let routes = [
  {
    name: 'main',
    path: '/',
    component: require('./components/main')
  },
  {
    name: 'post',
    path: '/post/:id',
    component: require('./components/singlepost')
  }
];

export default new VueRouter({
  routes
  });
