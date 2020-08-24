<template>
    <div>
        <div class="container">
            <header class="blog-header py-3">
                <div class="row flex-nowrap justify-content-between align-items-center">
                    <div class="col-4 pt-1">
                    </div>
                    <div class="col-4 text-center">
                        <a class="blog-header-logo text-dark" href="#">{{ title }}</a>
                    </div>
                    <div class="col-4 d-flex justify-content-end align-items-center">
                    </div>
                </div>
            </header>

            <!--            <div class="jumbotron text-white rounded bg-dark">-->
            <div class="col-md-6 px-0">
                <!--                    <h1 class="display-4 font-italic">{{ section_top.title }}</h1>-->
                <!--                    <p class="lead my-3">{{ section_top.content }}</p>-->
                <img :src="image" class="quest-img" :alt="image"/>
            </div>
        </div>
        <!--        </div>-->

        <main role="main" class="container">
            <div class="row">
                <div class="col-md-8 blog-main">
                    <div class="blog-post">
                        <h2 class="blog-post-title">{{ section_bottom.title }}</h2>
                        <p>{{ section_bottom.content }}</p>
                        <hr>
                    </div>
                    <a class="btn btn-success btn-lg btn-block" href="/register">Начать</a>
                </div>
            </div>
        </main>
    </div>
</template>

<script>
    export default {
        name: "Quest",
        props: ['data'],
        data() {
            return {
                title: this.data.main_title,
                image: 'storage/' + this.data.image,
                section_bottom: {
                    title: this.data.bottom_title,
                    content: this.data.bottom_content
                },
            }
        },
        methods: {},
        mounted() {
        }
    }
</script>
