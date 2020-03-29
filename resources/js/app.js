import axios from 'axios'

require('./bootstrap');

window.Vue = require('vue');

// window.VueRouter = require('vue-router').default;
// window.VueAxios = require('vue-axios').default;
// window.Axios = require('axios').default;

// Vue.use(VueRouter, VueAxios, Axios);

// let AppLayout = require('./components/App.vue');            <input type="" name="" required="required" name="user_id"  id='jack' v-model="checkName">

//const router = new VueRouter({mode: 'history', routes: routes})

Vue.component('articles', require('./components/Articles.vue').default);
Vue.component('app', require('./components/App.vue').default);

axios.post('/api/axio', {name: 'NE KOLYA'}).then(respond => {
	//alert(respond.data);
	console.log(respond.data);
	//document.getElementById('axios').innerHTML = respond.data;
	
	// console.log(user);
})

import VueRouter from 'vue-router';


console.log('app js worked')

const app = new Vue({
    el: '#app',
    data : {
    	userID :  '',
    	newItem : {'name': '', 'user_id' : userID.value, 'status' : 0},
    	hasError: true,
    	items : [],
    	affairs : [],
    	authUser : 'баракуда',    	
    },
    methods : {
    	login() {
    			var authID = document.getElementById('userID').value;	
				this.userID = authID;
				console.log(this.userID);	
    	},


    	getAuth : function getAuth() {
    		var _this = this;
	    	axios.get('/api/au').then( function(responce){
			
				_this.authUser = responce.data;
				console.log(responce.data);	

			}) 
    	},

    	getItems : function getItems() {
    		console.log('а как же эта');
    		var _this = this;
    		//axios.post('api/get');
    		axios.get('/api/get').then( function(responce){
    				
    					_this.items = responce.data;
    					//console.log(responce.data);				
    				}) 
    	},
    	createItem : function createItem() {
    			var input = this.newItem;
    			var _this = this;
    			console.log(input);
    			if (input['name'] == '' || input['user_id'] == '') {
    				alert('заполни поле');
    				this.hasError = false;
    			} else {
    				this.hasError = true;
    				axios.post('/api/dobav', input ).then( function(responce){
    					_this.newItem = {'name': '', 'user_id' : '', 'status' : ''};
    					_this.getItems();
    				}) 
    			}
    			this.getItems();
            }
    }, mounted() {
            console.log('я врубил новый mounted ');
            //this.getItems();
            this.login();

        },

});


    				// axios.post('/api/dobav', {name:input['name']} ).then(respond => {
	       //              //alert(respond.data);
	       //              console.log(respond.data);
	       //              // document.getElementById('axios').innerHTML = respond.data;
        //        		 });

