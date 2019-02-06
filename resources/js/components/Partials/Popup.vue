<template>
    <div class="kustomer-popup">
        <kustomer-header>
            <img slot="logo" :src="params.logo">
            <h1 slot="title"
                v-text="labels.title"
                :style="{'color': params.colors.primary}"
            ></h1>
        </kustomer-header>
        <div class="kustomer-container">
            <kustomer-feedbacks-list
                :feedbacks="params.feedbacks"
                :labels="labels"
                :params="params"
                @selected="setSelectedFeedback"
                @open-chat="isChatOpen = true"
            ></kustomer-feedbacks-list>
            <kustomer-feedback-form
                :feedback="selectedFeedback"
                :params="params"
                :labels="labels"
                @unselected="selectedFeedback = undefined"
            ></kustomer-feedback-form>
            <kustomer-chat
                v-if="isChatOpen"
                :labels="labels"
                :params="params"
                @unselected="isChatOpen = false"
            ></kustomer-chat>
        </div>
    </div>
</template>

<script>
export default {
    props: ['params', 'labels'],

    data() {
        return {
            selectedFeedback: undefined,
            isChatOpen: false,
        }
    },

    methods: {
        setSelectedFeedback(feedback) {
            this.selectedFeedback = feedback;
        }
    },

    components: {
        'kustomer-header': require('./Header.vue'),
        'kustomer-feedbacks-list': require('./FeedbacksList.vue'),
        'kustomer-feedback-form': require('./Form.vue'),
        'kustomer-chat': require('./Chat/Chat.vue'),
    }
}
</script>
