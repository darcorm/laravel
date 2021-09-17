<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Git Users API</div>

                    <div class="card-body">
                        <show-data :userData="gitUserData"/>
                    </div>

                    <div class="card-footer">
                        <button type="button" class="btn btn-info" @click="fetchApiData()">Fetch API</button>
                        <button type="button" class="btn btn-danger" @click="deleteTableData()">Delete Results</button>
                    </div>
                </div>
        </div>
    </div>
</div>
</template>

<script>
    import showData from "./ShowData.vue"

    export default {
        data: function() {
            return {
                gitUserData: []
            }
        },
        components: {
            showData
        },
        methods: {
            fetchApiData() {
                axios.get('/api/fetch-api')
            },
            deleteTableData() {
                axios.post('/api/delete/' + this.gitUserData.id)
                .then(response => {
                    this.gitUserData = response.data
                })
                .catch( error => {
                    console.log( error );
                })
            },
            showData() {
                axios.get('/api/show')
                .then(response => {
                    this.gitUserData = response.data[0]
                })
                .catch( error => {
                    console.log( error )
                })
            },
        },
        created: function() {
            this.showData();
        }
    }
</script>
