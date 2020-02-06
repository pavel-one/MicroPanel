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
            <form>
                <h6 class="heading-small text-muted mb-4">Основная информация</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-username">Логин</label>
                                <input type="text" id="input-username"
                                       class="form-control form-control-alternative"
                                       placeholder="Ваш логин" :value="user.username">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">Email адресс</label>
                                <input type="email" id="input-email"
                                       :value="user.email"
                                       class="form-control form-control-alternative"
                                       placeholder="vasya@mail.ru">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-first-name">Имя</label>
                                <input type="text" id="input-first-name"
                                       class="form-control form-control-alternative"
                                       placeholder="Ваше имя" :value="user.name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-last-name">Отчество</label>
                                <input type="text" id="input-last-name"
                                       class="form-control form-control-alternative"
                                       placeholder="Ваше отчество" :value="user.middle_name">
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
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-address">Адрес</label>
                                <input id="input-address" class="form-control form-control-alternative"
                                       placeholder="Ваш адрес"
                                       :value="user.profile.address"
                                       type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-city">Город</label>
                                <input type="text" id="input-city"
                                       class="form-control form-control-alternative"
                                       placeholder="Город" :value="user.profile.city">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-country">Страна</label>
                                <input type="text" id="input-country"
                                       class="form-control form-control-alternative"
                                       placeholder="Страна" :value="user.profile.country">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-dob">Дата рождения</label>
                                <input type="date" id="input-dob"
                                       class="form-control form-control-alternative"
                                       placeholder="15.11.1993" :value="user.profile.dob">
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-4">
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Прочая информация</h6>
                <div class="pl-lg-4">
                    <div class="form-group focused">
                        <label>Обо мне</label>
                        <textarea readonly rows="4" class="form-control form-control-alternative"
                                  placeholder="Дополнительная информация">
                            {{ user.profile.about }}
                        </textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user'],

        data() {
            return {};
        },
        mounted() {

        },
        methods: {
            save: function() {
                console.log('save action')
            }
        }
    }
</script>
