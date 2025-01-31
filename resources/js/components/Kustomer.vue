<script setup>
import KustomerPopup from './Partials/Popup.vue'
import {ref} from "vue";

const props = defineProps(['params', 'labels'])

const isFeedbackPopupOpen = ref(false)
const icon = ref(props.params.icon)
const isSpinning = ref(false)

const toggle = () => {
    isFeedbackPopupOpen.value = !isFeedbackPopupOpen.value
    changeIcon()
}
const changeIcon = () => {
    isSpinning.value = true
    setTimeout(() => {
        icon.value = isFeedbackPopupOpen.value
            ? props.params.close
            : props.params.icon
    }, 250)
    setTimeout(() => (isSpinning.value = false), 500)
}
</script>

<template>
    <div class="kustomer-feedback-component" :class="{'is-open': isFeedbackPopupOpen}">
        <span class="kustomer-tooltip" v-text="labels.tooltip"></span>
        <div
            class="kustomer-trigger"
            @click="toggle"
            :style="{'background-color': params.colors.primary}"
            :class="{
                'is-kustomer-trigger-spinning': isSpinning && isFeedbackPopupOpen,
                'is-kustomer-trigger-spinning-reverse': isSpinning && !isFeedbackPopupOpen,
            }"
        >
            <img :src="icon" alt="Give feedback" />
        </div>
        <kustomer-popup :params="params" :labels="labels"></kustomer-popup>
    </div>
</template>
