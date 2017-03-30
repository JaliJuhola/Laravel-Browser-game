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
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['notification'],
        data() {
            return {
                message: "moiolenviesti"
            }
        },
        methods: {
            settle(id)
            {
                var name = document.getElementById("city_name_input").value;
                axios.post('addCity', {city_name: name})
                    .then(function (response) {
                        console.log('User city added!');
                    });
            }
        }
    }
</script>