
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
import VueEcho from 'vue-echo';







Vue.use(VueEcho, {
    broadcaster: 'socket.io',
    host: 'http://localhost:6001'
});
//
// var vm = new Vue({
//     channel: 'channel',
//     echo: {
//         'updateStatus': (payload, vm) => {
//             console.log('blog post created', payload.step.title);
//         },
//         'BlogPostDeleted': (payload, vm) => {
//             console.log('blog post deleted', payload);
//         }
//     }
// });


import Echo from "laravel-echo";
var echo = window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: 'http://localhost:6001'
});

// register
// register

//
//


Vue.component('activity-field',{
    props:['name','status'],
    template: '#temp1',

    mounted(){

        this.listen();

    },
    methods:{
        listen(){
            echo.channel('channel')
                .listen('updateStatus',(e)=>{
                    console.log('this is componnetnt',e.member)
                    if(this.name=='Mr.')
                    this.name="mhsen"
                });
        }
    }
})
//
var app = new Vue({
    el: '#app'
});
//
// echo.channel('tester').listen('UserSignedUp', function (d) {
//     console.log('data', d);
// });