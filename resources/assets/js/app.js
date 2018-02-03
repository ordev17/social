
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
//
// const app = new Vue({
//     el: '#app'
// });

import clmtrackr from 'clmtrackr'

var count=-1; // initially -1 as we are having a delay of 1000ms

var counter=setInterval(timer, 1000); //1000 will  run it every 1 second

function timer()
{
    count=count+1;
    if (count >=6) //+1 than the req time as we have a delay of 1000ms
    {
        clearInterval(counter);
        /////////////what code should go here for the modal to pop up??///////////////////////
        return;
    }
    document.getElementById("timer").innerHTML=count + " secs"; // watch for spelling
}

$("#myModal").modal();