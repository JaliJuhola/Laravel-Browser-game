<template>
    <div class="panel panel-default">
        <div class="panel-heading">{{cities[0].username}}</div>
            <li v-for="city in cities" v-bind:id="city_id">
               Name: {{city.cityname}}
                <button type="button" class="button-red"
                        v-bindvalue="city.player_id"
                        @click="deleteCity(city.city_id)">Delete
                </button>
            </li>
        <div class="panel-body">
            <li v-for="city in cities">

            </li>
        </div>
    </div>
</template>
<script>
    export default{
        props: ['moi'],
        data() {
            return {
                cities: [],
            }
        },
        created(){
            axios.get('adminPlayer.json')
                .then(response => {
                    this.cities = response.data;
                })
                .catch(function (error) {
                    console.log("Retrieving cities failed!");
                });
        },
        methods: {
            deleteCity(id)
            {
                console.log("delete clicked");
                axios.post('deleteAdminCity', {city_id: id})
                    .then(function (response) {
                        console.log('User deleted');
                    });
                document.getElementById(id).innerHTML = "";
            }
        }

    };
</script>