<template>
    <div class="card card-profile shadow">
        <div class="row justify-content-center">
            <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                    <div>
                        <img @click.prevent="fakeClick"
                             :src="this.$root.UserPhoto"
                             class="rounded-circle">
                        <input v-if="!public" id="uploadInput"
                               accept="image/*"
                               type="file"
                               style="display: none"
                               @change.prevent="uploadPhoto">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
            <div class="d-flex justify-content-between">
                <a href="#" @click.prevent="$root.alertDevelop" class="btn btn-sm btn-info mr-4">Написать</a>
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
                <h3>@{{user.username}}</h3>
                <h4>
                    {{ user.name }} {{ user.middle_name }}
                    <span class="font-weight-light">
                        {{ user.age ? ', '+user.age : '' }}
                    </span>
                </h4>
                <div class="h5 font-weight-300">
                    <i class="ni location_pin mr-2"></i>{{ user.profile.city }} {{ user.profile.country ? ', '+user.profile.country : '' }}
                </div>
                <hr class="my-4">
                <p>
                    {{ user.profile.about }}
                </p>
                <a href="#" @click.prevent="$root.alertDevelop">Показать мой профиль</a>
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
        },
        methods: {
            changePublic: function () {
                this.public = !this.public;
            },
            uploadPhoto: function (e) {
                const file = e.target.files[0];
                let form = new FormData(),
                    url = this.$root.getUrlRoute(
                        this.$root.config.routes['dashboard.user.uploadPhoto'],
                        this.$root.config.user.id);
                form.append('photo', file);

                axios.post(url, form, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then((response) => {
                    this.$root.setMessage(response.data.message, response.data.error);
                    this.$root.updateConfig();
                    let timestamp = new Date().getTime();
                    this.$root.UserPhoto = this.$root.UserPhoto + '?new='.timestamp;
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
