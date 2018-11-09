<template>
    <section class="kustomer-feedbacks">
        <div class="kustomer-feedback"
            v-for="(feedback, type) in feedbacks"
            :key="type"
            @click="setFeedbackType(feedback, type)"
        >
            <img :src="feedback.icon" :alt="feedback.title">
            <p v-text="feedback.title"></p>
        </div>
    </section>
</template>

<script>
export default {
    props: ['feedbacks'],

    methods: {
        setFeedbackType(feedback, type) {
            feedback.type = type;
            this.$emit('selected', feedback);
        }
    }
}
</script>
