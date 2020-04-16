<template>
    <div class="kustomer-popup">
        <kustomer-header>
            <img slot="logo" :src="params.logo" />
            <h1 slot="title" v-text="labels.title" :style="{'color': params.colors.primary}"></h1>
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

<script>
export default {
    props: ['params', 'labels'],

    data() {
        return {
            selectedFeedback: undefined
        }
    },

    methods: {
        setSelectedFeedback(feedback) {
            this.selectedFeedback = feedback
        }
    },

    components: {
        'kustomer-header': require('./Header.vue').default,
        'kustomer-feedbacks-list': require('./FeedbacksList.vue').default,
        'kustomer-feedback-form': require('./Form.vue').default
    }
}
</script>
