//moment js support
import moment from 'moment';
//vuejs
import Vue from 'vue';

Vue.filter('dateTimeFormate', function (value) {

    return moment(value).subtract(10, 'days').calendar(); // 10/13/2021
});


Vue.filter('toUpperCase', function (value) {

   return value.toUpperCase();
});
