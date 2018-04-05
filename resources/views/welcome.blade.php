<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="root_url" content="{{ Request::url() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Currency</title>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <style>
        td {
            height: 50px;
            padding-right: 20px;
        }
        body tr:nth-of-type(odd){
            background: #ddd;
        }
        button {
            float: right;
        }
    </style>
</head>
<body>
    <div id="app" class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <table class="table table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Volume</th>
                        <th>Amount</th>
                    </tr>
                    <tr v-for="item in items">
                        <td>@{{ item.name }}</td>
                        <td>@{{ item.volume }}</td>
                        <td>@{{ item.price ? (Math.round(item.price.amount * 100)/100).toFixed(2) : '' }}</td>
                    </tr>
                </table>
                <button class="btn btn-success" @click="load">Update</button>
            </div>
        </div>
    </div>
    <script>
        let ROOT_URL = document.querySelector('meta[name=root_url]').getAttribute('content');

        var app = new Vue({
            el: '#app',

            data: {
                items: []
            },

            created() {
                axios.get(ROOT_URL + '/api').then(response => {
                    this.items = response.data;
                });
            },

            mounted() {
                var self = this;
                setInterval(function(){
                    axios.get(ROOT_URL + '/api').then(response =>
                    self.items = response.data);
                }, 15000);
            },

            methods: {
                load() {
                    axios.get(ROOT_URL + '/api').then(response => {
                        this.items = response.data;
                    });
                }
            }
        })
    </script>
</body>
</html>
