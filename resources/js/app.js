//import axios from 'axios'

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

axios.post('/api/axio', {name: 'master'}).then(respond => {
	//alert(respond.data);
	console.log(respond.data);
	//document.getElementById('axios').innerHTML = respond.data;
	
	// console.log(user);
})

import VueRouter from 'vue-router';


const app = new Vue({
    el: '#app',
    data : {
    	userID :  '',
    	newItem : {'name': '', 'user_id' : userID.value, 'status' : 0},
    	items : [],
    	affairs : [],
	    upd: 1,
        counter : 0,
        edit : false,
    },
    methods : {

        delItem(delID) {
            var destr = delID.id;
            console.log(destr)

                axios.post('/api/delete/'+ delID.id).then( function(responce){ //объект который к тебе вернется

                         
                    }) 
                 this.getItems();  
        },
        update(upda) {
            var updID = upda.id;
            var choose = this.upd;
            // console.log(choose)
            // console.log(updID)

            var obnovl = {'id' : upda.id, 'choose' : choose}
            console.log(obnovl)

            if(this.upd==1){                 
                 this.upd=0
                 //alert(this.upd);
                axios.post('/api/update', obnovl).then( function(responce){ 

                         
                    }) 
                this.getItems(); 
            } else {
                 this.upd=1
                 //alert(this.upd); 

                axios.post('/api/update', obnovl).then( function(responce){ 

                         
                    }) 
                this.getItems();                
            }

            //     axios.post('/api/update', obnovl).then( function(responce){ 

                         
            //         }) 
            // this.getItems();  
        },

    	getAuth : function getAuth() {
    		var _this = this;
	    	axios.get('/api/au').then( function(responce){
			 
				_this.authUser = responce.data;
				console.log(responce.data);	

			}) 
    	},

    	getItems : function getItems() {
    		console.log('getItems отработал');
            //this.newItem.name ="";
    		var _this = this;
    		//axios.post('api/get');
            //
    		axios.get('/api/get').then( function(responce){    				
    					_this.items = responce.data;
    					//console.log(responce.data);				
    				}); 

            //

    	}

        ,
    	createItem : function createItem() {
    			var input = this.newItem;
                //if(this.newItem.name != ''){
                var _this = this;

    			console.log(input); //проверка
    				axios.post('/api/dobav', input).then( function(responce){ //then 9обработать promise метода post
    					_this.newItem.name = '';
                    			
    				}) 
                     this.getItems();
                //}
    		  //this.newItem.name = 'kek';
    		 
        
                
            },

        editItem() {
            this.edit = true; //надо задать каждому элементу свой edit
          
        },
        doneEdit() {
            this.edit = false; 
        },        

        login() { //проверка авторизованного юзера
                var authID = document.getElementById('userID').value;   
                this.userID = authID;
                console.log(this.userID + " это айди юзера");   
        },

}, 

mounted() {
                console.log('app js подключен');
                //this.getItems();
                this.login();
                this.getItems();

        },

});


    				// axios.post('/api/dobav', {name:input['name']} ).then(respond => {
	       //              //alert(respond.data);
	       //              console.log(respond.data);
	       //              // document.getElementById('axios').innerHTML = respond.data;
        //        		 });




            // var formDel = document.getElementById('del').value;
            //  this.del = formDel;