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
                <th v-for="item in this.attributes" scope="col">
                    {{ item }}
                </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item, index) in list" :list="list" :attributes="attributes">
                <td v-for="attribute in attributes" scope="row">
                    <div v-if="attribute === 'payload'">
                        {{ JSON.parse(list[index][attribute]).displayName }}
                    </div>
                    <div v-else>
                        {{ list[index][attribute] }}
                    </div>

                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['url', 'exclude'],
        data() {
            return {
                load: false,
                list: [],
                attributes: [],
            }
        },
        mounted: function () {
            this.setList();
        },
        methods: {
            setList: function () {
                if (!this.url) return false;
                this.setLoad();

                try {
                    axios.get(this.url)
                        .then((response) => {
                            this.setLoad(false);
                            this.list = response.data;
                            this.setAttributes();
                        });
                } catch (e) {
                    this.setLoad(false);
                    this.list = [];
                    return false;
                }
            },
            setAttributes: function () {
                if (!this.list.length) {
                    this.list = [];
                    return '';
                }
                const obj = this.list[0];
                for (let item in obj) {
                    /**
                     * Если есть исключения в таблице которые нам не нужно показывать, исключаем их
                     */
                    if (this.exclude) {
                        if (this.exclude.includes(item)) {continue}
                        this.attributes.push(item);
                        continue;
                    }
                    this.attributes.push(item);
                }
            },
            setLoad: function (state = true) {
                this.load = state;
            },
        },
    }
</script>
