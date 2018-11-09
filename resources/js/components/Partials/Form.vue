<template>
    <section class="kustomer-form"
        :class="{'is-open':feedback}"
    >
        <div class="kustomer-back" @click="$emit('unselected')">
            <img src="/vendor/kustomer/assets/back.svg" alt="Return">
        </div>

        <div v-if="feedback">
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
                >Send feedback</button>
            </form>
        </div>
    </section>
</template>

<script>
export default {
    props: ['feedback', 'params'],

    data() {
        return {
            message: null,
            isLoading: false,
        }
    },

    methods: {
        submit() {
            this.isLoading = true;
            axios.post('/kustomer-api/feedback', {
                type: this.feedback.type,
                message: this.message
            })
            .then(response => {
                this.isLoading = false;
            })
            .catch(error => {
                this.isLoading = false;
            })
        }
    }
}
</script>
