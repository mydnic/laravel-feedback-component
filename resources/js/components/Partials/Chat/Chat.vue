<template>
    <section class="kustomer-chat">
        <div class="kustomer-back" @click="back">
            <img src="/vendor/kustomer/assets/back.svg" alt="Return">
        </div>

        <kustomer-chat-messages
        ></kustomer-chat-messages>

        <form @submit.prevent="submit">
            <input type="text"
                v-model="message"
                :placeholder="labels.chat.placeholder"
                autofocus
                required
            >
            <div
                :class="{'is-loading': isLoading}"
            ></div>
        </form>
    </section>
</template>

<script>
import html2canvas from 'html2canvas';

export default {
    props: ['feedback', 'params', 'labels'],

    data() {
        return {
            message: undefined,
            isLoading: false,
        }
    },

    methods: {
        submit() {
            this.isLoading = true;

            axios.post('/kustomer-api/message', {
                message: this.message
            })
            .then(response => {
                this.isLoading = false;
                this.message = undefined;
            })
            .catch(error => {
                this.isLoading = false;
            })
        },
        back() {
            this.$emit('unselected');
        },
    },

    components: {
        'kustomer-chat-messages': require('./Messages.vue'),
    }
}
</script>
