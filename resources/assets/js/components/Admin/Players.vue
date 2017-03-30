<template>
    <div class="panel panel-default">
        <div class="panel-heading">Example Componeasdtta123</div>
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Tribe</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="player in players" v-bind:id="player.user_id">
                    <td>{{player.user_id}}</td>
                    <td> {{player.name}}</td>
                    <td>{{player.Tribe}}</td>
                    <td>
                        <button type="button" class="btn-danger"
                                v-bindvalue="player.user_id"
                                @click="deleteUser(player.user_id)">Delete
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
            <div class="panel-body">
            </div>
    </div>
</template>
<script>
    export default{
        props: ['moi'],
        data() {
            return {
                players: [],
            }
        },
        created(){
            axios.get('adminPlayers.json')
                .then(response => {
                    this.players = response.data;
                })
                .catch(function (error) {
                    console.log("VITU ERROR");
                });
        },
        methods: {
            deleteUser(id)
            {
                console.log("delete clicked");
                axios.post('deleteAdminXHTML', {user_id: id})
                    .then(function (response) {
                        console.log('User deleted');
                    });
                document.getElementById(id).innerHTML = "";
            }
        }

    };
</script>