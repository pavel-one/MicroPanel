<template>
    <div class="card card-profile shadow">
        <div class="row justify-content-center">
            <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                    <div>
                        <img @click.prevent="fakeClick" src="https://i.pravatar.cc/800" class="rounded-circle">
                        <input v-if="!public" id="uploadInput" accept="image/*" type="file" style="display: none"
                               @change.prevent="uploadPhoto">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
            <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-info mr-4">Написать</a>
            </div>
        </div>
        <div class="card-body pt-0 pt-md-4">
            <div class="row">
                <div class="col">
                    <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                        <div>
                            <span class="heading">3</span>
                            <span class="description">Сайта</span>
                        </div>
                        <div>
                            <span class="heading">25</span>
                            <span class="description">Гб</span>
                        </div>
                        <div>
                            <span class="heading">3</span>
                            <span class="description">Базы</span>
                        </div>
                        <div>
                            <span class="heading">13</span>
                            <span class="description">Задач</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <h3>
                    {{ this.user.name }} {{ this.user.middle_name }}
                    <span class="font-weight-light">
                        {{ this.user.age ? ', '+this.user.age : '' }}
                    </span>
                </h3>
                <div class="h5 font-weight-300">
                    <i class="ni location_pin mr-2"></i>{{ this.user.city }}, {{ this.user.country }}
                </div>
                <hr class="my-4">
                <p>
                    Клиент пришел от Влада Одинцова
                </p>
                <a href="#">Показать мой профиль</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user'],

        data() {
            return {
                public: false, //TODO: Смена
            }
        },
        mounted() {
            // console.log(this.user);
        },
        methods: {
            changePublic: function () {
                this.public = !this.public;
            },
            uploadPhoto: function (e) {
                const file = e.target.files[0];
                let form = new FormData();
                form.append('photo', file);
                axios.post('url', form, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then((response) => {
                    console.log(response);
                }).catch((response) => {
                    console.log(response);
                });
            },
            fakeClick: function () {
                if (this.public) return '';
                document.getElementById('uploadInput').click();
            }
        }
    }
</script>
