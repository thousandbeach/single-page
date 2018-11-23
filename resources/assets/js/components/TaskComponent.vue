<template>
    <div>
        <button @click="createModal" class="btn btn-primary btn-block" data-target="#create-modal">新規タスクの追加</button>
        <table class="table" v-if="tasks">
            <thead>
                <tr>
                    <th>id（ 配列のindex ）</th>
                    <th>タスク名</th>
                    <th>タスクの詳細</th>
                    <th>task id</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(task, index) in tasks" :key="task.id">
                    <td>{{ index }}</td>
                    <td>{{ task.name }}</td>
                    <td>{{ task.body }}</td>
                    <td>{{ task.id }}</td>
                    <td><button class="btn btn-info">Edit</button></td>
                    <td><button class="btn btn-danger">Delete</button></td>
                </tr>
            </tbody>
        </table>

        <!-- モーダル・ダイアログ -->
        <div class="modal fade" id="create-modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                        <h4 class="modal-title">タイトル</h4>
                    </div>
                    <div class="modal-body">

                        <div class="alert alert-danger" v-if="errors.length > 0">
                            <ul>
                                <li v-for="error in errors" :key="error.id">{{ error }}</li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input v-model="task.name" type="text" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input v-model="task.body" type="text" id="description" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                        <button @click="createTask" type="button" class="btn btn-primary" data-dismiss="modal">保存する</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                task: {
                    name: '',
                    body: '',
                },
                tasks: [],
                uri: 'http://localhost:8000/tasks',
                errors: []
            }
        },

        methods: {

            createModal(){
                $('#create-modal').modal('show');
            },

            createTask(){
                axios.post(this.uri, {name: this.task.name, body: this.task.body}).then(response=>{
                    this.tasks.push(response.data.task);
                    $('#create-modal').modal('hide');
                }).catch(error=>{
                    this.errors = [];

                    if(error.response.data.errors.name){
                        this.errors.push(error.response.data.errors.name[0]);
                    }
                    if(error.response.data.errors.name){
                        this.errors.push(error.response.data.errors.body[0]);
                    }
                    //this.errors = [];
                });
                //console.log(this.task.name, this.task.body);
            },

            loadTasks(){
                axios.get(this.uri).then(response=>{
                    this.tasks = response.data.tasks
                });
            }
        },

        mounted() {
            this.loadTasks();
            console.log('Component mounted!.')
        }
    }
</script>
