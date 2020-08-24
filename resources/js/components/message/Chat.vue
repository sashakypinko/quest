<template>
    <div class="container-fluid h-100 chat-container">
        <div class="row justify-content-center h-100">
            <chats v-if="user.id !== 1"
                   :users="users"
            ></chats>
            <div class="col-md-9 col-xl-9 chat">
                <div class="card" style="min-height:90vh">
                    <div class="card-header msg_head">
                        <div class="d-flex bd-highlight">
                            <div class="img_cont">
                                <div class="rounded-circle user_img"> {{ user.name.substr(0, 1) }}</div>
                            </div>
                            <div class="user_info">
                                <span>{{ user.name }}</span>
                            </div>
                            <div class="video_cam">
                            </div>
                        </div>

                    </div>
                    <div class="card-body msg_card_body">

                        <div v-bind:class="`d-flex justify-content-${message.from_id == user.id ? 'start' : 'end'}`"
                             v-for="message in messages"
                             v-if="messages.length>0" class="message-container">
                            <div
                                v-bind:class="message.from_id == user.id ? 'msg_cotainer' : 'msg_cotainer_send text-right items-end'"
                                class="message-item">
                                {{ message.message }}
                                <span class="msg_time"><timeago :datetime="message.created_at"></timeago></span>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="input-group">
                            <textarea name="" class="form-control type_msg" v-model="message"
                                      placeholder="Type your message..."></textarea>
                            <div class="input-group-append">
                                <span class="input-group-text send_btn" @click="send"><i
                                    class="fa fa-location-arrow"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {Bus} from '../../bus.js';

export default {
    name: "Chat",
    props: ['user', 'users'],
    data() {
        return {
            message: '',
            messages: '',
            errors: {}
        }
    },
    methods: {
        send() {
            let config = {
                    headers: {'content-type': 'multipart/form-data'}
                },
                formData = new FormData();

            formData.append('user_id', this.user.id);
            formData.append('message', this.message);

            axios.post('/chat/send', formData, config)
                .then((res) => {
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                });
        },
        getMessages() {
            axios.post('/chat/get', {id: this.user.id})
                .then((res) => {
                    this.messages = res.data.messages;
                    this.scrollDown();
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                });
        },
        scrollDown() {
            setTimeout(() => $(".msg_card_body").first().scrollTop($(".msg_card_body")[0].scrollHeight), 50)
        },
        openChat(id) {
            axios.post('/chat/get-user', {id: id})
                .then((res) => {
                    this.user = res.data.user;

                    this.getMessages();
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                });
        }
    },
    mounted() {
        this.getMessages();
        Bus.$on('open-chat', id => {
            this.openChat(id)
        })

        $(document).ready(() => {
            this.scrollDown();
        });
    },
}
</script>

<style scoped>

</style>
