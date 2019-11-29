<template>
  <input
    ref="datePicker"
    :disabled="disabled"
    :class="{ '!cursor-not-allowed': disabled }"
    :value="value"
    type="text"
    :placeholder="placeholder"
  >
</template>

<script>
  import flatpickr from 'flatpickr'
  import 'flatpickr/dist/themes/airbnb.css'
  import { German } from 'flatpickr/dist/l10n/de.js'

  export default {
    props: {
      value: {
        required: false
      },
      placeholder: {
        type: String,
        default: () => {
          return moment().format('YYYY-MM-DD HH:mm:ss')
        }
      },
      disabled: {
        type: Boolean,
        default: false
      },
      dateFormat: {
        type: String,
        default: 'Y-m-d H:i:S'
      },
      twelveHourTime: {
        type: Boolean,
        default: false
      },
      enableTime: {
        type: Boolean,
        default: true
      },
      enableSeconds: {
        type: Boolean,
        default: true
      },
      weekNumbers: {
        type: Boolean,
        default: false
      }
    },

    data: () => ({ flatpickr: null }),

    mounted () {
      this.$nextTick(() => {
        this.flatpickr = flatpickr(this.$refs.datePicker, {
          enableTime: this.enableTime,
          enableSeconds: this.enableSeconds,
          onClose: this.onChange,
          onChange: this.onChange,
          dateFormat: this.dateFormat,
          allowInput: true,
          weekNumbers: this.weekNumbers,
          // static: true,
          time_24hr: !this.twelveHourTime,
          locale: German
          // locale: { firstDayOfWeek: this.firstDayOfWeek },
        })
      })
    },

    beforeDestroy () {
      this.flatpickr.destroy()
    },

    methods: {
      onChange (event) {
        this.$emit('change', this.$refs.datePicker.value)
      }
    }
  }
</script>

<style scoped>
.\!cursor-not-allowed {
    cursor: not-allowed !important;
}
</style>
