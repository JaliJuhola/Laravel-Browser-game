<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add city</div>

                    <div class="panel-body">
                        Name: <input type="text" id="city_name_input">
                        <button type="button" class="btn-primary"
                                @click="settle()">Settle
                        </button>
                        <br/>
                        <br/>
                        <div id="cityaddmessage" class="label-success" style="width: 250px; margin-left: 20px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                cityMessage: "Tassa on viesti!"
            }
        },
        methods: {
            settle()
            {
                var name = document.getElementById("city_name_input").value;
                axios.post('addCity', {city_name: name})
                    .then((response) => {
                        console.log('User city added!');
                    });
               var messageBox = document.getElementById("cityaddmessage");
               messageBox.innerHTML =  "City " + name +" successfully settled!";
            }
        }
    }
</script>