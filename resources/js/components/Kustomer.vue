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

<script>
export default {
    props: ['params', 'labels'],

    data() {
        return {
            isFeedbackPopupOpen: false,
            icon: this.params.icon,
            isSpinning: false
        }
    },

    methods: {
        toggle() {
            this.isFeedbackPopupOpen = !this.isFeedbackPopupOpen
            this.changeIcon()
        },
        changeIcon() {
            this.isSpinning = true
            setTimeout(() => {
                this.icon = this.isFeedbackPopupOpen
                    ? this.params.close
                    : this.params.icon
            }, 250)
            setTimeout(() => (this.isSpinning = false), 500)
        }
    },

    components: {
        'kustomer-popup': require('./Partials/Popup.vue').default
    }
}
</script>
