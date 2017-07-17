/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('vue2-animate/dist/vue2-animate.min.css')
window.Vue = require('vue');
var VueResource = require('vue-resource');

Vue.use(VueResource);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
import VueEcho from 'vue-echo';

Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');

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
var sdf;
Vue.component('activity', {
    props: ['act'],
    data(){
        return {
            isshow: true
        }
    }


});

Vue.component('activities', {
    props: ['name', 'status'],
    data(){
        return {
            list: []
            ,
            sss: true
            , search: "",
            step: ''
            , steps: []
            , add: ''
            , nextsteps: []
            , nextStep: ''
            , memiId: ''
            , nextStepId: ''
        }

    },
    template: '#temp1',

    mounted(){
        this.listen();
        this.getSteps();
        // this.updateCSRF();

        this.getlist();

    },
    methods: {
        listen(){
            echo.channel('channel')
                .listen('updateStatus', (e) => {
                    // this.additem()
                    // const item = this.list.find(e.activity)
                    // console.log(this.list.indexOf(e.activity))
                    // console.log(e.activity)
                    // console.log(this.list[3])

                    for (var i in this.list) {
                        if (this.list[i].id == e.activity.id) {
                            this.list[i].status = e.activity.status
                            this.list[i].startTime = e.activity.startTime
                            this.list[i].arrivalTime = e.activity.arrivalTime
                            this.list[i].endTime = e.activity.endTime
                            console.log(i)
                        }
                    }
                });
            echo.channel('channel').listen('add', (e) => {

                console.log("list", this.list)
                console.log("len", this.list.length)
                this.list.push(e.activity);
                console.log("len2", this.list.length)
                console.log('listafterdone', this.list[this.list.length-1])


            })
        }
        , getlist(){

            // console.log('csrf:', Vue.http.headers.common['X-CSRF-TOKEN'])
            this.$http.post('/getActivities').then(response => {

                // for (var i = 0; i < response.body.length; i++) {
                //     this.list.push(response.body[i])
                // }
                this.list = response.body

            })


        }
        , additem(){

            this.list.push(this.list[0])
        }
        , filterby(value, step){
            return this.list.filter(function (item) {
                return (item.member.name.indexOf(value) > -1) && (item.step.title == step || step == "all");
            });
        }
        ,
        getSteps(){

            this.$http.post('/getSteps').then(response => {

                this.steps = response.body
            })
        }
        ,
        updateCSRF(){
            this.$http.get('csrf').then(response => {
                Vue.http.headers.common['X-CSRF-TOKEN'] = response.body;

            })
        }
        ,
        start(item){

            this.$http.get("/start/" + item.member.id + '/' + item.step_id).then(response => {

            });

        }, done(item){

            this.$http.post("/done/" + item.member.id + '/' + item.step_id).then(response => {

            });
            this.$http.post('remainingSteps/' + item.member.id).then(respons => {
                this.nextsteps = respons.body
                this.nextStepId = this.nextsteps[0].id
            })
            this.memiId = item.member.id
            $('#doneModal').modal('show')


        }
        , doneClick(){
            this.$http.get("/newStep/" + this.memiId + '/' + this.nextStepId).then(response => {

            });
            $('#doneModal').modal('hide')

        }
    }
})

var app = new Vue({
    el: '#app',
    showArray: []
});
//
// echo.channel('tester').listen('UserSignedUp', function (d) {
//     console.log('data', d);
// });
