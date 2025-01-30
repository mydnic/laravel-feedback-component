<script setup>
import html2canvas from 'html2canvas'
import {computed, ref} from "vue";

import KustomerSuccess from './SuccessMessage.vue'

const props = defineProps(['feedback', 'params', 'labels'])
const emit = defineEmits(['unselected'])

const message = ref(null)
const isLoading = ref(false)
const displaySuccessMessage = ref(false)
const screenshot = ref(undefined)

const label = computed(() => {
    return props.labels.feedbacks[props.feedback.type].label
})

const submit = () => {
    isLoading.value = true
    if (props.params.screenshot) {

        html2canvas(document.body).then(function(canvas) {
            screenshot.value = canvas.toDataURL()
            sendFeedback()
        })
    } else {
        sendFeedback()
    }
}

const back = () => {
    displaySuccessMessage.value = false
    message.value = null
    emit('unselected')
}

const sendFeedback = () => {
    axios
        .post('/kustomer-api/feedback', {
            type: props.feedback.type,
            message: message.value,
            viewport: {
                width: Math.max(
                    document.documentElement.clientWidth,
                    window.innerWidth || 0
                ),
                height: Math.max(
                    document.documentElement.clientHeight,
                    window.innerHeight || 0
                )
            },
            screenshot: screenshot.value
        })
        .then(response => {
            isLoading.value = false
            displaySuccessMessage.value = true
        })
        .catch(error => {
            isLoading.value = false
        })
}

</script>

<template>
    <section class="kustomer-form" :class="{'is-open':feedback}">
        <div class="kustomer-back" @click="back">
            <img src="/vendor/kustomer/assets/back.svg" alt="Return" />
        </div>

        <div v-if="feedback && !displaySuccessMessage">
            <h2 v-text="label"></h2>

            <form @submit.prevent="submit">
                <textarea
                    :style="{'border-bottom-color': params.colors.primary}"
                    name="message"
                    id="message"
                    :placeholder="labels.placeholder"
                    v-model="message"
                    required
                ></textarea>
                <button
                    type="submit"
                    :style="{'background-color': params.colors.primary}"
                    :class="{'is-loading': isLoading}"
                    :disabled="isLoading"
                    v-text="labels.button"
                ></button>
            </form>
        </div>
        <kustomer-success v-if="displaySuccessMessage" :message="labels.success"></kustomer-success>
    </section>
</template>
