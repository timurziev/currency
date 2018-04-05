<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="root_url" content="{{ Request::url() }}">

    <title>Currency</title>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <style>
        td {
            height: 50px;
            padding-right: 20px;
        }
    </style>
</head>
<body>
    <div id="app">
        <table>
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
        <button @click="load">Update</button>
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
