<template>
    <section class="kustomer-form"
        :class="{'is-open':feedback}"
    >
        <div class="kustomer-back" @click="back">
            <img src="/vendor/kustomer/assets/back.svg" alt="Return">
        </div>

        <div v-if="feedback && !displaySuccessMessage">
            <h2 v-text="feedback.label"></h2>

            <form @submit.prevent="submit">
                <textarea
                    :style="{'border-bottom-color': params.colors.primary}"
                    name="message"
                    id="message"
                    placeholder="Type your feedback here..."
                    v-model="message"
                    required
                ></textarea>
                <button type="submit"
                    :style="{'background-color': params.colors.primary}"
                    :class="{'is-loading': isLoading}"
                    :disabled="isLoading"
                >Send feedback</button>
            </form>
        </div>
        <kustomer-success
            v-if="displaySuccessMessage"
            :message="params.successMessage"
        ></kustomer-success>
    </section>
</template>

<script>
import html2canvas from 'html2canvas';

export default {
    props: ['feedback', 'params'],

    data() {
        return {
            message: null,
            isLoading: false,
            displaySuccessMessage: false,
            screenshot: undefined,
        }
    },

    methods: {
        submit() {
            this.isLoading = true;
            if (this.params.screenshot) {
                let self = this;
                html2canvas(document.body).then(function(canvas) {
                    self.screenshot = canvas.toDataURL();
                    self.sendFeedback();
                });
            } else {
                this.sendFeedback();
            }
        },
        back() {
            this.displaySuccessMessage = false;
            this.message = null;
            this.$emit('unselected');
        },
        sendFeedback() {
            axios.post('/kustomer-api/feedback', {
                type: this.feedback.type,
                message: this.message,
                viewport: {
                    width: Math.max(document.documentElement.clientWidth, window.innerWidth || 0),
                    height: Math.max(document.documentElement.clientHeight, window.innerHeight || 0),
                },
                screenshot: this.screenshot,
            })
            .then(response => {
                this.isLoading = false;
                this.displaySuccessMessage = true;
            })
            .catch(error => {
                this.isLoading = false;
            })
        }
    },

    components: {
        'kustomer-success': require('./SuccessMessage.vue')
    }
}
</script>
