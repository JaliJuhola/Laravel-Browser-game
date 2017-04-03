<template>
    <div class="panel panel-info" style="margin-right: auto !important; margin-left: auto !important;">
            <span v-if="mapVisible">
                        <button @click="moveYAxis(-1)"
                                class="btn-danger">Move Down</button>
        <button @click="moveYAxis(1)"
                class="btn-danger">Move up</button>
        <button @click="moveXAxis(1)"
                class="btn-danger">Move left</button>
        <button @click="moveXAxis(-1)"
                class="btn-danger">Move Right</button>
        <div style="margin-left: auto; margin-right: auto;">
            <span v-for="square in squares">
                <span v-if="square.xCord >= mapCurrentMinX">
                    <span v-if="square.xCord <= mapCurrentMaxX">
                        <span v-if="square.yCord >= mapCurrentMinY">
                    <span v-if="square.yCord <= mapCurrentMaxY">
            <button style="background-color: lightblue; margin-left: -4px;
            padding-top: 4px; padding-bottom: 4px;">
                    <span v-if="square.city_id > 0">
                            <button @click="citySquare(square.city_id)">
                                <img src="images/CityTile.png">
                            </button>
                    </span>
                    <span v-else>
                        <button @click="emptySquare(square.xCord, square.yCord)">
                            <img src="images/tile.png">
                        </button>
                    </span>
            </button>
            <span v-if="mapCurrentMaxX === square.xCord">
                <br/>
            </span>
                                        </span>
                    </span>
                            </span>
                </span>
            </span>
        </div>
                    </span>
        <span v-if="emptySquareVisible" style="margin-left: auto; margin-right: auto; width: 100%;">
            <button @click="backToMap()" class="btn-primary">
                    Return to map
                </button>
                 <h3 style="text-align: center;">Wilderness ( {{activeX}}, {{activeY}})</h3>
                <button style="margin-left: 40%; margin-top: 200px; width: 20% !important; height: 25px!important;"
                        @click="settle" class="btn-danger">Settle here!</button>
        </span>
    </div>
</template>

<script>
    export default{
        data() {
            return {
                squares: [],
                user_id: 0,
                mapVisible: true,
                emptySquareVisible: false,
                activeX: 0,
                activeY: 0,
                mapCurrentMinX: -2,
                mapCurrentMinY: -2,
                mapCurrentMaxX: 2,
                mapCurrentMaxY: 2,
                currentRowCount: 0,
                jumpToX: 0,
                jumpToY: 0,
            }
        },
        created(){
            axios.get('mapSquares.json')
                .then(response => {
                    this.squares = response.data.squares;
                    this.user_id = response.data.user_id;
                    this.emptySquareVisible = false;
                    console.log(this.squares);
                    this.mapCurrentMinX = -2;
                    this.mapCurrentMinY = -2;
                    this.mapCurrentMaxX = 1;
                    this.mapCurrentMaxY = 1;
                })
                .catch(function (error) {
                    console.log("Squares not found!");
                });
        },
        methods: {
            citySquare(id)
            {
                window.location.href = "/city/" + id;
            },
            emptySquare(xCord, yCord)
            {
                this.activeX = xCord;
                this.activeY = yCord;
                this.mapVisible = false;
                this.emptySquareVisible = true;
            },
            backToMap()
            {
                this.activeX = 0;
                this.activeY = 0;
                this.mapVisible = true;
                this.emptySquareVisible = false;
            },
            moveXAxis(amount)
            {
                var upperFound = 0;
                var lowerFound = 0;
                var xMax = this.mapCurrentMaxX;
                var xMin = this.mapCurrentMinX;
                this.squares.forEach(function (element) {
                    if (element.xCord === xMax + amount) {
                        upperFound = 1;
                    }
                    if (element.xCord === xMin + amount) {
                        lowerFound = 1;
                    }
                    console.log("moi");
                });
                if (upperFound === 1 && lowerFound === 1) {
                    this.mapCurrentMinX = this.mapCurrentMinX + amount;
                    this.mapCurrentMaxX = this.mapCurrentMaxX + amount;
                }
            },
            moveYAxis(amount)
            {
                var upperFound = 0;
                var lowerFound = 0;
                var yMax = this.mapCurrentMaxY;
                var yMin = this.mapCurrentMinY;
                this.squares.forEach(function (element) {
                    if (element.yCord === yMax + amount) {
                        upperFound = 1;
                    }
                    if (element.yCord === yMin + amount) {
                        lowerFound = 1;
                    }
                });
                if (upperFound === 1 && lowerFound === 1) {
                    this.mapCurrentMinY = this.mapCurrentMinY + amount;
                    this.mapCurrentMaxY = this.mapCurrentMaxY + amount;
                }
            },
            settle()
            {
                axios.post('addCity', {xCord: this.activeX, yCord: this.activeY})
                    .then((response) => {
                        window.location.href = "/city/view";
                    });
            }
        }
    };
</script>