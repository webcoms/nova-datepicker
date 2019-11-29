Nova.booting((Vue, router, store) => {
    Vue.component('index-datepicker', require('./components/IndexField'))
    Vue.component('detail-datepicker', require('./components/DetailField'))
    Vue.component('form-datepicker', require('./components/FormField'))
})
