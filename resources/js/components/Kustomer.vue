<template>
    <div class="kustomer-feedback-component" :class="{'is-open': isFeedbackPopupOpen}">
        <span class="kustomer-tooltip">
            Give feedback
        </span>
        <div class="kustomer-trigger"
            @click="toggle"
            :style="{'background-color': params.colors.primary}"
            :class="{
                'is-kustomer-trigger-spinning': isSpinning && isFeedbackPopupOpen,
                'is-kustomer-trigger-spinning-reverse': isSpinning && !isFeedbackPopupOpen,
            }"
        >
            <img :src="icon" alt="Give feedback">
        </div>
        <kustomer-popup :params="params"></kustomer-popup>
    </div>
</template>

<script>
export default {
    props: ['params'],

    data() {
        return {
            isFeedbackPopupOpen: false,
            icon: this.params.icon,
            isSpinning: false,
        }
    },

    methods: {
        toggle() {
            this.isFeedbackPopupOpen = ! this.isFeedbackPopupOpen;
            this.changeIcon();
        },
        changeIcon() {
            this.isSpinning = true;
            setTimeout(() => {
                this.icon = this.isFeedbackPopupOpen ?
                    '/vendor/kustomer/assets/close.svg' :
                    this.params.icon;
            }, 250);
            setTimeout(() => this.isSpinning = false, 500);
        },
    },

    components: {
        'kustomer-popup': require('./Partials/Popup.vue'),
    }
}
</script>
