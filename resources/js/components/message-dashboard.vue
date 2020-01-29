<template>
    <div :class="this.error ? 'alert-danger' : 'alert-success'" class="alert" role="alert">
        {{ messageText }}
        <button type="button" class="close" aria-label="Close" @click.prevent="unset">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</template>

<script>
    export default {
        props: ['error', 'text'],
        data() {
            return {
                messageText: '',
            }
        },
        mounted() {
            this.messageText = this.text;
        },
        watch: {
            messageText: function () {
                console.log(this);
                this.$vnode.elm.scrollIntoView();
            }
        },
        methods: {
            unset: function () {
                this.$root.message.text = '';
            }
        }
    }
</script>
