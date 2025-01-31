<script setup>
import {ref} from "vue";

import KustomerHeader from './Header.vue'
import KustomerFeedbacksList from './FeedbacksList.vue'
import KustomerFeedbackForm from './Form.vue'

defineProps(['params', 'labels'])

const selectedFeedback = ref(undefined)

const setSelectedFeedback = (feedback) => {
    selectedFeedback.value = feedback
}
</script>

<template>
    <div class="kustomer-popup">
        <kustomer-header>
            <template v-slot:logo>
                <img :src="params.logo" />
            </template>
            <template v-slot:title>
                <h1 v-text="labels.title" :style="{'color': params.colors.primary}"></h1>
            </template>
        </kustomer-header>
        <div class="kustomer-container">
            <kustomer-feedbacks-list
                :feedbacks="params.feedbacks"
                :labels="labels"
                @selected="setSelectedFeedback"
            ></kustomer-feedbacks-list>
            <kustomer-feedback-form
                :feedback="selectedFeedback"
                :params="params"
                :labels="labels"
                @unselected="selectedFeedback = undefined"
            ></kustomer-feedback-form>
        </div>
    </div>
</template>
