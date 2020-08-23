<template>
    <div>
        <notifications group="notify"/>
        <div class="col-md-8 order-md-1 mt-5">
            <h4 class="mb-3">Ваш ответ</h4>
            <label for="image">Фотография</label>
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" v-bind:class="{'is-invalid': errors.image}"
                           @change="onImageChange">
                    <label class="custom-file-label"
                           for="image">{{ this.image ? this.image.name : 'Выберите фото' }}</label>
                </div>
                <span class="invalid-feedback" role="alert" v-show="errors.image">
                        <strong>{{ errors.image ? errors.image[0] : '' }}</strong>
                    </span>
            </div>

            <div class="image-preview" v-if="imageData.length > 0">
                <img class="preview" style="max-width: -webkit-fill-available" :src="imageData">
            </div>

            <div class="mb-3">
                <label for="description">Описание</label>
                <textarea type="text" class="form-control" v-model="description" id="description"
                          v-bind:class="{'is-invalid': errors.description}"
                          placeholder="Напишите ваш  ответ"
                          required></textarea>
                <span class="invalid-feedback" role="alert" v-show="errors.description">
                        <strong>{{ errors.description ? errors.description[0] : '' }}</strong>
                    </span>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" @click="send" v-if="!success">Отправить ответ</button>
            <a class="btn btn-success btn-lg btn-block" href="/task" v-if="success">Следующее задание</a>
        </div>
    </div>
</template>
<script>
export default {
    name: "ResponseCreate",
    data() {
        return {
            image: '',
            imageData: '',
            description: '',
            success: false,
            errors: {}
        }
    },
    methods: {
        onImageChange(event) {
            let input = event.target;
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.imageData = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
                this.image = input.files[0];
            }
        },
        send() {
            let config = {
                    headers: {'content-type': 'multipart/form-data'}
                },
                formData = new FormData();

            formData.append('image', this.image);
            formData.append('description', this.description);


            axios.post('send', formData, config)
                .then(res => {
                    this.errors = {};
                    this.success = true;
                    this.$notify({
                        group: 'notify',
                        title: 'Успех :)',
                        text: res.data.message,
                        type: 'success',
                        width: '100%',
                        duration: '10000',
                        position: 'top-center'
                    });
                })
                .catch(error => {
                    console.log(error.response.data);
                    this.errors = error.response.data.errors;
                    this.$notify({
                        group: 'notify',
                        title: 'Ошибка :(',
                        text: this.errors.image[0] ?? this.errors.description[0],
                        type: 'error',
                        width: '100%',
                        duration: '10000',
                        position: 'top-center'
                    });
                });
        }
    },
    components: {}
}
</script>
