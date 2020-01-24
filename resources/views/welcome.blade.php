<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <style>
            html,body{
                background:#fff;
                color:#636b6f;
                font-family:'Raleway',sans-serif;
                font-weight: 100;
                height:auto;
                margin:0;
            }

            .full-height{
                min-height:100vh;
            }

            .flex-container{
                align-items: center;
                display:flex;
                justify-content: center;
            }

            .position-ref{
                position:relative;
            }

            .top-right{
                position:absolute;
                right:10px;
                top:10px;
            }

            .title{
                font-size:84px;
            }

            .m-b-md{
                margin-bottom:30px;
            }

            .modal-mask{
                position:fixed;
                z-index:9900;
                top:0;
                left:0;
                width:100%;
                height:100%;
                background:lightblue;
                display:table;
                transition:opacity .3s ease;
            }

            .modal-wrapper{
                display:table-cell;
                vertical-align:middle;
            }

            .modal-container{
                width:300px;
                margin:0px auto;
                padding:20px 30px;
                background-color:#fff;
                border-radius:2px;
            }

            
        </style>
    </head>
    <body>
       <div class="flex-container position-ref full-height">
            <div id="app">
                <p class="text-center alert alert-danger" v-bind:class={hidden:hasError}>
                    please fill all field
                </p>
                <div class="content">
                    <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name"
                            required placeholder="Enter some name" v-model="newItem.name">
                        </div> 
            
                        <div class="form-group">
                            <label for="age">Age:</label>
                            <input type="number" class="form-control" id="age" name="age"
                            required placeholder="Enter your age" v-model="newItem.age">
                        </div>
            
                        <div class="form-group">
                            <label for="profession">Profession</label>
                            <input type="text" class="form-control" id="profession" name="profession"
                            required placeholder="Enter your profession"
                            v-model="newItem.profession">
                        </div>
                        <button class="btn btn-primary"
                        @click.prevent="createItem()">
                            <span class="glyphicon glyphicon-plus"></span> ADD 
                        </button>

                        <table class="table table-borderless" id="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Professiong</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in items">
                                    <td>@{{item.id}}</td>
                                    <td>@{{item.name}}</td>
                                    <td>@{{item.age}}</td>
                                    <td>@{{item.profession}}</td>
                                    <td id="show-modal" @click="showModal=true;setVal(item.id,item.name,item.age,item.profession)" class="btn btn-info">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </td>
                                    <td @click.prevent="deleteItem(item)" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <modal v-if="showModal" @close="showModal=false">
                            <h3 slot="header">Edit Item</h3>
                            <div slot="body">
                                <input type="hidden"  class="form-control" id="e_id" name="id" required :value="this.e_id">
                                Name : <input type="text" class="form-control" id="e_name" name="name"
                                required :value="this.e_name">

                                Age : <input type="text" class="form-control" id="e_age" name="age"
                                required :value="this.e_age">

                                Profession : <input type="text" class="form-control" id="e_profession" name="profession"
                                required :value="this.e_profession">
                            </div>
                            <div slot="footer">
                                <button class="btn btn-default" @click="showModal=false">
                                    Cancel
                                </button>

                                <button class="btn btn-info" @click="editItem()">
                                    Update
                                </button>
                            </div>
                        </modal>
                </div>
            </div> 
       </div>
    </body>
   <script type="text/javascript" src="/js/app.js"></script>
   <script type="text/x-template" id="modal-template">
        <transition name="modal">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-container">
                        <div class="modal-header">
                            <slot name="header">
                                default header
                            </slot>
                        </div>

                        <div class="modal-body">
                            <slot name="body">

                            </slot>
                        </div>

                        <div class="modal-footer">
                            <slot name="footer">
                            </slot>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </script>
</html>
