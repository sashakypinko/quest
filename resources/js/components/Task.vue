<template>
    <div>
        <main role="main">

            <section class="jumbotron text-center">
                <div class="container">
                    <h1 class="jumbotron-heading">{{task.title}}</h1>
                </div>
            </section>

            <div class="album py-5 bg-light">
                <div class="container">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" :src="'storage/' + task.image" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">{{task.description}}</p>
                                    <google-map
                                        :lon="task.lon"
                                        :lat="task.lat"
                                        v-if="task.lat"
                                    >
                                    </google-map>
                                    <div class="d-flex justify-content-between align-items-center mt-4">
<!--                                            <button type="button" class="btn btn-lg btn-outline-danger" @click="">Выполнять</button>-->
                                            <a type="button" class="btn btn-lg btn-outline-success btn-block" v-if="task.priority < count" href="response">Отправить ответ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
</template>

<script>
export default {
    name: "Task",
    props: ['task', 'count'],
    data() {
        return {
        }
    },
    mounted() {
    }
}
</script>
