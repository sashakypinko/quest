<template>
    <div class="container-fluid h-100 chat-container">
        <div class="row justify-content-center h-100" v-if="users.length > 0">
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

                        <div v-bind:class="` ${(!message.is_read && message.from_id == user.id) ? 'is-unread' : ''} d-flex justify-content-${message.from_id == user.id ? 'start' : 'end'}`"
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
                            <textarea name="" class="form-control type_msg" @keydown.enter="send" v-model="message"
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
                messages: [],
                chatId: null,
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
                        this.message = '';
                        this.setIsRead();
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    });
            },
            getMessages() {
                axios.post('/chat/get', {
                    id: this.user.id,
                })
                    .then((res) => {
                        if (Array.isArray(res.data.messages)) {
                            this.messages = res.data.messages;
                            this.chatId = this.messages[0].chat_id
                        } else {
                            this.chatId = res.data.messages.id;
                        }

                        this.startListenEvent();
                        this.scrollDown();
                    })
                    .catch(error => {
                        this.errors = error;
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
            },
            startListenEvent() {
                Echo.channel('quest_database_chat_' + this.chatId)
                    .listen('.send', e => {
                        this.messages.push(e.message);
                        this.scrollDown();
                    });
            },
            setIsRead() {
                $('.message-container').removeClass('is-unread');
            }
        },
        mounted() {
            if (this.users.length > 0) {
                this.getMessages();

                $(document).ready(() => {
                    this.scrollDown();
                });
            }

            Bus.$on('open-chat', id => {
                this.openChat(id)
            });
        },
    }
</script>

<style scoped>

</style>
