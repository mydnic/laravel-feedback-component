<script setup>
const props = defineProps(['feedbacks', 'labels'])
const emit = defineEmits(['selected'])

const setFeedbackType = (feedback, type) => {
    feedback.type = type
    emit('selected', feedback)
}

const label = (type) =>{
    return props.labels.feedbacks[type].title
}
</script>

<template>
    <section class="kustomer-feedbacks">
        <div
            class="kustomer-feedback"
            v-for="(feedback, type) in feedbacks"
            :key="type"
            @click="setFeedbackType(feedback, type)"
        >
            <img :src="feedback.icon" :alt="feedback.title" />
            <p v-text="label(type)"></p>
        </div>
    </section>
</template>
