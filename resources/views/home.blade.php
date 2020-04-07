@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Вы авторизованы! Добро пожаловать {{Auth::user()->name}}
                    <input id="user" type="" hidden name="" value="{{Auth::user()->name}}">
                    <input id="userID" ref="userID" type="" hidden name="" value="{{Auth::user()->id}}">        
            <div class="content">
                <div id="app">
                   
                    <div>
                       <input type="" name="" required class="form-control col-12" name="name" placeholder="что за дело" v-model="newItem.name">

                        <input type="" name="" required class="form-control col-3" name="user_id" hidden v-model="newItem.user_id">
               

                        <input type="" name="" required class="form-control col-3" hidden name="status" v-model="newItem.status">
                        <div class="text-right">
                            
                        <button type="submit" class="btn btn-primary col-md-2" @click.prevent="createItem()">Добавить</button>
                        </div>

                        <table class="table table-borderless" id="table">
                            <thead>
                                <tr>
                                    <th>НОМЕР</th>
                                    <th>МОИ ДЕЛА</th>
                                    <th>СТАТУС ДЕЛА</th>
                                
                                </tr>
                            </thead>                            
                            <tr v-for="(item,index) in items" >  
                                <template v-if="item.user_id==userID">             
                                    <th>@{{index+1}}</th>
                                    <th>@{{item.name}}</th>
                                    <th v-if="item.status===0">невыполнено</th>
                                    <th v-else="item.status===1">выполнено</th>
                    
                                    <button type="submit" class="btn btn-danger mr-3" @click.prevent="delItem(item)">удалить</button>

                                    <button type="submit" class="btn btn-primary" @click.prevent="update(item)">выполнено</button>
                                </template>  
                            </tr>
                           
                        </table>
                                                    
   


                
                </div>
               

            </div>
                  
                </div>



            </div>
        </div>
    </div>


 <!--
                        <h2>Добавить дело НА PHP</h2>
                        <input name="name" placeholder="дело">
                        <input type="" name="status" hidden value="0">
                        <input type="" name="userID" hidden>
                        <button>отправить</button> это из обычного php

                        @foreach($affair as $aff)
        @if ( $aff->user->name  == Auth::user()->name)
            <h3 style="color: green">{{ $aff->name }} 
                @if ($aff->status == 1)
                    <span style="color: red">выполнено</span>
                @else 
                    <span style="color: red">невыполнено</span>
                @endif
            </h3>
        <div class="d-flex">
            
                <form action="/update" method="POST">
                    @csrf
                    <input type="" name="id" value="{{ $aff->id }}" hidden>
                    <select name="choose">
                        <option value="1">выполнено</option>,
                        <option value="0">невыполнено</option>
                    </select>
                    <button>изменить</button>
                </form>
                <form action="/delete" method="POST">
                    @csrf
                    <input hidden name="delete" value="{{ $aff->id }}">
                    <button>Удалить</button>
                </form>
            
        </div>
        @endif
@endforeach -->

</div>


@endsection


