<template>
    <div class="col-md-2">
        <ul class="nav flex-column">
            <li v-for="item in list" class="nav-item">
                <a class="nav-link"
                   :class="item.link === route ? 'disabled active' : ''"
                   :href="item.link">{{ item.name }}</a>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: ['list', 'route'],
        data() {
            return {
            }
        },
        mounted: function () {
            console.log(this.route);
        }
    }
</script>
