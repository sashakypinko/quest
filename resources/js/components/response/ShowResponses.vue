<template>

    <main role="main">
        <notifications group="notify" animation-type="velocity" :duration="60000"
                       position="bottom right"/>

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Команды:</h1>
                <p>
                <div class="btn-group d-flex flex-wrap">
                    <button class="btn btn-lg my-2" v-if="users[0]"
                            v-bind:class="user.id === activeBtn.id ? 'btn-primary' : 'btn-outline-secondary'"
                            style="min-width: 200px" @click="setCurrentUser(user)"
                            v-for="user in users">{{user.name}}
                    </button>
                </div>
                <h3 v-if="!users[0]">
                    Пока что нет ни одного пользователя
                </h3>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">
                    <div class="col-md-4" v-for="response in responses">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top"
                                 :src="'storage/' + response.image"
                                 :alt="response.image">
                            <div class="card-body">
                                <h3>Задание: {{response.task.title}}</h3>
                                <hr/>
                                <p class="card-text">{{response.description}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Подробнее
                                        </button>
                                    </div>
                                    <small class="text-muted time-ago">
                                        <timeago :datetime="response.created_at"></timeago>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
</template>

<script>
    export default {
        name: "ShowResponses.vue",
        props: ['users'],
        data() {
            return {
                activeBtn: this.users[0] ?? null,
                responses: [],
                errors: null
            }
        },
        methods: {
            setCurrentUser(user) {
                this.activeBtn = user;
                this.getResponses();
            },
            getResponses() {
                axios.post('response/get', {id: this.activeBtn.id})
                    .then((res) => {
                        this.responses = res.data.responses;
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    });
            },
            openResponse() {
            }
        },
        mounted() {
            this.getResponses();

            Echo.channel('quest_database_response')
                .listen('.new-response', e => {
                    this.$notify({
                        group: 'notify',
                        title: 'Есть новый ответ!',
                        text: 'Чтоб увидеть, обновите страницу.',
                        type: 'warn',
                        width: '100%',
                        duration: '20000',
                        closeOnClick: false
                    });
                });
        },
        components: {}
    }
</script>

<style scoped>

</style>
