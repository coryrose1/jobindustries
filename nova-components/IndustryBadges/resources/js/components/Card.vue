<template>
    <div class="flex justify-center items-center">
        <span class="inline-flex rounded-md shadow-sm" v-for="industry in industries">
          <a :href="'/nova/resources/industries/' + industry.id"
                  class="inline-flex items-center text-sm px-3 py-2 mr-2 button-blue">
            {{ industry.name }}
            <div class="ml-2 bg-white rounded-full">
                <span class="p-2">{{ industry.users_count }}</span>
            </div>
          </a>
    </span>
    </div>
</template>

<script>
    export default {
        props: [
            'card',

            // The following props are only available on resource detail cards...
            // 'resource',
            // 'resourceId',
            // 'resourceName',
        ],
        data() {
            return {
                industries: [],
            }
        },
        methods: {
            getIndustryCounts() {
                axios.get('/nova-vendor/industry-badges/')
                    .then(response => {
                        this.industries = response.data;
                        console.log(response.data);
                    })
                    .catch(error => {
                        console.log(error)
                    })
            }
        },

        mounted() {
            this.getIndustryCounts();
        },
    }
</script>

<style>
    .button-blue {
        background-color: #BEE3F8;
        color: #2C5282;
        border-radius: 4px;
        text-decoration: none;
    }

    .button-blue:hover, .button-blue:focus {
        background-color: #90CDF4;
    }
</style>
