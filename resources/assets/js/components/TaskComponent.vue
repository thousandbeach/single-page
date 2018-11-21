<template>

        <div>

                        <button class="btn btn-primary btn-block">Add New task</button>
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Body</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John</td>
                <td>Doe</td>
                <td>john@example.com</td>
            </tr>
            <tr>
                <td>Mary</td>
                <td>Doe</td>
                <td>john@example.com</td>
            </tr>
            <tr>
                <td>John</td>
                <td>Doe</td>
                <td>john@example.com</td>
            </tr>
        </tbody>
    </table>
                    </div>


</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
