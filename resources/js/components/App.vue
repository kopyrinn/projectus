<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">


                    <div>
                        <input type="" name="" required class="form-control col-12" name="name" placeholder="дело" v-model="newItem.name">

                        <input type="" name="" hidden required class="form-control col-3" name="user_id" placeholder="user_id" v-model="newItem.user_id">
               

                        <input type="" name="" required class="form-control col-3" hidden name="status"  v-model="newItem.status" placeholder="status">

                        <button type="submit" class="btn btn-primary" @click.prevent="createItem()">Добавить дело</button>
                        <p class="alert alert-danger" v-bind:class="{hidden: hasError }">
                            Заполни все поля
                        </p> 
                    </div>

                    <div class="card-header">Все дела</div>                 
                        <table class="table table-borderless" id="table">
                            <thead>
                                <tr>
                                    <th>НОМЕР</th>
                                    <th>МОИ ДЕЛА</th>
                                    <th>СТАТУС ДЕЛА</th>
                                
                                </tr>
                            </thead>
                            <tr v-for="item in items" v-if="item.user_id==authID">
                                    
                                <th>{{item.id}}</th>
                                <th>{{item.name}}</th>
                                <th v-if="item.status===0">невыполнено</th>
                                <th v-else="item.status===1">выполнено</th>
                                <input type="" required name="" placeholder="" v-model="delete.id">
                                <button>удалить</button>
                            </tr>
                            <tr v-else>
                                
                            </tr>
                        </table>




          
                </div>
            </div>
        </div>
    </div>

      
</template>


<script>
import axios from 'axios'
    export default {
    	data(){
    		return {
    			name : '',
                tasks : [],
                authID : '',
                items : [],
                newItem : {'name': '', 'user_id' : userID.value, 'status' : 0},
                testest : '',
                hasError: true,
                auth : '',                
                awesome : true,
                delete : {'id' : 2}
    		}
    	},
        mounted() {
            console.log('mounted app vue worked ');
            this.getItems();
            this.test();
            //this.del();
            //this.proverka();
        },
        methods : {
                // fetchData () {
                //     axios.get('api/task')
                //         .then((res) => {
                //             this.tasks = res.data
                //         })
                //         .catch((err)=>{
                //             console.log(err)
                //         })

                // },
            	addTask(){
            		axios.post('/api/affair', {name:this.name} ).then(respond => {
                        //alert(respond.data);
                        console.log(respond.data);
                        // document.getElementById('axios').innerHTML = respond.data;
                    });
            		alert(this.name);
            	},
                getItems : function getItems() {
                            console.log('гет работает через app vue');
                            var _this = this;
                            //axios.post('api/get');
                            axios.get('/api/get').then( function(responce){
                                    
                                        _this.items = responce.data;
                                        //console.log(responce.data);    
                                        //this.createItem()
                        })
                },
                test(){
                    
                 
                    // this.testest = "я изменил переменную";
                    //   console.log(this.testest);   
                      //document.getElementById('axios').innerHTML = "жопа";
                        var user = document.getElementById('user').value;
                        var userID = document.getElementById('userID').value;
                     this.auth= user;
                     this.authID= userID;
                     console.log(user);
                     //console.log(this.authID);
                },
                 proverka : function proverka()  {
                    console.log("нана");
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
                    //this.getItems();
                }, 
                del(){
                        var input = this.delete;
                         var _this = this;
                        axios.post('/api/dobav', input ).then( function(responce){
                            _this.delete = {'id': ''};
                         
                        }) 
                }

            }
    }

//<router-view>aaaa</router-view>
</script>