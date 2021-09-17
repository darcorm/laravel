<template>
    <div v-show="userData.full_name">
    <table class="table table-bordered">
        <thead>
            <th>Full Name</th>
            <th>Owner Login</th>
            <th>Watchers Count</th>
        </thead>
        <tr>
            <td>{{ userData.full_name }}</td>
            <td>{{ userData.owner_login }}</td>
            <td>{{ userData.watchers_count }}</td>
        </tr>
    </table>
    </div>
</template>

<script>
    export default {
        props: ['userData'],
    }
</script>
