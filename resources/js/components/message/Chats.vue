<template>
    <div class="col-md-3 col-xl-3 chat user-list">
        <div class="card mb-sm-3 mb-md-0 contacts_card" style="min-height:90vh">
            <div class="card-header">
                <div class="input-group">
                    <input type="text" placeholder="Search..." name="" class="form-control search">
                    <div class="input-group-prepend">
                        <span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
                    </div>
                </div>
            </div>
            <div class="card-body contacts_body">
                <ul class="contacts">
                    <li class="active" v-for="user in users" @click="openChat(user.id)"
                        v-bind:class="opened === user.id ? 'opened':''">
                        <div class="d-flex bd-highlight">
                            <div class="img_cont">
                                <div class="rounded-circle user_img">
                                    {{ user.name.substr(0, 1) }}
                                </div>
                                <span class="online_icon"></span>
                            </div>
                            <div class="user_info">
                                <span>{{ user.name }}</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</template>

<script>
import {Bus} from '../../bus.js';

export default {
    name: "Chats",
    props: ['users'],
    data() {
        return {
            colors: [
                // ['#4e4da7','#c98fff'],
                // ['#145589','#8fffc3'],
                // ['#623435','#f27777'],
            ],
            opened: 0
        }
    },
    methods: {
        openChat(id) {
            this.opened = id;
            Bus.$emit('open-chat', id)
        }
    },
    mounted() {

    }
}
</script>

<style scoped>

</style>
