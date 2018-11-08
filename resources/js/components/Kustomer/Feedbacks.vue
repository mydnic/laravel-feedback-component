<template>
    <section class="kustomer-feedbacks">
        <div v-for="(feedback, type) in feedbacks" :key="type" class="kustomer-feedback">
            <img :src="feedback.icon" :alt="feedback.label">
            <p v-text="feedback.label"></p>
        </div>
    </section>
</template>

<script>
export default {
    props: ['feedbacks']
}
</script>
