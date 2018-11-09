<template>
    <section class="kustomer-form"
        :class="{'is-open':feedback}"
    >
        <div class="kustomer-back" @click="$emit('unselected')">
            <img src="/vendor/kustomer/assets/back.svg" alt="Return">
        </div>

        <div v-if="feedback">
            <h2 v-text="feedback.label"></h2>

            <form @submit.prevent="submit">
                <textarea
                    :style="{'border-bottom-color': params.colors.primary}"
                    name="message"
                    id="message"
                    placeholder="Type your feedback here..."
                    required
                ></textarea>
                <button type="submit"
                    :style="{'background-color': params.colors.primary}"
                >Send feedback</button>
            </form>
        </div>
    </section>
</template>

<script>
export default {
    props: ['feedback', 'params'],
}
</script>
