<template>
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">Мой профиль</h3>
                </div>
                <div class="col-4 text-right">
                    <a href="#" @click.prevent="$root.alertDevelop" class="btn btn-primary">
                        Мои настройки
                    </a>
                    <button class="btn btn-success" @click="save" type="button">
                        <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                        Сохранить
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h6 class="heading-small text-muted mb-4">Основная информация</h6>
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group ">
                            <label class="form-control-label" for="input-username">Логин</label>
                            <input type="text" id="input-username"
                                   class="form-control form-control-alternative"
                                   placeholder="Ваш логин"
                                   :class="{isInvalid: errors.username}"
                                   v-model="user.username">
                            <div v-if="errors.username" class="errors-wrapper">
                                <div v-for="error in errors.username" class="error-item">
                                    {{ error }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-email">Email адресс</label>
                            <input type="email" id="input-email"
                                   v-model="user.email"
                                   :class="{isInvalid: errors.email}"
                                   class="form-control form-control-alternative"
                                   placeholder="vasya@mail.ru">
                            <div v-if="errors.email" class="errors-wrapper">
                                <div v-for="error in errors.email" class="error-item">
                                    {{ error }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group ">
                            <label class="form-control-label" for="input-first-name">Имя</label>
                            <input type="text" id="input-first-name"
                                   class="form-control form-control-alternative"
                                   :class="{isInvalid: errors.name}"
                                   placeholder="Ваше имя" v-model="user.name">
                            <div v-if="errors.name" class="errors-wrapper">
                                <div v-for="error in errors.name" class="error-item">
                                    {{ error }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group ">
                            <label class="form-control-label" for="input-last-name">Отчество</label>
                            <input type="text" id="input-last-name"
                                   class="form-control form-control-alternative"
                                   :class="{isInvalid: errors.middle_name}"
                                   placeholder="Ваше отчество" v-model="user.middle_name">
                            <div v-if="errors.middle_name" class="errors-wrapper">
                                <div v-for="error in errors.middle_name" class="error-item">
                                    {{ error }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <!-- Address -->
            <h6 class="heading-small text-muted mb-4">Контактная информация</h6>
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group ">
                            <label class="form-control-label" for="input-address">Адрес</label>
                            <input id="input-address" class="form-control form-control-alternative"
                                   placeholder="Ваш адрес"
                                   :class="{isInvalid: errors['profile.address']}"
                                   v-model="user.profile.address"
                                   type="text">
                            <div v-if="errors['profile.address']" class="errors-wrapper">
                                <div v-for="error in errors['profile.address']" class="error-item">
                                    {{ error }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group ">
                            <label class="form-control-label" for="input-city">Город</label>
                            <input type="text" id="input-city"
                                   :class="{isInvalid: errors['profile.city']}"
                                   class="form-control form-control-alternative"
                                   placeholder="Город" v-model="user.profile.city">
                            <div v-if="errors['profile.city']" class="errors-wrapper">
                                <div v-for="error in errors['profile.city']" class="error-item">
                                    {{ error }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group ">
                            <label class="form-control-label" for="input-country">Страна</label>
                            <input type="text" id="input-country"
                                   class="form-control form-control-alternative"
                                   :class="{isInvalid: errors['profile.country']}"
                                   placeholder="Страна" v-model="user.profile.country">
                            <div v-if="errors['profile.country']" class="errors-wrapper">
                                <div v-for="error in errors['profile.country']" class="error-item">
                                    {{ error }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group ">
                            <label class="form-control-label" for="input-dob">Дата рождения</label>
                            <input type="date" id="input-dob"
                                   class="form-control form-control-alternative"
                                   :class="{isInvalid: errors['profile.dob']}"
                                   placeholder="15.11.1993" v-model="user.profile.dob">
                            <div v-if="errors['profile.dob']" class="errors-wrapper">
                                <div v-for="error in errors['profile.dob']" class="error-item">
                                    {{ error }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4">
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user'],

        data() {
            return {
                errors: {}
            };
        },
        mounted() {

        },
        methods: {
            save: function () {
                const url = '/' + this.$root.config.routes['dashboard.user.updateProfile'],
                    data = this.user;

                axios.post(url, data)
                    .then((response) => {
                        if (response.data.message)
                            this.$root.setMessage(response.data.message, response.data.error);
                        this.$root.updateConfig();
                    })
                    .catch((error) => {
                        const data = error.response.data;
                        if (data.errors) {
                            this.errors = data.errors;
                            this.$root.setMessage('Одно или несколько полей неправильно заполнены', true);
                        }
                    });
            }
        }
    }
</script>
