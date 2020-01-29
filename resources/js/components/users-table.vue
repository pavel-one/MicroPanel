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
                               :class="user.active ? 'badge-warning' : 'badge-info'"
                               href="#">
                                {{ user.active ? 'Деактивировать' : 'Активировать' }}
                            </a>
                            <a class="dropdown-item" href="#">Авторизоваться</a>
                            <a class="dropdown-item" href="#">Удалить</a>
                        </div>
                    </div>
                </th>
                <td>
                    {{ user.username }}
                    <span :class="user.active ? 'badge-info' : 'badge-warning'"
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
                load: true,
                list: [],
            }
        },
        methods: {
            setUser: function () {
                if (!this.url) {
                    return false;
                }

                try {
                    axios.get(this.url)
                        .then((response) => {
                            if (response.status === 200) {
                                this.load = false;
                                this.list = response.data;
                            }
                        });
                } catch (e) {
                    this.load = false;
                    this.list = [];
                    return false;
                }

            }
        },
        mounted: function () {
            this.setUser();
        }
    }
</script>
