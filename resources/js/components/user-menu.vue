<template>
    <ul class="navbar-nav align-items-center d-none d-md-flex">
        <li class="nav-item dropdown">
            <a class="nav-link"
               href="#"
               role="button"
               data-toggle="dropdown"
               aria-haspopup="true"
               aria-expanded="false">
                <i class="ni ni-bell-55"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden">
                <!-- Dropdown header -->
                <div class="px-3 py-3">
                    <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong> notifications.</h6>
                </div>
                <!-- List group -->
                <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <!-- Avatar -->
                                <img alt="Image placeholder"
                                     :src="this.$root.UserPhoto"
                                     class="avatar rounded-circle">
                            </div>
                            <div class="col ml--2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                    </div>
                                    <div class="text-right text-muted">
                                        <small>2 hrs ago</small>
                                    </div>
                                </div>
                                <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <!-- Avatar -->
                                <img alt="Image placeholder"
                                     :src="this.$root.UserPhoto"
                                     class="avatar rounded-circle">
                            </div>
                            <div class="col ml--2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                    </div>
                                    <div class="text-right text-muted">
                                        <small>3 hrs ago</small>
                                    </div>
                                </div>
                                <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <!-- Avatar -->
                                <img alt="Image placeholder"
                                     :src="this.$root.UserPhoto"
                                     class="avatar rounded-circle">
                            </div>
                            <div class="col ml--2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                    </div>
                                    <div class="text-right text-muted">
                                        <small>5 hrs ago</small>
                                    </div>
                                </div>
                                <p class="text-sm mb-0">Your posts have been liked a lot.</p>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <!-- Avatar -->
                                <img alt="Image placeholder" src="https://i.pravatar.cc/48" class="avatar rounded-circle">
                            </div>
                            <div class="col ml--2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                    </div>
                                    <div class="text-right text-muted">
                                        <small>2 hrs ago</small>
                                    </div>
                                </div>
                                <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <!-- Avatar -->
                                <img alt="Image placeholder" src="https://i.pravatar.cc/48" class="avatar rounded-circle">
                            </div>
                            <div class="col ml--2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                    </div>
                                    <div class="text-right text-muted">
                                        <small>3 hrs ago</small>
                                    </div>
                                </div>
                                <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- View all -->
                <a href="#" class="dropdown-item text-center text-primary font-weight-bold py-3">Показать все</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link pr-0"
               href="#"
               role="button"
               data-toggle="dropdown"
               aria-haspopup="true"
               aria-expanded="false">
                <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" :src="this.$root.UserPhoto">
                </span>
                    <div class="media-body ml-2 d-none d-lg-block">
                        <span class="mb-0 text-sm  font-weight-bold">{{ this.$root.config.user.name }}</span>
                    </div>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0">{{ this.$root.config.user.username }}</h6>
                </div>
                <a :href="'/'+this.$root.config.routes['dashboard.profile']" class="dropdown-item">
                    <i class="ni ni-single-02"></i>
                    <span>Профиль</span>
                </a>
                <a @click.prevent="alertDevelop" href="#" class="dropdown-item">
                    <i class="ni ni-settings-gear-65"></i>
                    <span>Настройки</span>
                </a>
                <a @click.prevent="alertDevelop" href="#" class="dropdown-item">
                    <i class="ni ni-support-16"></i>
                    <span>Тех.Поддержка</span>
                </a>
                <div class="dropdown-divider"></div>
                <a :href="'/'+this.$root.config.routes.logout" class="dropdown-item">
                    <i class="ni ni-user-run"></i>
                    <span>Выход</span>
                </a>
            </div>
        </li>
    </ul>
</template>

<script>
    export default {
        props: [],
        data() {
            return {};
        },
        mounted() {
            return {};
        },
        watch: {},
        methods: {
            alertDevelop: function () {
                this.$swal.fire({
                    icon: 'error',
                    title: 'Упс...',
                    // toast: true,
                    // position: 'top-end',
                    // timer: 2000,
                    // timerProgressBar: true,
                    text: 'Функционал еще в разработке',
                })
            }
        }
    }
</script>
