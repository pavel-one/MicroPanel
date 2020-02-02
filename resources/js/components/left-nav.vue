<template>
    <div class="col-md-2">
        <ul class="nav flex-column">
            <li v-for="item in this.list" class="nav-item">
                <a class="nav-link"
                   :class="item.link === route ? 'disabled active' : ''"
                   :href="item.link">{{ item.name }}</a>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: ['route'],

        data() {
            return {
                list: this.$root.config.menu,
                user: this.$root.config.user
            }
        },
        mounted() {
        }
    }
</script>
