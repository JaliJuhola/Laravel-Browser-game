<template>
    <div>
        <div style="position: absolute; right: 0; top: 141px; padding-bottom: 50px;
          width: 22%; text-align: center !important;">
            <nav class="navbar navbar-default navbar-fixed-side" style="text-align: center; width: 100%;">
                <ul class="nav nav-stacked">
                    <li style="text-align: center !important;">Your cities:</li>
                    <template v-for="playersCity in citiesSideBar"v>
                        <div v-if="playersCity.activeCity > 0">
                            <li style="color: green;">{{playersCity.name}}</li>
                        </div>
                        <div v-else>
                            <button type="button" class="btn-link" style="color: blue;"
                                    @click="setActive(playersCity.id)"
                                    >{{playersCity.name}}
                            </button>
                        </div>
                    </template>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script>
    export default{
        data() {
            return {
                citiesSideBar: []
            }
        },
        created(){
            axios.get('userCities.json')
                .then(response => {
                    this.citiesSideBar = response.data;
                    console.log(this.citiesSideBar);
                })
                .catch(function (error) {
                    console.log("Cities not found");
                });
        },
        methods: {
            setActive(id)
            {
                axios.post('city/setActive', {active_city: id})
                    .then((response) => {
                        this.citiesSideBar = response.data;
                    });
            }
            }
    };
</script>