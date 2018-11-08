<template>
    <div class="kustomer-feedback-component" :class="{'is-open': isFeedbackPopupOpen}">
        <span class="kustomer-tooltip">
            Give feedback
        </span>
        <div class="kustomer-trigger"
            @click="toggle"
            :style="{'background-color': params.colors.primary}"
        >
            <img :src="icon" alt="Feeback">
        </div>
        <div class="kustomer-popup">
            <kustomer-header>
                <img slot="logo" :src="params.logo">
                <h1 slot="title"
                    v-text="params.title"
                    :style="{'color': params.colors.primary}"
                ></h1>
            </kustomer-header>
            <kustomer-feedbacks
                :feedbacks="params.feedbacks"
            ></kustomer-feedbacks>
        </div>
    </div>
</template>

<script>
export default {
    props: ['params'],

    data() {
        return {
            isFeedbackPopupOpen: false,
        }
    },

    methods: {
        toggle() {
            this.isFeedbackPopupOpen = ! this.isFeedbackPopupOpen;
        }
    },

    computed: {
        icon() {
            if (this.isFeedbackPopupOpen) {
                return '/vendor/kustomer/assets/close.svg';
            } else {
                return this.params.icon;
            }
        }
    },

    components: {
        'kustomer-header': require('./Kustomer/Header.vue'),
        'kustomer-feedbacks': require('./Kustomer/Feedbacks.vue')
    }
}
</script>
