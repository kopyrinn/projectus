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
                    <input id="userID" type="" hidden name="" value="{{Auth::user()->id}}">        
            <div class="content">
                <div id="app">
                    <div>
                      <!--  <input type="" name="" required class="form-control col-12" name="name" placeholder="дело" v-model="newItem.name">

                        <input type="" name="" required class="form-control col-3" name="user_id" placeholder="user_id" hidden v-model="newItem.user_id">
               

                        <input type="" name="" required class="form-control col-3" hidden name="status" value="1" v-model="newItem.status" placeholder="status">

                        <button type="submit" class="btn btn-primary" @click.prevent="createItem()">Добавить дело</button>
                        <p class="alert alert-danger" v-bind:class="{hidden: hasError }">
                            Заполни все поля
                        </p>       -->               
                        <app>
                            

                        </app>
                        

                
                </div>
                <div id="axios"></div>

            </div>
                   <!--
                        <h2>Добавить дело НА PHP</h2>
                        <input name="name" placeholder="дело">
                        <input type="" name="status" hidden value="0">
                        <input type="" name="userID" hidden>
                        <button>отправить</button>

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



            </div>
        </div>
    </div>
</div>
@endsection
