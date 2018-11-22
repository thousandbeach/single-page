<template>
    <div>
        <button class="btn btn-primary btn-block">Add New task</button>
        <table class="table" v-if="tasks">
            <thead>
                <tr>
                    <th>id（ 配列のindex ）</th>
                    <th>Name</th>
                    <th>Body</th>
                    <th>task id</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(task, index) in tasks" v-bind:key="task.id">
                    <td>{{ index + 1 }}</td>
                    <td>{{ task.name }}</td>
                    <td>{{ task.body }}</td>
                    <td>{{ task.id }}</td>
                    <td><button class="btn btn-info">Edit</button></td>
                    <td><button class="btn btn-danger">Delete</button></td>
                </tr>
            </tbody>
        </table>
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
                uri: 'http://localhost:8000/tasks'
            }
        },

        methods: {
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
