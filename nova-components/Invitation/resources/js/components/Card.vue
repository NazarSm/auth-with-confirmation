<template>
    <card class="flex flex-col items-center justify-center">
        <div class="px-3 py-3">
            <a :href="resources" class="no-underline dim flex p-6">
                <div>
                    <heading :level="3" class="mb-3">Link invitation</heading>
                    <p class="text-90 leading-normal">
                        You can send this link invitation
                    </p>
                </div>
            </a>
        </div>
    </card>
</template>

<script>
    export default {
        props: [
            'card',
        ],
        data: function () {
            return {
                path: ''
            }
        },
        methods: {
            link() {
                axios.get('/get-token')
                    .then((response) => {
                        console.log(response.data);
                        this.path = response.data
                    })
                    .catch((error) => {
                        console.log(error);
                    });
                return '/invitation/' + this.path

            }
        },
        computed: {
            resources() {
                return this.link()
            },
        },

    }
</script>
