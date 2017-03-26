<template>
    <div class="panel panel-default">
        <div class="panel-heading">Example Componetta123</div>
         City name: {{this.cityView.name}} <br/>
         City id: {{this.cityView.id}}
        <ul id="example-1">
            <li v-for="unit in troopUnit">
               Troop: {{ unit.troopname }} <br/>
                Amount {{ unit.amount }}
            </li>
        </ul>
        <div class="panel-body">
        </div>
    </div>
</template>
<script>
    export default{
        props: ['moi'],
        data() {
            return {
                cityView: [],
                troopUnit: [],
                armyy: [],
                citySquare: []
            }
        },
        created(){
            axios.get('cityView.json')
                .then(response => {
                    this.cityView = response.data.city;
                    this.troopUnit = response.data.troopUnits;
                    this.armyy = response.data.army;
                    this.citySquare = response.data.square;
                    console.log(this.cityView.name);
                    console.log(this.troopUnit);
                })
                .catch(function (error) {
                    console.log("VITU ERROR");
                });
        },

    };
</script>