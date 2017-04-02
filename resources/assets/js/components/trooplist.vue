<template>
    <div style="display: inline;">
        <div class="panel panel-default" style="width: 200px; display: inline-block;
    border: 1.2px solid; border-color: #2a88bd; position: absolute; top: 313px; left: 310px;">
            <div class="panel-heading" style="text-align: center;">
                <h4 style="text-align: center;">Your troops</h4>
            </div>
            <div class="panel-body">
                <ul id="trooplist-1" class="list-group panel-item" style="text-align: center; list-style-type: none;">
                    <li style="border-bottom: 0.6px solid; border-top: 0.6px solid; border-color: lightblue; "
                        v-for="unit in troopUnit">
                        <a href="#">{{ unit.troopname }}</a>({{ unit.amount }})
                    </li>
                    <div v-if="loading == true">Please wait while loading data...</div>
                    <div v-if=" troopUnit.length < 1">Your queue is empty!</div>
                </ul>
            </div>
        </div>
        <div class="panel panel-default" style="width: 200px; display: inline-block;
    border: 1.2px solid; border-color: #2a88bd; position: absolute; top: 313px; left: 90px;">
            <div class="panel-item">
                <div class="panel-heading" style="text-align: center">
                    <h4>Your troopqueue</h4>
                </div>
                <div class="panel-body">
                    <ul id="troopqueue-1" class="list-group panel-item"
                        style="text-align: center; list-style-type: none;">
                        <li style="border-bottom: 0.6px solid ; border-top: 0.6px solid; border-color: lightblue; "
                            v-for="item in troopQueue ">
                            <a href="#">{{ item.troopname }}</a>({{ item.amount }}) Ready:
                            {{formatTime(item.troopsready)}}
                        </li>
                        <div v-if="loading == true">Please wait while loading data...</div>
                        <div v-if=" troopQueue.length < 1">Your queue is empty!</div>
                    </ul>
                </div>
            </div>
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
                citySquare: [],
                troopQueue: []
            }
        },
        created(){
            axios.get('cityView.json')
                .then(response => {
                    this.cityView = response.data.city;
                    this.troopUnit = response.data.troopUnits;
                    this.armyy = response.data.army;
                    this.citySquare = response.data.square;
                    this.troopQueue = response.data.troopqueue;
                })
                .catch(function (error) {
                    console.log("Error loading cityinfo");
                });
        },
        methods: {
            formatTime(unixTimestamp)
            {
                var date = new Date(unixTimestamp * 1000);
                var minutes = date.getMinutes() + "";
                var hours = date.getHours() + "";
                var seconds = date.getSeconds() + "";
                if (minutes < 10)
                    minutes = "0" + minutes;
                if (hours < 10)
                    hours = 0 + hours;
                if (seconds < 10) {
                    seconds = 0 + seconds;
                }
                return hours + ":" + minutes + ":" + seconds;
            }
        },
    };
</script>