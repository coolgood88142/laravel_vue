<script>
let ElementCalss = {
  created: function() {
    this.getElementCalss();
  },
  methods: {
    getElementCalss: function() {
      return {
            textbox_class: {
                error: 'form-control border border-danger',
                success: 'form-control border'
            },
            text_class: {
                error: 'form-text text-danger',
                remind: 'form-text text-secondary',
                success: 'form-text d-none'
            },
            select_class: {
                error: 'custom-select text-danger',
                success: 'custom-select'
            },
            formcheck_class: {
                error: 'form-check-label text-danger',
                success: 'form-check-label custom-select'
            }
        }
    }
  }
}

// let ClassData = Vue.extend({
//   mixins: [ElementCalss]
// });
// let classData = new ClassData();

</script>