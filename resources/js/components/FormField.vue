<template>
  <default-field
    :field="field"
    :errors="errors"
  >
    <template slot="field">
      <DatePickerField
        :dusk="field.attribute"
        class="w-full form-control form-input form-input-bordered"
        :name="field.name"
        :value="value"
        :date-format="pickerFormat"
        :placeholder="placeholder"
        :enable-time="false"
        :enable-seconds="false"
        :week-numbers="showWeekNumbers"
        :class="errorClasses"
        :disabled="isReadonly"
        @change="handleChange"
      />
    </template>
  </default-field>
</template>

<script>
  /* global moment */
  import DatePickerField from './DatePickerField.vue'
  import {
    Errors,
    FormField,
    HandlesValidationErrors,
    InteractsWithDates
  } from 'laravel-nova'

  export default {
    components: { DatePickerField },

    mixins: [HandlesValidationErrors, FormField, InteractsWithDates],

    computed: {
      placeholder () {
        return this.field.placeholder || moment().format(this.format)
      },

      format () {
        return this.field.format || 'DD.MM.YYYY'
      },

      pickerFormat () {
        return this.field.pickerFormat || 'd.m.Y'
      },

      showWeekNumbers () {
        return this.field.showWeekNumbers || false
      }
    },

    methods: {
      fill (formData) {
        if (!this.value) {
          formData.append(this.field.attribute, '')
          return
        }

        let date = moment(this.value, 'DD.MM.YYYY')
        if (!date.isValid()) {
          date = moment(this.value, 'YYYY-MM-DD')
        }

        formData.append(this.field.attribute, date.format('YYYY-MM-DD'))
      }
    }
  }
</script>
