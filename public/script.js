new Vue({
    el: '#app',
    data() {
        return {
            users: [],
            user: {}
        }
    },
    methods: {
        create() {
            const form = new FormData();
            form.append('name', this.user.name);
            form.append('email', this.user.email);

            const promise = fetch('/api.php', {
                method: 'POST',
                body: form
            })

            promise.then((response) => {
                const data = response.json();
                if (response.status == 422) {
                    alert(data.msg);
                } else {
                    this.list();
                }
                this.users = {}
            });
        },
        list() {
            const promise = fetch('/api.php')

            promise.then((response) => response.json())
                .then((data) => {
                    console.log(data);
                    this.users = data.data;
                })
        },
        get(id) {
            const promise = fetch('/api.php?id=' + id)

            promise.then((response) => response.json())
                .then((data) => {
                    console.log(data);
                    alert(JSON.stringify(data.data));
                })
        }
    },
    mounted() {
        this.list();
    },
    template: `
    <div>
        <div>
            <h3>Cadastra novo usuários</h3>
            <form @submit.prevent="create()">
                <input type="text" placeholder="Nome" v-model="user.name">
                <input type="email" placeholder="email" v-model="user.email">
                <input type="submit" value="Incluir">
            </form>
        </div>

        <div>
            <h3>Lista usuários</h3>

            <table>
                <tr>
                    <th>id</th>
                    <th>nome</th>
                    <th>email</th>
                    <th>#</th>
                </tr>
                <tr v-for="user in users">
                    <td>{{ user.id }}</td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td><a href="" @click.prevent="get(user.id)">+</a></td>
                </tr>
            </table>
        </div>
    </div>
    `
});