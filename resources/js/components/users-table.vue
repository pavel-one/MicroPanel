<template>
    <div v-if="this.load">
        <div class="text-center">
            <div class="spinner-grow" role="status">
                <span class="sr-only">Ожидаем...</span>
            </div>
        </div>
    </div>
    <div v-else>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Логин</th>
                <th scope="col">Имя</th>
                <th scope="col">Email</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in list">
                <th scope="row">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle"
                                type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                            {{ '#'+user.id }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item"
                               :class="user.active ? 'badge-warning' : 'badge-success'"
                               href="#">
                                {{ user.active ? 'Деактивировать' : 'Активировать' }}
                            </a>
                            <a class="dropdown-item" target="_blank" :href="user.authLink">Авторизоваться</a>

                            <form :action="user.deleteLink" @submit.prevent="deleteUser" method="post">
                                <button class="dropdown-item" type="submit">Удалить</button>
                            </form>
                        </div>
                    </div>
                </th>
                <td>
                    {{ user.username }}
                    <span :class="user.active ? 'badge-success' : 'badge-warning'"
                          class="badge">
                        {{ user.active ? 'Активен' : 'Деактивирован' }}
                    </span>
                </td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['url'],
        data() {
            return {
                load: false,
                list: [],
            }
        },
        mounted: function () {
            this.setUser();
        },
        methods: {
            deleteUser: function (e) {
                if (!e.target.action) return false;
                const url = e.target.action;
                this.setLoad();

                try {
                    axios.delete(url)
                        .then((response) => {
                            this.setUser();
                            if (response.data.message)
                                this.$root.setMessage(response.data.message, response.data.error);
                        });
                } catch (e) {
                    this.setLoad(false);
                    return false;
                }
            },
            setUser: function () {
                if (!this.url) return false;
                this.setLoad();

                try {
                    axios.get(this.url)
                        .then((response) => {
                            this.setLoad(false);
                            this.list = response.data;
                        });
                } catch (e) {
                    this.setLoad(false);
                    this.list = [];
                    return false;
                }
            },
            setLoad: function (state = true) {
                this.load = state;
            },
        },
    }
</script>
